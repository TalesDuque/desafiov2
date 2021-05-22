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
            'items' => self::getCategoryItems()
        ]);
    }

    /**
    * Método que retorna os itens de Categorias
    * @return string
    */
    private static function getCategoryItems() : string
    {
        $items = '';
        $results = Category::getCategories(null, 'idcategory ASC');
        while($newCategory = $results->fetchObject(Category::class)) {
          $items .= View::render('categories/item', [
              'name' => $newCategory->getName(),
              'code' => $newCategory->getCode(),
          ]);
        }
        return $items;
  }
}
