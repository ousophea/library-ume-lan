<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth
 *
 * @author sochy.choeun
 */
class Signin extends CI_Controller{
    //put your code here
    var $data = null;
    
    
    function index(){
        $this->data['title'] = "Sign In";
        $this->load->view('signin',  $this->data);
    }
    
    function access(){
        redirect('users/accounts/signin');
    }
    
}
