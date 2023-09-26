<?php

namespace App\DAO;

use App\Model\ProdutoModel;

class ProdutoDAO extends DAO
{
    public function select()
    {
        $sql = "SELECT * FROM Produto";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectById(ProdutoModel $model)
    {
        $sql = "SELECT * FROM Produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();

        return $stmt->fetchObject(get_class($model));
    }

    public function insert(ProdutoModel $model)
    {
        $sql = "INSERT INTO Produto(nome, preco, image_path) VALUES(?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(2, $model->image_path);

        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function update(ProdutoModel $model)
    {
        $sql = "UPDATE Produto SET nome = ?, preco = ?, image_path = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->preco);
        $stmt->bindValue(3, $model->image_path);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();

        return $model->id;
    }

    public function delete(ProdutoModel $model)
    {
        $sql = "DELETE FROM Produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();
    }
}