<?php

class Product_m extends MY_Model
{
    protected $_table_name = 'products';
    protected $_order_by = 'order desc';
    public $rules = array(

        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|max_length[100]|xss_clean'
        ),
        'order' => array(
            'field' => 'order',
            'label' => 'Order',
            'rules' => 'trim|xss_clean'
        ),
        'category' => array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'trim|required|xss_clean'
        ),
        'picture' => array(
            'field' => 'picture',
            'label' => 'Picture',
            'rules' => 'trim|max_length[128]|xss_clean'
        ),
        'thumb' => array(
            'field' => 'thumb',
            'label' => 'Thumb',
            'rules' => 'trim|max_length[128]|xss_clean'
        )
    );

    public function get_new ()
    {
        $article = new stdClass();
        $article->title = '';
        $article->category = '';
        $article->order = '';
        $article->picture = '';
        $article->thumb = '';
        return $article;
    }

    public function get_all_count($category=0)
    {
        if($category){
            $this->db->where('category', $category);
        }
        $this->db->from($this->_table_name);
        return $this->db->count_all_results();
    }

    public function get_all_list($limit=10, $offset=0,$category=0,$order='id')
    {
        $this->db->select('products.*, c.title as category_title');
        $this->db->join('categories as c', 'products.category = c.id', 'left');
        if($category){
            $this->db->where('products.category', $category);
        }
        $this->db->limit($limit, $offset);
        $this->db->order_by($order, 'DESC');
        $result = $this->db->get($this->_table_name)->result_array();

        return $result;
    }


}