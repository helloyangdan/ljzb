<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends Frontend_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['nav'] = 'product';
        $this->load->model("product_m");
        $this->load->model('category_m');
    }

    public function index($id=13, $page=1)
    {
        $this->data['id'] = $id;
        //
        $this->data['categories'] = $this->category_m->get_product_all_cate();
        $both = $this->category_m->get_parent_cate($id);
        $both = $both[0];
        $this->data['both'] = $both;
        $this->data['picture'] = $both['picture'] ? $both['picture'] : $both['parent_picture'];

        // Fetch all articles
        $config['base_url'] = site_url('product/index/'.$id.'/');

        $count = $this->product_m->get_all_count($id);
        $config['per_page'] = '9';

        $total_page = ceil($count / $config['per_page']);

        $arr = $this->product_m->get_all_list($config['per_page'], ($page - 1)*$config['per_page'], $id);

        $prev = max($page - 1 , 1);
        $next = min($total_page, $page + 1);

        $this->data['prev'] = ($prev != $page) ? site_url('product/index/'.$id.'/'.$prev) : '';
        $this->data['next'] = ($next != $page) ? site_url('product/index/'.$id.'/'.$next) : '';

        $this->data['page'] = $page;
        $this->data['arr'] = $arr;
        $this->data['count'] = $count;

        $this->data['control'] = 'index';
        $this->data['subview'] = 'product';
        $this->load->view('_layout_index', $this->data);
    }

    public function view($id)
    {

        $this->data['product'] = $this->product_m->get($id);

         //
        $category_id = $this->data['product']->category;
        $this->data['categories'] = $this->category_m->get_product_all_cate();
        $both = $this->category_m->get_parent_cate($category_id);
        $both = $both[0];
        $this->data['both'] = $both;
        $this->data['picture'] = $both['picture'] ? $both['picture'] : $both['parent_picture'];

        $this->data['arr'] = $this->product_m->get_all_list(14, 0, $category_id);

        $this->data['control'] = 'view';
        $this->data['subview'] = 'product';
        $this->load->view('_layout_index', $this->data);
    }

}