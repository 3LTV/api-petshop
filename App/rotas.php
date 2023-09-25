<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri)
{
	/**
	 * Rotas para Correntista
	 */
    case "/api/home":
        exit("home");
    break;

}
?>