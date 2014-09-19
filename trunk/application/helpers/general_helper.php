<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!function_exists("status_string")){
    function status_string($value=0){
        return ($value)?"Enabled":"Disabled";
    }
}
if(!function_exists("get_content_teaser")){
    function get_content_teaser($string=null, $len=50, $start=0){
        return substr(strip_tags($string), $start, $len).'...';
    }
}

if(!function_exists("get_date_string")){
    function get_date_string($timestamp=0){
        if($timestamp==0){
            return '';
        }
        else{
            return date('M d, Y',  strtotime($timestamp));
        }
    }
}

if(!function_exists("get_password")){
    function get_password($password=NULL, $salt='ume-security-001'){
        $salt = sha1($salt);
        $pass = md5($password);
        return sha1($salt.$pass);
    }
}


