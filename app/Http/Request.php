<?php

namespace App\Http;

/**
 *  Classe de Request do Client
 */
class Request
{
    private $httpMethod;
    private $uri;
    private $queryParams = [];
    private $postVars = [];
    private $headers = [];

    /**
     * Construtor da Classe Request
     */
    public function __construct()
    {
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';
    }

    /**
     * Metodo que retorna o Metodo HTTP
     * @return string
     */
    public function getMethod() : string
    {
        return $this->httpMethod;
    }

    /**
     * Metodo que retorna a URI
     * @return string
     */
    public function getUri() : string
    {
        return $this->uri;
    }

    /**
     * Metodo que retorna os Headers
     * @return array
     */
    public function getHeaders() : array
    {
        return $this->headers;
    }

    /**
     * Metodo que retorna os parâmetros da URL
     * @return array
     */
    public function getQueryParams() : array
    {
        return $this->queryParams;
    }

    /**
     * Metodo que retorna as variáveis POST
     * @return array
     */
    public function getPostVars() : array
    {
        return $this->postVars;
    }
}
