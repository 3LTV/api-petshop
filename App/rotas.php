<?php

use App\Controller\ProdutoController;
use App\Controller\ServicoController;
use App\Controller\EnderecoController;

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

    // Serviço
    case "/api/servico":
        ServicoController::getServico();
    break;

    case "/api/servico/by-id":
        ServicoController::getServicoById();
    break;

    case "/api/servico/add":
        ServicoController::addServico();
    break;

    case "/api/servico/edit":
        ServicoController::editServico();
    break;

    case "/api/servico/remove":
        ServicoController::removerServico();
    break;

    // Endereço
    case "/api/endereco":
        EnderecoController::getEndereco();
    break;

    case "/api/endereco/by-id":
        EnderecoController::getEnderecoById();
    break;

    case "/api/endereco/add":
        EnderecoController::addEndereco();
    break;

    case "/api/endereco/edit":
        EnderecoController::editEndereco();
    break;

    case "/api/endereco/remove":
        EnderecoController::removerEndereco();
    break;
}
