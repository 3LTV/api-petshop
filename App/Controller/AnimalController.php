<?php

namespace App\Controller;

use App\Model\AnimalModel;

use Exception;

class AnimalController extends Controller
{
    public static function getAnimal()
    {
        try
        {
            $model = new AnimalModel;

            $model->getAll();

            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function getAnimalById()
    {
        try
        {
            $model = new AnimalModel;
            $model->id = $_GET['id'];
            $model->getById();
            parent::getResponseAsJSON($model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function addAnimal()
    {
        try
        {
            $model = new AnimalModel;
            $model->nome = $_POST['nome'];
            $model->raça = $_POST['raça'];
            $model->peso = $_POST['peso'];
            $model->idade = $_POST['idade'];
            $model->sexo = $_POST['sexo'];
            $model->pelagem = $_POST['pelagem'];
            $model->restricoes = $_POST['restricoes'];
            $model->id_cliente = $_POST['id_cliente'];

            $model->add();

            $new_model = new AnimalModel;

            $new_model->id = $model->id;

            $new_model->getById();

            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function editAnimal()
    {
        try
        {
            $model = new AnimalModel;
            
            $model->nome = $_POST['nome'];
            $model->raça = $_POST['raça'];
            $model->peso = $_POST['peso'];
            $model->idade = $_POST['idade'];
            $model->sexo = $_POST['sexo'];
            $model->pelagem = $_POST['pelagem'];
            $model->restricoes = $_POST['restricoes'];
            $model->id_cliente = $_POST['id_cliente'];
            $model->id = $_POST['id'];

            $model->edit();

            $new_model = new AnimalModel;

            $new_model->id = $model->id;

            $new_model->getById();

            parent::getResponseAsJSON($new_model->rows);
        }
        catch (Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function removerAnimal()
    {
        try
        {
            $model = new AnimalModel;

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