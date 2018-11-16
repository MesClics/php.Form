<?php
namespace MesClics\Form\classes;
class DataTransport{
    protected $post;
    protected $files;

    public function __construct(Array $post, Array $files = null){
        //securiser tous les éléments saisis par le visiteur
        foreach($post as $k => $v){
            if(is_string($v)){
                $post[$k] = htmlspecialchars(stripslashes($v));
            }
            if(is_array($v)){
                array_walk_recursive($v, "self::secureArray");
            }
        }
        $this->post = $post;

        if($files){
            // TODO: ajouter des étapes de sécurisation ici
            $this->files = $files;
        }
    }

    public function getFiles(){
        return $this->files;
    }

    public function getPost(){
        return $this->post;
    }

    protected function secureArray(&$item, $key){
        if(is_string($item)){
            $item = htmlspecialchars($item);
        }

        if(is_array($item)){
            array_walk_recursive($item, "self::secureArray");
        }
    }
}