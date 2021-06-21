<?php

class HomeController
{

    public function index()
    {
        //echo 'Home'
        try {
            $colecPostagens = Postagem::selecionaTodos();
            var_dump($colecPostagens);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
