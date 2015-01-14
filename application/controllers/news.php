<?php

class News extends Frontend_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['nav'] = 'news';
        $this->load->model("article_m");

    }

    public function index($id=1, $page=1)
    {
        if(!in_array($id, array('2','3'))){
            $id = 2;
        }

        $this->data['id'] = $id;
        $this->data['category_name'] = ( $id == 2 ) ? '龙嘉新闻' : '业界新闻';

        // Fetch all articles
        $this->load->library('pagination');

        $config['base_url'] = site_url('news/index/'.$id.'/');

        $count = $this->article_m->get_all_count($id);
        $config['total_rows'] = $count;
        $config['per_page'] = '10';
        $config['uri_segment'] = 4;
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] ='</div>';
        $config['cur_tag_open'] = '&nbsp;<a class="cur">';
        $config['cur_tag_close'] = '</a>';
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);

        $arr = $this->article_m->get_all_list($config['per_page'], ($page - 1)*$config['per_page'], $id, 'pubdate');

        $page = $this->pagination->create_links();

        $this->data['page'] = $page;
        $this->data['arr'] = $arr;
        $this->data['count'] = $count;

        $this->data['control'] = 'index';
        $this->data['subview'] = 'newslist';
        $this->load->view('_layout_index', $this->data);
    }

    public function view($id)
    {

        $this->data['article'] = $this->article_m->get_by_id($id);
        $this->data['id'] = $this->data['article']['category']; // 分类id

        // click + 1
        $this->article_m->click($id);

        $this->data['control'] = 'view';
        $this->data['subview'] = 'newslist';
        $this->load->view('_layout_index', $this->data);
    }
}