<?php

class Core
{
    public function start($urlGet)

    {
        $acao = 'index';

        if (isset($urlGet['pagina'])) {
            //se existir a variavel get no parametro pagina.
            $controller = ucfirst($urlGet['pagina'] . 'Controller');
            //ucfirst - deixar primeira letra maiuscula
            //o que está acontecendo aqui - alterando para ter uma rota correta.
            //exemplo: indo para /home voce entra em HomeController.
        } else {
            $controller = 'HomeController';
            //valor da controller = homecontroller
        }




        if (!class_exists($controller)) {
            //se não existir a classe chamada $pagina.
            $controller = 'ErroController';
        }

        if(isset($urlGet['id']) && ($urlGet['id'] != null)){
            $id = $urlGet['id'];

        }
        else {
            $id = null;
        }

        call_user_func(array(new $controller, $acao), $id);
        //chama método de forma dinamica, nesse caso chamou o function index()
        //em HomeController.php.
    }
}
