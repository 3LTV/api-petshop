<?php

namespace App\DAO;

use App\Model\AnimalModel;

class AnimalDAO extends DAO
{
    public function select()
    {
        $sql = "SELECT * FROM Animal";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }

    public function selectById(AnimalModel $model)
    {
        $sql = "SELECT * FROM Animal WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();

        return $stmt->fetchObject(get_class($model));
    }

    public function insert(AnimalModel $model)
    {
        $sql = "INSERT INTO Animal(nome, raça, peso, idade, sexo, pelagem, restricoes, id_cliente) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->raça);
        $stmt->bindValue(3, $model->peso);
        $stmt->bindValue(4, $model->idade);
        $stmt->bindValue(5, $model->sexo);
        $stmt->bindValue(6, $model->pelagem);
        $stmt->bindValue(7, $model->restricoes);
        $stmt->bindValue(8, $model->id_cliente);

        $stmt->execute();

        return $this->conexao->lastInsertId();
    }

    public function update(AnimalModel $model)
    {
        $sql = "UPDATE Animal SET nome = ?, raça = ?, peso = ?, idade = ?, sexo = ?, pelagem = ?, restricoes = ?, id_cliente = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->raça);
        $stmt->bindValue(3, $model->peso);
        $stmt->bindValue(4, $model->idade);
        $stmt->bindValue(5, $model->sexo);
        $stmt->bindValue(6, $model->pelagem);
        $stmt->bindValue(7, $model->restricoes);
        $stmt->bindValue(8, $model->id_cliente);
        $stmt->bindValue(9, $model->id);

        $stmt->execute();

        return $model->id;
    }

    public function delete(AnimalModel $model)
    {
        $sql = "DELETE FROM Animal WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id);

        $stmt->execute();
    }
}