<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Controller\Pages\Products;
use \App\Model\Entity\Product;
/**
 *
 */
class AddProducts
{

    /**
     * Método que retorna o conteúdo da pagina de Adicionar Produtos
     * @return string
     */
    public static function renderAddProducts() : string
    {
        return View::render('addProduct', [
        ]);
    }

    /**
     * Cadastra um produto
     * @param  Request $request
     * @return string
     */
    public static function insertProduct($request)
    {
        $productVars = $request->getPostVars();
        $newProduct = new Product();
        $newProduct->setName($productVars['name']);
        $newProduct->setSku($productVars['sku']);
        $newProduct->setDescription($productVars['description']);
        $newProduct->setPrice($productVars['price']);
        $newProduct->setQuantity($productVars['quantity']);
        $newProduct->setCategories($productVars['categories']);
        $newProduct->addProduct();
        return Products::getProducts();
    }

}
