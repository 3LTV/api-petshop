<?php

namespace App\Model;

use App\DAO\EnderecoDAO;
use Exception;

class EnderecoModel extends Model
{
    public $id, $bairro, $rua, $numero, $cep, $id_cliente;

    public function getAll()
    {
        $this->rows = (new EnderecoDAO)->select();
    }

    public function getById()
    {
        $this->rows = (new EnderecoDAO)->selectById($this);
    }

    public function add()
    {
        $this->id = (new EnderecoDAO)->insert($this);
    }

    public function edit()
    {
        $this->id = (new EnderecoDAO)->update($this);
    }

    public function remove()
    {
        (new EnderecoDAO)->delete($this);
    }
}
