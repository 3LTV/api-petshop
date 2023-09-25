<?php

namespace App\Model;

abstract class Model
{
    public $rows;
}

interface IModel
{
    public function getByID(int $id);
    public function getAll(int $id);
}