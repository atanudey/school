<?php
class Menu {
    function __construct()
    {
        $this->ci =& get_instance();
    }
    
    function build_menu($user_type_id) {
        $menu = array();

        //Fetch permission list from User_Privilege table
        $this->ci->load->model('user_privilege_model');
        
        $privileges = $this->ci->user_privilege_model->get_allowed_screens($user_type_id);

        $menu = '<ul>';
        foreach($privileges as $val) {
            if (!empty($val['children'])) {
                $menu .= '<li><a href="' . base_url($val['URI']) . '">' . $val['SN'] . '</a>';
                    $menu .= '<ul>';
                    foreach($val['children'] as $child) {
                        $menu .= '<li><a href="' . base_url($child['URI']) . '">' . $child['SN'] . '</a></li>';
                    }
                    $menu .= '</ul>';
                $menu .= '</li>';
            } else {
                $menu .= '<li><a href="' . base_url($val['URI']) . '">' . $val['SN'] . '</a></li>';
            }
        }
        $menu .= '</ul>';

        return $menu;
    }
}