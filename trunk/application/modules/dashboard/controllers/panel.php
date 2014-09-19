<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of panel
 *
 * @author sochy
 */
class panel extends CI_Controller {

    //put your code here
    var $data = array('title' => null, 'content' => 'missing_view');

    function __construct() {
        parent::__construct();
        $this->load->model(array('dashboard/m_panel'));
    }

    function index() {

        $this->data['title'] = 'Dashboard';
        $this->data['content'] = 'dashboard/index';

        $allbook = $this->data['AllBooks'] = $this->m_panel->countBooks();
        $allborrow =$this->data['borrowNumber'] = $this->m_panel->countAllBorrow();
         $this->data['availableBook'] = $allbook - $allborrow;
         
//         $this->data['books'] = $this->m_panel->countBookInstok();
//        $this->data['visitorNumber'] = $this->m_panel->countAllVisitor();
        $this->data['lateReturn'] = $this->m_panel->countAllBorrowLate();
        $this->data['returnToday'] = $this->m_panel->countAllReturn();




        $this->load->view(LAYOUT, $this->data);
    }

}
