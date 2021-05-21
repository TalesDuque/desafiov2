<?php

namespace App\Controller\Pages;

use \App\Utils\View;
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
  public static function addProducts() : string
  {
      $newProduct = new Product();
      return View::render('addProduct', [
      ]);
  }
}
