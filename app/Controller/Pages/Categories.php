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
            'items' => self::getCategoryItems('categories/item')
        ]);
    }

    /**
    * Método que retorna os itens de Categorias
    * @param string $path
    * @return string
    */
    public static function getCategoryItems($path) : string
    {
        $items = '';
        $results = Category::getCategories(null, 'idcategory ASC');
        $items = self::renderCategoryItems($results, $path);
        return $items;
    }

    /**
     * Renderiza os itens de categoria de acordo com o path do html
     * @param  PDOStatement $results
     * @param  string $path
     * @return string
     */
    private static function renderCategoryItems($results, $path) : string
    {
        while($newCategory = $results->fetchObject(Category::class)) {
          $items .= View::render($path, [
              'name' => $newCategory->getName(),
              'code' => $newCategory->getCode(),
          ]);
        }
        return $items;
    }
}
