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
     */
    public static function deleteProductConfirm($request, $id)
    {
        $delProduct = new Product();
        $delProduct->setId($id);
        $delProduct->delete();
        self::productRedirect($request);
    }

    /**
     * Retorna a view de edit com as informações do produto selecionada
     * @param  Request $request
     * @param  string $id
     * @return string
     */
    public static function editProduct($request, $id) : string
    {
        $results = Product::getProductById($id);
        $info = $results->fetchObject(Product::class);
        return View::render('editProduct', [
            'sku' => $info->getSku(),
            'name' => $info->getName(),
            'price' => $info->getPrice(),
            'quantity' => $info->getQuantity(),
            'description' => $info->getDescription(),
            'categories' => Categories::getCategoryItems('categories/addItem')
        ]);
    }

    /**
     * De fato realiza a edição da entidade de Produto
     * @param  Request $request
     * @param  string $id
     */
    public static function submitEditProduct($request, $id)
    {
        $productVars = $request->getPostVars();
        $editProduct = new Product();
        $editProduct->setId($id);
        $editProduct->setName($productVars['name']);
        $editProduct->setSku($productVars['sku']);
        $editProduct->setDescription($productVars['description']);
        $editProduct->setPrice($productVars['price']);
        $editProduct->setQuantity($productVars['quantity']);
        $editProduct->setCategories($productVars['categories']);
        $editProduct->updateProductRelationships();
        $editProduct->update();
        self::productRedirect($request);
    }

    /**
     * Redireciona para a view de Produtos
     * @param  Request $request
     * @return string
     */
    public static function productRedirect($request) : string
    {
        $request->getRouter()->redirect('/products');
        return self::getProducts();
    }
}
