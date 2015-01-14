<?php
class Article_m extends MY_Model
{
	protected $_table_name = 'articles';
	protected $_order_by = 'pubdate desc, id desc';
	protected $_timestamps = TRUE;
	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate', 
			'label' => 'Publication date', 
			'rules' => 'trim|required|exact_length[10]|xss_clean'
		), 
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		), 
		'category' => array(
			'field' => 'category',
			'label' => 'Category',
			'rules' => 'trim|required|xss_clean'
		), 
		'body' => array(
			'field' => 'body', 
			'label' => 'Body', 
			'rules' => 'trim|required'
		)
	);

	public function get_new ()
	{
		$article = new stdClass();
		$article->title = '';
		$article->category = '';
		$article->body = '';
		$article->pubdate = date('Y-m-d');
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
        $this->db->select('articles.*, c.title as category_title');
        $this->db->join('categories as c', 'articles.category = c.id', 'left');
        if($category){
            $this->db->where('articles.category', $category);
        }
        $this->db->limit($limit, $offset);
        $this->db->order_by($order, 'DESC');
        $result = $this->db->get($this->_table_name)->result_array();

        return $result;
    }

    public function get_by_id($id)
    {
        $this->db->select('articles.*, c.title as category_title');
        $this->db->join('categories as c', 'articles.category = c.id', 'left');
        $this->db->where('articles.id', $id);
        $result = $this->db->get($this->_table_name)->row_array();

        return $result;
    }

    public function click($id)
    {
        $this->db->set('click', 'click + 1', FALSE);
        $this->db->where('id', $id);
        return $this->db->update($this->_table_name);
    }


}