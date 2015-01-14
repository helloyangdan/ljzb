<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Frontend_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->data['nav'] = 'index';
        $this->data['subview'] = 'index';
		$this->load->view('_layout_index', $this->data);
	}

    public function about()
    {
        $this->data['nav'] = 'about';
        $this->data['subview'] = 'about';
        $this->data['about'] = 1;
        $this->load->view('_layout_index', $this->data);
    }

    public function sale()
    {
        $this->data['nav'] = 'about';
        $this->data['subview'] = 'about';
        $this->data['sale'] = 1;
        $this->load->view('_layout_index', $this->data);
    }

    /**
     * 服务中心
     * @param int $type
     */
    public function service($type=1)
    {
        $this->data['nav'] = 'service';
        $this->data['subview'] = 'service';
        $this->data['type'] = $type;
        $this->load->view('_layout_index', $this->data);
    }


    public function contact()
    {
        $this->data['nav'] = 'contact';
        $this->data['subview'] = 'contact';
        $this->load->view('_layout_index', $this->data);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */