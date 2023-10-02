<?php

namespace App\DAO;

use App\Model\EnderecoModel;

class EnderecoDAO extends DAO
{
    public function select()
    {
        $sql = "SELECT * FROM Endereco";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectById(EnderecoModel $model)
    {
        $sql = "SELECT * FROM Endereco WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();

        return $stmt->fetchObject(get_class($model));
    }

    public function insert(EnderecoModel $model)
    {
        $sql = "INSERT INTO Endereco(bairro, rua, numero, cep, id_cliente) VALUES(?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->bairro);
        $stmt->bindValue(2, $model->rua);
        $stmt->bindValue(3, $model->numero);
        $stmt->bindValue(4, $model->cep);
        $stmt->bindValue(5, $model->id_cliente);

        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function update(EnderecoModel $model)
    {
        $sql = "UPDATE Endereco SET bairro = ?, rua = ?, numero = ?, cep = ?, id_cliente = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->bairro);
        $stmt->bindValue(2, $model->rua);
        $stmt->bindValue(3, $model->numero);
        $stmt->bindValue(4, $model->cep);
        $stmt->bindValue(5, $model->id_cliente);
        $stmt->bindValue(6, $model->id);

        $stmt->execute();

        return $model->id;
    }

    public function delete(EnderecoModel $model)
    {
        $sql = "DELETE FROM Endereco WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();
    }
}