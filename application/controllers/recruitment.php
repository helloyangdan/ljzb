<?php

class Recruitment extends Frontend_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->data['nav'] = 'recruitment';
        $this->load->model("article_m");
    }

    public function index($id=5, $page=1)
    {
        if(!in_array($id, array('5','6','7','8'))){
            $id = 5;
        }

        $this->data['id'] = $id;
        switch($id){
            case 5:
                $category_name = '生产类';
                break;
            case 6:
                $category_name = '设计类';
                break;
            case 7:
                $category_name = '综合类';
                break;
            case 8:
                $category_name = '销售类';
                break;
            default:
                $category_name = '';
                break;
        }
        $this->data['category_name'] = $category_name;

        // Fetch all articles
        $this->load->library('pagination');

        $config['base_url'] = site_url('recruitment/index/'.$id.'/');

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

        $arr = $this->article_m->get_all_list($config['per_page'], ($page - 1)*$config['per_page'], $id);

        $page = $this->pagination->create_links();

        $this->data['page'] = $page;
        $this->data['arr'] = $arr;
        $this->data['count'] = $count;

        $this->data['control'] = 'index';
        $this->data['subview'] = 'recruitment';
        $this->load->view('_layout_index', $this->data);
    }

    public function view($id)
    {

        $this->data['article'] = $this->article_m->get_by_id($id);
        $this->data['id'] = $this->data['article']['category']; // 分类id

        // click + 1
        $this->article_m->click($id);

        $this->data['control'] = 'view';
        $this->data['subview'] = 'recruitment';
        $this->load->view('_layout_index', $this->data);
    }

}