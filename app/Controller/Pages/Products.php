<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Product;
/**
 *
 */
class Products
{
    /**
     * Método que retorna o conteúdo da pagina de Produtos
     * @return string
     */
    public static function getProducts() : string
    {
        $newProduct = new Product();
        return View::render('products', [
            'items' => self::getProductItems()
        ]);
    }

    /**
    * Método que retorna os itens de Produtos
    * @return string
    */
    private static function getProductItems() : string
    {
        $items = '';
        $results = Product::getProducts(null, 'idproduct ASC');
        while($newProduct = $results->fetchObject(Product::class)) {
          $items .= View::render('products/item', [
              'name' => $newProduct->getName(),
              'sku' => $newProduct->getSku(),
              'price' => $newProduct->getPrice(),
              'quantity' => $newProduct->getQuantity(),
              'categories' => $newProduct->getCategories(),
              'id' => $newProduct->getId()
          ]);
        }
        return $items;
    }

    /**
     * Renderiza a pagina de confirmação de delete de Produto
     * @param  Request $request
     * @param  int $id
     * @return string
     */
    public static function deleteProduct($request, $id) : string
    {
        return View::render('deleteProduct', [
        ]);
    }

    /**
     * Deleta o Produto e Redireciona para pagina de Produtos
     * @param  Request $request
     * @param  int $id 
     * @return string
     */
    public static function deleteProductConfirm($request, $id) : string
    {
        $delProduct = new Product();
        $delProduct->setId($id);
        $delProduct->delete();
        $request->getRouter()->redirect('/products');
        return self::getProducts();
    }
}
