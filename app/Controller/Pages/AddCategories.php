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
    public static function renderAddCategories() : string
    {
        $newCategory = new Category();
        return View::render('addCategory', [
        ]);
    }

    /**
     * Cadastra uma categoria
     * @param  Request $request
     * @return string
     */
    public static function insertCategory($request) : string
    {
        $productVars = $request->getPostVars();
        $newProduct = new Category();
        $newProduct->setName($productVars['name']);
        $newProduct->setCode($productVars['code']);
        $newProduct->addCategory();
        return Categories::getCategories();
    }
}
