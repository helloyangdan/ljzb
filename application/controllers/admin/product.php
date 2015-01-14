<?php

class Product extends Admin_Controller {

    public function __construct ()
    {
        parent::__construct();
        $this->load->model('product_m');
        $this->load->model('category_m');
    }

    public function index($id=0, $page=1)
    {
        if(isset($_POST['category'])){
            redirect('admin/product/index/'.$this->input->post('category'), 'refresh');
        }

        $this->data['id'] = $id;
        $this->data['categories'] = $this->category_m->get_product_cate();

        // Fetch all articles
        $this->load->library('pagination');

        $config['base_url'] = site_url('admin/product/index/'.$id.'/');


        $count = $this->product_m->get_all_count($id);
        $config['total_rows'] = $count;
        $config['per_page'] = '10';
        $config['uri_segment'] = 5;
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] ='</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);

        $arr = $this->product_m->get_all_list($config['per_page'], ($page - 1)*$config['per_page'], $id);

        $page = $this->pagination->create_links();


        $this->data['page'] = $page;
        $this->data['arr'] = $arr;
        $this->data['count'] = $count;

        // Load view
        $this->data['subview'] = 'admin/product/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = null)
    {

        if($id){
            $this->data['p'] = $this->product_m->get($id);
        }else{
            $this->data['p'] = $this->product_m->get_new();
        }

        $this->data['categories'] = $this->category_m->get_product_cate();

        // Set up the form
        $rules = $this->product_m->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE) {
            $formdata = $this->product_m->array_from_post(array(
                'title',
                'category',
                'picture',
                'order',
                'thumb'
            ));

            $config_u['upload_path'] = './data/product';
            $config_u['allowed_types'] = 'gif|jpg|png';
            $config_u['encrypt_name'] = true;

            $this->load->library('upload', $config_u);

            if(!$this->upload->do_upload('picture')) {
                echo $this->upload->display_errors();
            }else{

                $data['upload_data']=$this->upload->data();  //文件的一些信息
                $img=$data['upload_data']['file_name'];  //取得文件名

                // 缩略图
                $config['image_library'] = 'gd';
                $config['source_image'] = FCPATH . 'data/product/' . $img;
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 241;
                $config['height'] = 241;

                $this->load->library('image_lib', $config);

                if ( ! $this->image_lib->resize())
                {
                    echo $this->image_lib->display_errors();
                }

                $formdata['picture'] = '/data/product/'.$data['upload_data']['raw_name'] . $data['upload_data']['file_ext'];
                $formdata['thumb'] = '/data/product/'.$data['upload_data']['raw_name'] . '_thumb'. $data['upload_data']['file_ext'];

            }

            $this->product_m->save($formdata, $id);
            redirect('admin/product/index');
        }


        $this->data['subview'] = 'admin/product/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

}