<?php
class DataTransport{
    private $post;

    public function __construct(Array $post){
        //securiser tous les éléments saisis par le visiteur
        foreach($post as $k => $v){
            $post[$k] = htmlspecialchars(stripslashes($v));
        }
        $this->post = $post;
    }
}