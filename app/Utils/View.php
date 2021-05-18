<?php

namespace App\Utils;

/**
 *
 */
class View
{
    private static $vars = [];
    /**
     * Inicia as variáveis iniciais da classe
     * @param  array  $vars
     */
    public static function init($vars = [])
    {
        self::$vars = $vars;
    }
    /**
     * Retorna conteudo da View
     * @param  string $view
     * @return string
     */
    private static function getContentView($view) : string
    {
        $file = __DIR__.'/../../assets/'.$view.'.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Renderiza o conteúdo de uma View
     * @param  string $view
     * @param  array $vars
     * @return string
     */
    public static function render($view, $vars = []) : string
    {
        $contentView = self::getContentView($view);
        $vars = array_merge(self::$vars, $vars);
        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        }, $keys);
        return str_replace($keys, array_values($vars), $contentView);
    }
}
