<?php

namespace App\Controller;

use App\Model\ServicoModel;

use Exception;

class ServicoController extends Controller
{
    public static function getServico()
    {
        try
        {
            $model = new ServicoModel;

            $model->getAll();

            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getServicoById()
    {
        try
        {
            $model = new ServicoModel;
            $model->id = $_GET['id'];
            $model->getById();
            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function addServico()
    {
        try
        {
            $model = new ServicoModel;
            $model->nome = $_POST['nome'];
            $model->preco = $_POST['preco'];
            $img_src = $_POST['imagem'];

            $model->add();

            $new_model = new ServicoModel;

            $new_model->id = $model->id;

            $new_model->getById();


            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function test()
    {
        var_dump($_FILES['img']);
        $nome = $_FILES["img"]["name"];
        $nome_temp = $_FILES["img"]["tmp_name"];

        $caminho_destino = "Files//" . $nome;

        move_uploaded_file($nome_temp, $caminho_destino);
    }

    public static function editServico()
    {
        try
        {
            $model = new ServicoModel;
            $model->nome = $_POST['nome'];
            $model->preco = $_POST['preco'];
            $model->image_path = $_POST['image_path'];
            $model->id = $_POST['id'];

            $model->edit();

            $new_model = new ServicoModel;

            $new_model->id = $model->id;

            $new_model->getById();

            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function removerServico()
    {
        try
        {
            $model = new ServicoModel;

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