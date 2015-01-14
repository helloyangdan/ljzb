<?php

class Category extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_m');
    }

    public function index ()
    {
        // Fetch all
        $this->data['categories'] = $this->category_m->get_nested();

        // Load view
        $this->data['subview'] = 'admin/category/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        if($id) {
            $this->data['category'] = $this->category_m->get($id);
        }else{
            $this->data['category'] = $this->category_m->get_new();
        }

        // Pages for dropdown
        $this->data['categories_no_parents'] = $this->category_m->get_no_parents();

        // Set up the form
        $rules = $this->category_m->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE) {
            $formdata = $this->category_m->array_from_post(array(
                'title',
                'order',
                'parent_id'
            ));

            $config_u['upload_path'] = './data/product';
            $config_u['allowed_types'] = 'gif|jpg|png';
            $config_u['encrypt_name'] = true;

            $this->load->library('upload', $config_u);

            if(!$this->upload->do_upload('picture')) {
                //echo $this->upload->display_errors();
            }else{

                $data['upload_data']=$this->upload->data();  //文件的一些信息
                $img=$data['upload_data']['file_name'];  //取得文件名

                $formdata['picture'] = '/data/product/'.$img;

            }

            $this->category_m->save($formdata, $id);
            redirect('admin/category');
        }

        // Load the view
        $this->data['subview'] = 'admin/category/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }


    public function delete ($id)
    {
        $this->category_m->delete($id);
        redirect('admin/category');
    }

}