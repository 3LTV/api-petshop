<?php

namespace App\Model;

use App\DAO\ProdutoDAO;
use Exception;

class ProdutoModel extends Model
{
    public $id, $nome, $preco, $image_path;

    public static function receiveGetParams()
    {
        foreach ($_GET as $key => $value)
        {
            echo "<script>console.log('$key')</script>";
            echo "<script>console.log('$value')</script>";
        }
    }

    public function getAll()
    {
        $this->rows = (new ProdutoDAO)->select();
    }

    public function getById()
    {
        $this->rows = (new ProdutoDAO)->selectById($this);
    }

    public function add()
    {
        $this->id = (new ProdutoDAO)->insert($this);
    }

    public function edit()
    {
        $this->id = (new ProdutoDAO)->update($this);
    }

    public function remove()
    {
        (new ProdutoDAO)->delete($this);
    }
}