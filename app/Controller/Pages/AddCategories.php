<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Category;
/**
 *
 */
class AddCategories
{

  /**
   * Método que retorna o conteúdo da pagina de Adicionar Categorias
   * @return string
   */
  public static function addCategories() : string
  {
      $newCategory = new Category();
      return View::render('addCategory', [
      ]);
  }
}
