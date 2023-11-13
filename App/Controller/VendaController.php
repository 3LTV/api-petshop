<?php

namespace App\Controller;

use App\Model\VendaModel;

use Exception;

class VendaController extends Controller
{
    public static function getVenda()
    {
        try
        {
            $model = new VendaModel;

            $model->getAll();

            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getVendaById()
    {
        try
        {
            $model = new VendaModel;
            $model->id = $_GET['id'];
            $model->getById();
            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function addVenda()
    {
        try
        {
            $model = new VendaModel;
            $model->id_produto = $_POST['id_produto'];
            $model->id_servico = $_POST['id_servico'];
            $model->id_cliente = $_POST['id_cliente'];
            $model->quantidade = $_POST['quantidade'];

            $model->add();

            $new_model = new VendaModel;

            $new_model->id = $model->id;

            $new_model->getById();

            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function editVenda()
    {
        try
        {
            $model = new VendaModel;
            $model->id_produto = $_POST['id_produto'];
            $model->id_servico = $_POST['id_servico'];
            $model->id_cliente = $_POST['id_cliente'];
            $model->quantidade = $_POST['quantidade'];
            $model->id = $_POST['id'];

            $model->edit();

            $new_model = new VendaModel;

            $new_model->id = $model->id;

            $new_model->getById();

            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function removerVenda()
    {
        try
        {
            $model = new VendaModel;

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