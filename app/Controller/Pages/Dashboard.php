<?php

namespace App\Controller\Pages;

use \App\Utils\View;
/**
 *
 */
class Dashboard extends Page
{

  /**
   * Método que retorna o conteúdo da Dashboard
   * @return string
   */
  public static function getDashboard() : string
  {
      return View::render('dashboard', [
        'name' => 'Tales',
        'description' => 'Alo'
      ]);
  }
}
