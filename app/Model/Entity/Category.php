<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

/**
 * Model do Produto
 */
class Category
{
    private $name;
    private $code;

    /**
     * Retorna o Nome da Categoria
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Retorna o Código da Categoria
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }

    /**
     * Seta o Nome da Categoria no objeto
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Seta o Codigo da Categoria no objeto
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * Adiciona a Categoria no Banco de Dados
     */
    public function addCategory()
    {
        $this->idcategory = (new Database('category'))->insert([
            'name' => $this->name,
            'code' => $this->code,
        ]);
    }

    /**
     * Retorna todas Categorias do Banco de Dados
     * @param  string $where
     * @param  string $order
     * @param  string $limit
     * @param  string $fields
     * @return PDOStatement
     */
    public static function getCategories($where = null, $order = null, $limit = null, $fields = '*')
    {
        return (new Database('category'))->select($where, $order, $limit, $fields);
    }
}
