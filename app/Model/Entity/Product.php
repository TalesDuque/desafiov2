<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;
use \App\Model\Entity\Category;

/**
 * Model do Produto
 */
class Product
{

    private $idproduct;
    private $name;
    private $description;
    private $price;
    private $sku;
    private $quantity;
    private $categories;

    /**
     * Retorna ID do Produto
     * @return int
     */
    public function getId() : int
    {
        return $this->idproduct;
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
     * Retorna o Preço do
     * @return string
     */
    public function getPrice() : string
    {
        return $this->price;
    }

    /**
     * Retorna as Categorias do Produto
     * @return $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Registra o Nome do Produto
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Registra a Descrição do Produto
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Registra o SKU do Produto
     * @param string $sku
     */
    public function setSku(string $sku)
    {
        $this->sku = $sku;
    }

    /**
     * Registra a Quantidade do Produto
     * @param string $quantity
     */
    public function setQuantity(string $quantity)
    {
        $this->quantity = (int)$quantity;
    }

    /**
     * Registra o Preço do Produto
     * @param string $price
     */
    public function setPrice(string $price)
    {
        $this->price = $price;
    }

    /**
     * Registra as Categorias do Produto
     */
    public function setCategories($categories)
    {
        $this->categories = implode(", ",$categories);
    }

    /**
     * Registra o ID de um Produto (EDIT E DELETE)
     * @param int $id
     */
    public function setId($id)
    {
        $this->idproduct = $id;
    }

    /**
     * Adiciona o Produto no Banco de Dados
     */
    public function addProduct()
    {
        $this->idproduct = (new Database('product'))->insert([
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'categories' => $this->categories
        ]);
    }

    public function addProductRelationships()
    {
        $categories = explode(', ', $this->categories);
        foreach ($categories as $category) {
            $idcategory = Category::getCategoryIdByName($category);
            $newCategory = $idcategory->fetchObject(Category::class);
            (new Database('product_categories'))->insert([
                'idproduct' => $this->idproduct,
                'idcategory' => (int)$newCategory->getId()
            ]);
        }
    }

    /**
     * Retorna todos produtos do Banco de Dados
     * @param  string $where
     * @param  string $order
     * @param  string $limit
     * @param  string $fields
     * @return PDOStatement
     */
    public static function getProducts($where = null, $order = null, $limit = null, $fields = '*')
    {
        return (new Database('product'))->select($where, $order, $limit, $fields);
    }

    /**
     * Deleta produto no banco de Dados
     * @return bool
     */
    public function delete() : bool
    {
        return (new Database('product'))->delete('idproduct = '.$this->idproduct);
    }
}
