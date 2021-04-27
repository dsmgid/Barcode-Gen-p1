<?php
namespace dsmgapp\controllers;
use dsmgfw\views\blade;
use dsmgapp\models\barang;
class indexController
{
    public function index(){
        if(!isset($_SESSION['selected'])){
            $_SESSION['selected'] = array();
        }
        $data['barang'] = barang::all();
        echo blade::render('index', $data);
    }
    public function addBarang(){
        $db = new barang();
        $db->nama = $_POST['nama'];
        $db->barcode = $_POST['barcode'];
        $db->harga = $_POST['harga'];
        try{
            $db->save();
            return json_encode(['status' => true]);
        }catch (\Exception $e){
            return json_encode(['status' => false]);
        }   
    }
    public function print(){
        return blade::render('print');
    }
    public function getBarang(){
        $data['barang'] = barang::all();
        return blade::render('tbarang',$data);
    }
    public function delBarang(){
        return barang::destroy($_POST['id']);
    }
    public function ch(){
        $id = $_POST['id'];
        $brg = barang::where('id',$id)->get();
        $arr = ['id'=>$id,'nama'=>$brg[0]->nama, 'barcode'=>$brg[0]->barcode, 'harga'=>$brg[0]->harga,];
        // return print_r($arr);
         $_SESSION['print'][] = $arr;
         array_push($_SESSION['selected'],$id);
         return true;
    }
    public function dh(){
        $id = $_POST['id'];
        $brg = barang::where('id',$id)->get();
        $k1 = array_keys($_SESSION['selected'], $id);
        for($i = 0; $i < count($_SESSION['print']); $i++){
            if($_SESSION['print'][$i]['id'] == $id){
                $k2 = $i;
                // unset($_SESSION['print'][$i]);
            }
        }
        unset($_SESSION['print'][$k2]);
        unset($_SESSION['selected'][$k1[0]]);
        return true;
    }
    public function reset(){
        unset($_SESSION['print']);
        unset($_SESSION['selected']);
    }
}