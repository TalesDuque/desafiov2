<?php

use \App\Controller\Pages;
use \App\Http\Response;

$obRouter->get('/products', [
    function() {
        return new Response(200, Pages\Products::getProducts());
    }
]);

$obRouter->get('/products/{id}/upload', [
    function() {
        return new Response(200, Pages\Products::uploadImage());
    }
]);

$obRouter->post('/products/{id}/upload', [
    function($request, $id) {
        return new Response(200, Pages\Products::uploadImageConfirm($request, $id));
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
    function() {
        return new Response(200, Pages\Products::deleteProduct());
    }
]);

$obRouter->post('/products/{id}/delete', [
    function($request, $id) {
        return new Response(200, Pages\Products::deleteProductConfirm($request, $id));
    }
]);

$obRouter->get('/products/{id}/edit', [
    function($request, $id) {
        return new Response(200, Pages\Products::editProduct($request, $id));
    }
]);

$obRouter->post('/products/{id}/edit', [
    function($request, $id) {
        return new Response(200, Pages\Products::submitEditProduct($request, $id));
    }
]);
