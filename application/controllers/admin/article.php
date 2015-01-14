<?php
class Article extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model('article_m');
        $this->load->model('category_m');
	}

	public function index ($page=1)
	{
		// Fetch all articles
        $this->load->library('pagination');

        $config['base_url'] = site_url('admin/article/index/');


        $count = $this->article_m->get_all_count();
        $config['total_rows'] = $count;
        $config['per_page'] = '10';
        $config['uri_segment'] = 4;
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

        $arr = $this->article_m->get_all_list($config['per_page'], ($page - 1)*$config['per_page']);

        $page = $this->pagination->create_links();


        $this->data['page'] = $page;
        $this->data['arr'] = $arr;
        $this->data['count'] = $count;

		// Load view
		$this->data['subview'] = 'admin/article/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit ($id = NULL)
	{
		// Fetch a article or set a new one
		if ($id) {
            $article = $this->article_m->get($id);
            $this->load->library('fckeditor',array('instanceName' => 'body'));
            $this->fckeditor->BasePath = base_url().'addons/fckeditor/';
            $this->fckeditor->ToolbarSet = 'Normal';
            $this->fckeditor->Width = '100%';
            $this->fckeditor->Height = '450';
            $this->fckeditor->Value = $article->body;

            $content = $this->fckeditor->CreateHtml();
            $article->content = $content;

			$this->data['article'] = $article;
			if(!count($this->data['article']) ) {
                $this->data['errors'][] = 'article could not be found';
            };
		}
		else {
            $article = $this->article_m->get_new();
            $this->load->library('fckeditor',array('instanceName' => 'body'));
            $this->fckeditor->BasePath = base_url().'addons/fckeditor/';
            $this->fckeditor->ToolbarSet = 'Normal';
            $this->fckeditor->Width = '100%';
            $this->fckeditor->Height = '450';

            $content = $this->fckeditor->CreateHtml();
            $article->content = $content;

			$this->data['article'] = $article;
		}

        $this->data['categories'] = $this->category_m->get_article_cate();

		// Set up the form
		$rules = $this->article_m->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$formdata = $this->article_m->array_from_post(array(
				'title', 
				'category',
				'body', 
				'pubdate'
			));

            $config['upload_path'] = './data/upload';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('thumb')) {

            }else{

                $data['upload_data']=$this->upload->data();  //文件的一些信息
                $img=$data['upload_data']['file_name'];  //取得文件名

                // 缩略图
//                $config['image_library'] = 'imagemagick';
//                $config['source_image'] = FCPATH . 'data/upload/' . $img;
//                $config['create_thumb'] = TRUE;
//                $config['maintain_ratio'] = TRUE;
//                $config['width'] = 75;
//                $config['height'] = 50;
//
//                $this->load->library('image_lib', $config);
//
//                if ( ! $this->image_lib->resize())
//                {
//                    echo $this->image_lib->display_errors();
//                }

                $thumb = 'data/upload/'.$img;
                $formdata['thumb'] = $thumb;

            }

			$this->article_m->save($formdata, $id);
			redirect('admin/article');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/article/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete ($id)
	{
		$this->article_m->delete($id);
		redirect('admin/article');
	}

}