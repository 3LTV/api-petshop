<?php

namespace App\Model;

use App\DAO\ProdutoDAO;
use Exception;

class ProdutoModel extends Model
{
    public $id, $nome, $preco;

    public function getByID(int $id)
    {
    }

    public function getAll()
    {
    }
}