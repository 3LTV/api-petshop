<?php

namespace App\Controller;

use App\Model\ProdutoModel;

use Exception;

class ProdutoController extends Controller
{
    public static function getProduto()
    {
        try
        {
            $model = new ProdutoModel;

            $model->getAll();

            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getProdutoById()
    {
        try
        {
            $model = new ProdutoModel;
            $model->id = $_GET['id'];
            $model->getById();
            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function addProduto()
    {
        try
        {
            $model = new ProdutoModel;
            $model->nome = $_POST['nome'];
            $model->preco = $_POST['preco'];
            $img_src = $_POST['imagem'];

            $model->add();

            $new_model = new ProdutoModel;

            $new_model->id = $model->id;

            $new_model->getById();


            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }


    public static function editProduto()
    {
        try
        {
            $model = new ProdutoModel;
            $model->nome = $_POST['nome'];
            $model->preco = $_POST['preco'];
            $model->image_path = $_POST['image_path'];
            $model->id = $_POST['id'];

            $model->edit();

            $new_model = new ProdutoModel;

            $new_model->id = $model->id;

            $new_model->getById();

            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function removerProduto()
    {
        try
        {
            $model = new ProdutoModel;

            $model->id = $_POST['id'];

            $model->remove();

            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }
}