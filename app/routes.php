<?php
use Pecee\SimpleRouter\SimpleRouter;
SimpleRouter::setDefaultNamespace('\dsmgapp\controllers');

SimpleRouter::group(['prefix' => '/'], function () {
    SimpleRouter::form('/', 'indexController@index');
});
