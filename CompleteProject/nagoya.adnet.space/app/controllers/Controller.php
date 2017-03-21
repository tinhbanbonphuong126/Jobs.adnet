<?php

Abstract Class Controller{

    public function __construct(){

    }

    protected function response($file = 'index', array $templateVars = array() ){
        global $template;
        global $vars;
        $template = $file.'.php';
        $vars = $templateVars;
        include(dirname(__FILE__).'/../includes/layout.php');
    }

    protected function json(array $data = array() ){
        echo json_encode($data);
    }

}