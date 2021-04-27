<?php
use Pecee\SimpleRouter\SimpleRouter as Route;
Route::setDefaultNamespace('\dsmgapp\controllers');

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'indexController@index');
    Route::get('print', 'indexController@print');
    Route::get('barang', 'indexController@getBarang');
    Route::get('reset', 'indexController@reset');
    Route::post('barang', 'indexController@addBarang');
    Route::post('del', 'indexController@delBarang');
    Route::post('sel', 'indexController@ch');
});
