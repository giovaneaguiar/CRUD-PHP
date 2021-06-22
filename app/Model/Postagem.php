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

    public static function selecionaPorId($idPost){
        $con = Connection::getConn();
        //con - variável do tipo PDO.
        $sql = "SELECT * FROM postagem WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $resultado = $sql->fetchObject('Postagem');

        if(!$resultado){
            throw new Exception("Não foi encontrado nenhum registro!");
        }
        else {
            $resultado->comentarios = Comentario::selecionarComentarios($resultado->id);

            if (!$resultado->comentarios){
                //se não existir comentário nesse atributo... 
                $resultado->comentarios = 'Não existe nenhum comentário para essa postagem!';
            }
        }

        return $resultado;
    }
}
