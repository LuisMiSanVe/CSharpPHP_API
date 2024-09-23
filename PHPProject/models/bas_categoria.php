<?php
require_once 'config/database.php';
class BasCategoria
{
    private $conn;
    public $respueta = array(
        "status" => '',
        "body" => '',
    );

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function create($data)
    {
        try {
            $descripcion = $data['descripcion'];
            $estatus = $data['estatus'];

            $query = 'INSERT INTO `bas_categoria` (
                        `descripcion`,
                        `estatus`)
                    VALUES (
                        :descripcion,
                        :estatus)';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $statement->bindParam(":estatus", $estatus, PDO::PARAM_STR);
            $statement->execute();

            $this->respueta['status'] = 'ok';
            $this->respueta['body'] = 'Categoria registrada';

        } catch (PDOException $e) {
            $this->respueta['status'] = 'err';
            $this->respueta['body'] = 'error: ' . $e->getMessage();
        }
        return $this->respueta;
    }

    public function update()
    {
    }

    public function delete($id)
    {
        try {
            $query = 'DELETE FROM`bas_categoria` WHERE id_categoria = :id';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(":id", $id, PDO::PARAM_STR);
            $statement->execute();

            $this->respueta['status'] = 'ok';
            $this->respueta['body'] = 'Categoria eliminada';

        } catch (PDOException $e) {
            $this->respueta['status'] = 'err';
            $this->respueta['body'] = 'error: ' . $e->getMessage();
        }
        return $this->respueta;
    }

    public function read()
    {
        try {
            $query = 'SELECT
                        bc.id_categoria, bc.descripcion, bc.estatus
                    FROM
                        bas_categoria bc';
            $statement = $this->conn->prepare($query);
            $statement->execute();

            $this->respueta['status'] = 'ok';
            if ($statement->rowCount() > 0) {
                $this->respueta['body'] = $statement->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $this->respueta['body'] = 'la tabla esta vacia';
            }

        } catch (PDOException $e) {
            $this->respueta['status'] = 'err';
            $this->respueta['body'] = 'error: ' . $e->getMessage();
        }
        return $this->respueta;
    }

    public function readOne($id)
    {
        try {
            $query = 'SELECT
                        bc.id_categoria, bc.descripcion, bc.estatus
                    FROM
                        bas_categoria bc
                    WHERE
                        bc.id_categoria = :id';
            $statement = $this->conn->prepare($query);
            $statement->bindParam(":id", $id, PDO::PARAM_STR);
            $statement->execute();

            $this->respueta['status'] = 'ok';
            if ($statement->rowCount() > 0) {
                $this->respueta['body'] = $statement->fetch(PDO::FETCH_ASSOC);
            } else {
                $this->respueta['body'] = 'la tabla esta vacia';
            }

        } catch (PDOException $e) {
            $this->respueta['status'] = 'err';
            $this->respueta['body'] = 'error: ' . $e->getMessage();
        }
        return $this->respueta;
    }

    public function getparamstoUpdate($input)
    {
        $filterParams = [];
        foreach ($input as $param => $value) {
            $filterParams[] = "$param=:$param";
        }
        return implode(", ", $filterParams);
    }

    //Asociar todos los parametros a un sql
    public function bindAllValues($statement, $params)
    {
        foreach ($params as $param => $value) {
            $statement->bindValue(':' . $param, $value);
        }
        return $statement;
    }
}
