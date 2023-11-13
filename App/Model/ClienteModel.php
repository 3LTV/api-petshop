<?php

namespace App\Model;

use App\DAO\ClienteDAO;
use Exception;

class ClienteModel extends Model
{
    public $id, $nome, $cpf, $telefone, $celular;

    public function getAll()
    {
        $this->rows = (new ClienteDAO)->select();
    }

    public function getById()
    {
        $this->rows = (new ClienteDAO)->selectById($this);
    }

    public function add()
    {
        $this->id = (new ClienteDAO)->insert($this);
    }

    public function edit()
    {
        $this->id = (new ClienteDAO)->update($this);
    }

    public function remove()
    {
        (new ClienteDAO)->delete($this);
    }
}