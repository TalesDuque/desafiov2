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
        $items = '';
        while($newCategory = $results->fetchObject(Category::class)) {
          $items .= View::render($path, [
              'name' => $newCategory->getName(),
              'code' => $newCategory->getCode(),
              'id' => $newCategory->getId()
          ]);
        }
        return (isset($items)) ? $items : '';
    }

    /**
     * Renderiza a pagina de confirmação de delete de Categoria
     * @param  Request $request
     * @param  int $id
     * @return string
     */
    public static function deleteCategory($request, $id) : string
    {
        return View::render('deleteCategory', [
        ]);
    }

    /**
     * Deleta a Categoria e Redireciona para pagina de Categorias
     * @param  Request $request
     * @param  int $id
     * @return string
     */
    public static function deleteCategoryConfirm($request, $id) : string
    {
        $delCategory = new Category();
        $delCategory->setId($id);
        $delCategory->delete();
        self::categoryRedirect($request);
    }

    /**
     * Retorna a view com as informações da categoria selecionada
     * @param  Request $request
     * @param  string $id
     * @return string
     */
    public static function editCategory($request, $id) : string
    {
        $results = Category::getCategoryById($id);
        $info = $results->fetchObject(Category::class);
        return View::render('editCategory', [
            'name' => $info->getName(),
            'code' => $info->getCode()
        ]);
    }

    /**
     * De fato realiza a edição da entidade de Categoria
     * @param  Request $request
     * @param  string $id
     */
    public static function submitEditCategory($request, $id)
    {
        $productVars = $request->getPostVars();
        $editCategory = new Category();
        $editCategory->setId($id);
        $editCategory->setName($productVars['name']);
        $editCategory->setCode($productVars['code']);
        $editCategory->update();
        self::categoryRedirect($request);
    }

    /**
     * Redireciona para a view de Categorias
     * @param  Request $request
     * @return string
     */
    public static function categoryRedirect($request) : string
    {
        $request->getRouter()->redirect('/categories');
        return self::getCategories();
    }
}
