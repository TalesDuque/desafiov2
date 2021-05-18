<?php

namespace App\Http;

use \Closure;
use \Exception;
/**
 * Classe do Roteador
 */
class Router
{
    private $url = '';
    private $prefix = '';
    private $routes = [];
    private $request;

    /**
     * Construtor da classe Router
     * @param string $url
     */
    public function __construct($url)
    {
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    /**
     * Método para definir o prefixo das rotas
     */
    private function setPrefix()
    {
        $parseUrl = parse_url($this->url);
        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * Adiciona Rota na Classe
     * @param string $method
     * @param string $route
     * @param array  $params
     */
    private function addRoute($method, $route, $params = [])
    {
        foreach ($params as $key => $value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        $patternRoute = '/^'.str_replace('/', '\/', $route).'$/';
        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Retorna a URI sem o prefixo
     * @return string
     */
    private function getUri() : string
    {
        $uri =  $this->request->getUri();
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];
        return end($xUri);
    }

    /**
     * Retorna os Parâmetros da Rota
     * @return array
     */
    private function getRoute() : array
    {
        $uri = $this->getUri();
        $httpMethod = $this->request->getMethod();
        //Uri bate com o padrão?
        foreach ($this->routes as $patternRoute => $methods) {
            if(preg_match($patternRoute, $uri)) {
                if($methods[$httpMethod]) {
                  return $methods[$httpMethod];
                }
                throw new Exception("Método não é permitido", 405);
            }
        }
        throw new Exception("URL não encontrada", 404);
    }

    /**
     * Define a rota de GET
     * @param  string $route
     * @param  array  $params
     */
    public function get($route, $params = [])
    {
        $this->addRoute('GET', $route, $params);
    }

    /**
     * Define a rota de POST
     * @param  string $route
     * @param  array  $params
     */
    public function post($route, $params = [])
    {
        $this->addRoute('POST', $route, $params);
    }

    /**
     * Define a rota de PUT
     * @param  string $route
     * @param  array  $params
     */
    public function put($route, $params = [])
    {
        $this->addRoute('PUT', $route, $params);
    }

    /**
     * Define a rota de DELETE
     * @param  string $route
     * @param  array  $params
     */
    public function delete($route, $params = [])
    {
        $this->addRoute('DELETE', $route, $params);
    }

    /**
     * Executa a Rota Atual
     * @return Response
     */
    public function run() : Response
    {
        try {
            $route = $this->getRoute();
            if(!isset($route['controller'])) {
                throw new Exception("URL não pôde ser processada", 500);
            } 
            $args = [];
            return call_user_func_array($route['controller'], $args);
        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }

}
