<?php

use \App\Controller\Pages;
use \App\Http\Response;

// Rota do Dashboard
$obRouter->get('/', [
    function() {
        return new Response(200, Pages\Dashboard::getDashboard());
    }
]);

$obRouter->get('/products', [
    function() {
        return new Response(200, Pages\Products::getProducts());
    }
]);

$obRouter->get('/categories', [
    function() {
        return new Response(200, Pages\Categories::getCategories());
    }
]);

$obRouter->get('/addCategory', [
    function() {
        return new Response(200, Pages\AddCategories::renderAddCategories());
    }
]);

$obRouter->post('/addCategory', [
    function($request) {
        return new Response(200, Pages\AddCategories::insertCategory($request));
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

$obRouter->get('/categories/{id}/delete', [
    function($request, $id) {
        return new Response(200, Pages\Categories::deleteCategory($request, $id));
    }
]);

$obRouter->post('/categories/{id}/delete', [
    function($request, $id) {
        return new Response(200, Pages\Categories::deleteCategoryConfirm($request, $id));
    }
]);
