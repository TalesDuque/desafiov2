<?php

use \App\Controller\Pages;
use \App\Http\Response;

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
