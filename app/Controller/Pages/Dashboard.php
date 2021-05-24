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
        return View::render('dashboard', [
          'name' => 'Tales',
          'description' => 'Alo'
        ]);
    }
}
