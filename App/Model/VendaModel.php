<?php

namespace App\Model;

use App\DAO\VendaDAO;
use Exception;

class VendaModel extends Model
{
    public $id, $id_produto, $id_servico, $id_cliente, $quantidade;

    public function getAll()
    {
        $this->rows = (new VendaDAO)->select();
    }

    public function getById()
    {
        $this->rows = (new VendaDAO)->selectById($this);
    }

    public function add()
    {
        $this->id = (new VendaDAO)->insert($this);
    }

    public function edit()
    {
        $this->id = (new VendaDAO)->update($this);
    }

    public function remove()
    {
        (new VendaDAO)->delete($this);
    }
}