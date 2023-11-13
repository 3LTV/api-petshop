<?php

namespace App\DAO;

use App\Model\ClienteModel;

class ClienteDAO extends DAO
{
    public function select()
    {
        $sql = "SELECT * FROM Cliente";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectById(ClienteModel $model)
    {
        $sql = "SELECT * FROM Cliente WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();

        return $stmt->fetchObject(get_class($model));
    }

    public function insert(ClienteModel $model)
    {
        $sql = "INSERT INTO Cliente(nome, cpf, telefone, celular) VALUES(?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->celular);

        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function update(ClienteModel $model)
    {
        $sql = "UPDATE Cliente SET nome = ?, cpf = ?, telefone = ?, celular = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->celular);
        $stmt->bindValue(5, $model->id);

        $stmt->execute();

        return $model->id;
    }

    public function delete(ClienteModel $model)
    {
        $sql = "DELETE FROM Cliente WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();
    }
}