<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!function_exists("alert")){
    function alert($message=NULL, $type = 'success'){
        $icon = ($type=='success')?'ok-circle':(($type=='danger')?'remove-circle':(($type=='info')?'info-sign':(($type=='warning')?'ban-circle':'ban-circle')));
        return '<div class="alert alert-'.$type.' alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="glyphicon glyphicon-'.$icon.'"></i> 
                    '.$message.'
                  </div>';
    }
}

