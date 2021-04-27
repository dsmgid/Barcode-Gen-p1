<?php namespace dsmgapp\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class barang extends Eloquent
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    public $timestamps = false;
}