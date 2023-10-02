<?php

namespace App\Controller;

use App\Model\EnderecoModel;

use Exception;

class EnderecoController extends Controller
{
    public static function getEndereco()
    {
        try
        {
            $model = new EnderecoModel;

            $model->getAll();

            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getEnderecoById()
    {
        try
        {
            $model = new EnderecoModel;
            $model->id = $_GET['id'];
            $model->getById();
            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function addEndereco()
    {
        try
        {
            $model = new EnderecoModel;
            $model->bairro = $_POST['bairro'];
            $model->rua = $_POST['rua'];
            $model->numero = $_POST['numero'];
            $model->cep = $_POST['cep'];
            $model->id_cliente = $_POST['id_cliente'];

            $model->add();

            $new_model = new EnderecoModel;

            $new_model->id = $model->id;

            $new_model->getById();


            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function editEndereco()
    {
        try
        {
            $model = new EnderecoModel;
            $model->bairro = $_POST['bairro'];
            $model->rua = $_POST['rua'];
            $model->numero = $_POST['numero'];
            $model->cep = $_POST['cep'];
            $model->id_cliente = $_POST['id_cliente'];
            $model->id = $_POST['id'];

            $model->edit();

            $new_model = new EnderecoModel;

            $new_model->id = $model->id;

            $new_model->getById();

            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function removerEndereco()
    {
        try
        {
            $model = new EnderecoModel;

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