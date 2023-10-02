<?php

namespace App\DAO;

use App\Model\ServicoModel;

class ServicoDAO extends DAO
{
    public function select()
    {
        $sql = "SELECT * FROM Servico";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectById(ServicoModel $model)
    {
        $sql = "SELECT * FROM Servico WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();

        return $stmt->fetchObject(get_class($model));
    }

    public function insert(ServicoModel $model)
    {
        $sql = "INSERT INTO Servico(nome, preco, image_path) VALUES(?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->image_path);

        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function update(ServicoModel $model)
    {
        $sql = "UPDATE Servico SET nome = ?, preco = ?, image_path = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->image_path);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();

        return $model->id;
    }

    public function delete(ServicoModel $model)
    {
        $sql = "DELETE FROM Servico WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();
    }
}