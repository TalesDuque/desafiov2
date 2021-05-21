<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

/**
 * Model do Produto
 */
class Product
{

    public $id;
    public $name;
    public $description;
    public $price;
    public $sku;
    public $quantity;
    public $categories;

    /**
     * Retorna ID do Produto
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Retorna Nome do Produto
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Retorna Descrição do Produto
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * Retorna SKU do Produto
     * @return string
     */
    public function getSku() : string
    {
        return $this->sku;
    }

    /**
     * Retorna a Quantidade do Produto
     * @return int
     */
    public function getQuantity() : int
    {
        return $this->quantity;
    }

    /**
     * Retorna as Categorias do Produto
     * @return array
     */
    public function getCategories() : array
    {
        return $this->categories;
    }

    /**
     * Registra o Nome do Produto
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Registra a Descrição do Produto
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Registra o SKU do Produto
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * Registra a Quantidade do Produto
     */
    public function setQuantity($quantity)
    {
        $this->quantity = (int)$quantity;
    }

    /**
     * Registra o Preço do Produto
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Registra as Categorias do Produto
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Adiciona o Produto no Banco de Dados
     */
    public function addProduct()
    {
        $this->id = (new Database('product'))->insert([
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description
        ]);
    }

}
