<?php

use App\Controller\ProdutoController;
use App\Model\ProdutoModel;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri)
{
    case "/api/produto":
        ProdutoController::getProduto();
    break;

    case "/api/produto/by-id":
        ProdutoController::getProdutoById();
    break;

    case "/api/produto/add":
        ProdutoController::addProduto();
    break;

    case "/api/produto/edit":
        ProdutoController::editProduto();
    break;

    case "/api/produto/remove":
        ProdutoController::removerProduto();
    break;

    /**
    case "/api/produto/test":
        ProdutoController::test();
    break;

    case "/api/produto/novo":
        ?>
            <form method="POST" action="/api/produto/test" enctype="multipart/form-data">
                <input name="nome" id="nome" placeholder="nome"/>
                <input name="id" id="id" type="number" placeholder="id"/>
                <input name="preco" id="preco" type="number" step="any" placeholder="preco"/>
                <input type="file" name="img" id="img" placeholder="img"/>
                <input type="submit">enviar</button>
            </form>

        <?php
    break;
     */
}?>