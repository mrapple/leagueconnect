<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Layout
{
    private $views = array();

    public function add($view, $params=array())
    {
        $this->views[] = array('name' => $view, 'params' => $params);
    }

    public function render($view=null, $params=array())
    {
        if($view != null)
        {
            $this->add($view, $params);
        }
        
        $CI = &get_instance();

        $username = $CI->session->userdata('callsign');

        if($username == false)
            $username = 'Guest';

        $headerData = array(
            'Title' => 'League Connect',
            'Username' => $username
        );

        $CI->smarty->display('header', $headerData);

        $menuData = array(
            'MenuItems' => array(
                array('Name' => 'Sample Menu Item'),
                array('Name' => 'Another Menu Item')
            )
        );

        $CI->smarty->display('menu', $menuData);

        foreach($this->views as $view)
        {
            $CI->smarty->display($view['name'], $view['params']);
        }

        $CI->smarty->display('footer');
    }
}

?>
