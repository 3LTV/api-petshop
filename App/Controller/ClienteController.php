<?php

namespace App\Controller;

use App\Model\ClienteModel;

use Exception;

class ClienteController extends Controller
{
    public static function getCliente()
    {
        try
        {
            $model = new ClienteModel;

            $model->getAll();

            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getClienteById()
    {
        try
        {
            $model = new ClienteModel;
            $model->id = $_GET['id'];
            $model->getById();
            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function addCliente()
    {
        try
        {
            $model = new ClienteModel;
            $model->nome = $_POST['nome'];
            $model->cpf = $_POST['cpf'];
            $model->telefone = $_POST['telefone'];
            $model->celular = $_POST['celular'];

            $model->add();

            $new_model = new ClienteModel;

            $new_model->id = $model->id;

            $new_model->getById();

            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function editCliente()
    {
        try
        {
            $model = new ClienteModel;
            $model->nome = $_POST['nome'];
            $model->cpf = $_POST['cpf'];
            $model->telefone = $_POST['telefone'];
            $model->celular = $_POST['celular'];
            $model->id = $_POST['id'];

            $model->edit();

            $new_model = new ClienteModel;

            $new_model->id = $model->id;

            $new_model->getById();

            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function removerCliente()
    {
        try
        {
            $model = new ClienteModel;

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