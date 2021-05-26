<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Product;
/**
 *
 */
class Dashboard
{

    /**
     * Método que retorna o conteúdo da Dashboard
     * @return string
     */
    public static function getDashboard() : string
    {
        $newProduct = new Product();
        $results = $newProduct->getNumberProducts();
        $info = $results->fetch();
        return View::render('dashboard', [
          'itemquantity' => $info['COUNT(*)'],
          'item' => self::getProductsInfo()
        ]);
    }

    public static function getProductsInfo() : string
    {
        $items = '';
        $results = Product::getProducts(null, 'idproduct ASC');
        while($newProduct = $results->fetchObject(Product::class)) {
          $items .= View::render('dashboard/item', [
              'name' => $newProduct->getName(),
              'price' => $newProduct->getPrice(),
              'quantity' => $newProduct->getQuantity(),
          ]);
        }
        return $items;
    }
}
