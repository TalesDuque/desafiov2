<?php

use \App\Controller\Pages;
use \App\Http\Response;

$obRouter->get('/products', [
    function() {
        return new Response(200, Pages\Products::getProducts());
    }
]);

$obRouter->get('/addProduct', [
    function() {
        return new Response(200, Pages\AddProducts::renderAddProducts());
    }
]);

$obRouter->post('/addProduct', [
    function($request) {
        return new Response(200, Pages\AddProducts::insertProduct($request));
    }
]);

$obRouter->get('/products/{id}/delete', [
    function($request, $id) {
        return new Response(200, Pages\Products::deleteProduct($request, $id));
    }
]);

$obRouter->post('/products/{id}/delete', [
    function($request, $id) {
        return new Response(200, Pages\Products::deleteProductConfirm($request, $id));
    }
]);
