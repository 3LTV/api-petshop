<?php

namespace App\Model;

use App\DAO\AnimalDAO;
use Exception;

class AnimalModel extends Model
{
    public $id, $nome, $raça, $peso, $idade, $sexo, $pelagem, $restricoes, $id_cliente;

    public function getAll()
    {
        $this->rows = (new AnimalDAO)->select();
    }

    public function getById()
    {
        $this->rows = (new AnimalDAO)->selectById($this);
    }

    public function add()
    {
        $this->id = (new AnimalDAO)->insert($this);
    }

    public function edit()
    {
        $this->id = (new AnimalDAO)->update($this);
    }

    public function remove()
    {
        (new AnimalDAO)->delete($this);
    }
}