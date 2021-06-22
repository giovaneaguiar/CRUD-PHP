<?php

class PostController
{

    public function index($params)
    {
        //echo 'Home'
        try {
            $postagem = Postagem::selecionaPorId($params);
    
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');
            //twig serve para alterar o html sem usar php no codigo. ou seja
            //não mistura .php na file home.html

            $parametros = array();
            $parametros['titulo'] = $postagem->titulo;
            $parametros['conteudo'] = $postagem->conteudo;

            $conteudo = $template->render($parametros);
            //renderizar a View.
            echo $conteudo;
            //mostrar html.
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}