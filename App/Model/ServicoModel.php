<?php

namespace App\Model;

use App\DAO\ServicoDAO;
use Exception;

class ServicoModel extends Model
{
    public $id, $nome, $preco, $image_path;

    public function getAll()
    {
        $this->rows = (new ServicoDAO)->select();
    }

    public function getById()
    {
        $this->rows = (new ServicoDAO)->selectById($this);
    }

    public function add()
    {
        $this->id = (new ServicoDAO)->insert($this);
    }

    public function edit()
    {
        $this->id = (new ServicoDAO)->update($this);
    }

    public function remove()
    {
        (new ServicoDAO)->delete($this);
    }
}