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
            $url = "#";
            if (!empty($val['URI'])) {
                $url = base_url($val['URI']);
            }

            if (!empty($val['children'])) {
                $menu .= '<li><a href="' . $url . '">' . $val['SN'] . '</a>';
                    $menu .= '<ul>';
                    foreach($val['children'] as $child) {
                        $url = "#";
                        if (!empty($child['URI'])) {
                            $url = base_url($child['URI']);
                        }
                        $menu .= '<li><a href="' . $url . '">' . $child['SN'] . '</a></li>';
                    }
                    $menu .= '</ul>';
                $menu .= '</li>';
            } else {
                $menu .= '<li><a href="' . $url . '">' . $val['SN'] . '</a></li>';
            }
        }
        $menu .= '</ul>';

        return $menu;
    }
}