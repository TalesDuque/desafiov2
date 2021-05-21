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
        'name' => 'Tales',
        'description' => 'Alo'
      ]);
  }
}
