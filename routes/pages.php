<?php

use \App\Controller\Pages;
use \App\Http\Response;

// Rota do Dashboard
$obRouter->get('/', [
    function(){
        return new Response(200, Pages\Dashboard::getDashboard());
    }
]);

$obRouter->get('/products', [
    function(){
        return new Response(200, Pages\Products::getProducts());
    }
]);

$obRouter->get('/categories', [
    function(){
        return new Response(200, Pages\Categories::getCategories());
    }
]);

$obRouter->get('/addCategory', [
    function(){
        return new Response(200, Pages\AddCategories::addCategories());
    }
]);

$obRouter->post('/addCategory', [
    function($request){
        return new Response(200, Pages\AddCategories::addCategories());
    }
]);

$obRouter->get('/addProduct', [
    function(){
        return new Response(200, Pages\AddProducts::addProducts());
    }
]);

$obRouter->post('/addProduct', [
    function($request){
        return new Response(200, Pages\AddProducts::addProducts());
    }
]);
