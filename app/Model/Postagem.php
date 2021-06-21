<?php

class Postagem
{
    //trazer os dados da postagem do banco de dados.
    public static function selecionaTodos()
    {
        $con = Connection::getConn();
        //PDO - classe nativa do php

        $sql = "SELECT * FROM postagem ORDER BY id DESC";
        $sql = $con->prepare($sql);
        //validação do que está indo para o banco de dados.
        $sql->execute();

        $resultado = array();
        while ($row = $sql->fetchObject()) {
            //pega os registros array do banco e converte em objeto.
            $resultado[] = $row;
        }

        if (!$resultado) {
            //se o array for vazio.
            throw new Exception("Não foi encontrado nenhum registro!");
            //uso de exceção.

        }
        return $resultado;
    }
}
