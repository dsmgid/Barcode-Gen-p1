<?php
namespace dsmgapp\controllers;
use dsmgfw\views\blade;
class indexController
{
    public function index(){
        echo blade::render('index');
    }

}