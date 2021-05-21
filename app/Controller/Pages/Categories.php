<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Category;
/**
 *
 */
class Categories
{

  /**
   * Método que retorna o conteúdo da pagina de Categorias
   * @return string
   */
  public static function getCategories() : string
  {
      $newCategory = new Category();
      return View::render('categories', [
      ]);
  }
}