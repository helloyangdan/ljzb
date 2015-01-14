<?php

class Category_m extends MY_Model
{
    protected $_table_name = 'categories';
    protected $_order_by = 'order desc, id desc';
    public $rules = array(
        'parent_id' => array(
            'field' => 'parent_id',
            'label' => 'Parent ID',
            'rules' => 'trim|required|intval'
        ),
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|max_length[100]|xss_clean'
        ),
        'order' => array(
            'field' => 'order',
            'label' => 'Order',
            'rules' => 'trim|intval'
        )
    );

    public function get_new ()
    {
        $category = new stdClass();
        $category->parent_id = '';
        $category->title = '';
        $category->order = '';
        return $category;
    }

    public function delete($id)
    {
        // Delete a category
        parent::delete($id);

        // Reset parent ID for its children
        $this->db->set(array(
            'parent_id' => 0
        ))->where('parent_id', $id)->update($this->_table_name);
    }

    public function get_with_parent ($id = NULL, $single = FALSE)
    {
        $this->db->select('categories.*, c.title as parent_title');
        $this->db->join('categories as c', 'categories.parent_id=c.id', 'left');
        return parent::get($id, $single);
    }

    public function get_nested ()
    {
        $categories = $this->db->get('categories')->result_array();

        $array = array();
        foreach ($categories as $category) {
            if (! $category['parent_id']) {
                $array[$category['id']] = $category;
            }
            else {
                $array[$category['parent_id']]['children'][] = $category;
            }
        }
        return $array;
    }


    public function get_no_parents ()
    {
        // Fetch pages without parents
        $this->db->select('id, title');
        $this->db->where('parent_id', 0);
        $categories = parent::get();

        // Return key => value pair array
        $array = array(
            0 => '顶级分类'
        );
        if (count($categories)) {
            foreach ($categories as $category) {
                $array[$category->id] = $category->title;
            }
        }

        return $array;
    }

    /**
     * 新闻和招聘的分类
     */
    public function get_article_cate()
    {
        $this->db->select();
        $this->db->where('parent_id in (1,4) ');
        $result = $this->db->get('categories')->result_array();

        $array = array(
            0 => '请选择'
        );
        foreach($result as $v){
            $array[$v['id']] = $v['title'];
        }

        return $array;
    }

    /**
     * 产品的分类
     */
    public function get_product_cate()
    {
        $this->db->select();
        $this->db->where('parent_id not in (0, 1, 4) ');
        $result = $this->db->get('categories')->result_array();

        $array = array(
            0 => '请选择'
        );
        foreach($result as $v){
            $array[$v['id']] = $v['title'];
        }

        return $array;
    }

}