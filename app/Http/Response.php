<?php

namespace App\Http;

/**
 * Classe da Response do Servidor
 */
class Response
{
    private $httpCode = 200;
    private $headers = [];
    private $contentType = 'text/html';
    private $content;

    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    /**
     * Metodo que altera o tipo de conteúdo da resposta
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Adiciona registro no cabeçalho da resposta
     * @param string $key
     * @param string $value
     */
    public function addHeader($key, $value)
    {
        $this->header[$key] = $value;
    }

    /**
     * Envia os Headers para o Navegador
     */
    private function sendHeaders()
    {
        // Status
        http_response_code($this->httpCode);
        // Headers
        foreach ($this->headers as $key => $value) {
            header($key.': '.$value);
        }
    }

    /**
     * Envia a Resposta
     */
    public function sendResponse()
    {
        // Envia os Headers
        $this->sendHeaders();
        // Imprime o Conteudo
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                break;
        }
    }
}
