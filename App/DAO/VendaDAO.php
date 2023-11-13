<?php

namespace App\DAO;

use App\Model\VendaModel;

class VendaDAO extends DAO
{
    public function select()
    {
        $sql = "SELECT * FROM Venda";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectById(VendaModel $model)
    {
        $sql = "SELECT * FROM Venda WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();

        return $stmt->fetchObject(get_class($model));
    }

    public function insert(VendaModel $model)
    {
        $sql = "INSERT INTO Venda(id_produto, id_servico, id_cliente, quantidade) VALUES(?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_produto);
        $stmt->bindValue(2, $model->id_servico);
        $stmt->bindValue(3, $model->id_cliente);
        $stmt->bindValue(4, $model->quantidade);

        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function update(VendaModel $model)
    {
        $sql = "UPDATE Venda SET id_produto = ?, id_servico = ?, id_cliente = ?, quantidade = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_produto);
        $stmt->bindValue(2, $model->id_servico);
        $stmt->bindValue(3, $model->id_cliente);
        $stmt->bindValue(4, $model->quantidade);
        $stmt->bindValue(5, $model->id);

        $stmt->execute();

        return $model->id;
    }

    public function delete(VendaModel $model)
    {
        $sql = "DELETE FROM Venda WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();
    }
}