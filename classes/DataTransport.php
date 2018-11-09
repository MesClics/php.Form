<?php
class DataTransport{
    private $post;
    private $files;

    public function __construct(Array $post, Array $files = null){
        //securiser tous les éléments saisis par le visiteur
        foreach($post as $k => $v){
            $post[$k] = htmlspecialchars(stripslashes($v));
        }
        $this->post = $post;

        if($files){
            // TODO: ajouter des étapes de sécurisations ici
            $this->files = $files;
        }
    }

    public function getFiles(){
        return $this->files;
    }

    public function getPost(){
        return $this->post;
    }
}