@extends('app')
@section('content')
<form method="post" action="" id="form" data-parsley-validate>
  <div class="mb-3 form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
          <input type="text" name="nama" class="form-control" id="nama" required="">
      </div>
  </div>
  <div class="mb-3 form-group row">
      <div class="col-sm-10 input-group mb-2">
          <label for="hargajual" class="col-sm-2 col-form-label">Harga</label>
          <span class="input-group-text">Rp. </span>
          <input type="number" required="" value="0" name="harga" class="form-control" id="harga">
      </div>
  </div>
  <div class="mb-3 form-group row">
    <label for="number" class="col-sm-2 col-form-label">Barcode</label>
    <div class="col-sm-10">
        <input type="number" name="barcode" class="form-control" id="barcode" required="">
    </div>
</div>
  <div class="mb-3 form-group row">
      <label for="tambah" class="col-sm-2 col-form-label"></label>
      <input type="submit" name="tambah" class="btn btn-primary waves-effect m-l-5" value="Tambah">
  </div>
</form>
<div class="row">
  <div class="col-12">
    <a class="btn btn-success" href="/print">Print</a>
      <div class="card m-b-30">
          <div class="card-body table-responsive">
            <table id="table" class="table table-bordered dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Harga</td>
                    <td>barcode</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
          </div>
      </div>
  </div> <!-- end col -->
</div> <!-- end row -->
@endsection
@section('footer')
    <script>
      const getBarang = async() => {
          await $.ajax({
              url: "/barang",
              method: "GET",
              success: function(data) {
                $('#table').html(data);
                $('#table').DataTable();
                  return true;
              }
          });
      }
      function delBar(id){
        $.ajax({
              url: "/del",
              method: "post",
              data: {id:id},
              success: function(data) {
                getBarang();
              }
          });
      }
      function addBar(id){
        $.ajax({
              url: "/sel",
              method: "post",
              data: {id:id},
              success: function(data) {
                getBarang();
              }
          });
      }
      function rmBar(id){
        $.ajax({
              url: "/desel",
              method: "post",
              data: {id:id},
              success: function(data) {
                getBarang();
              }
          });
      }
      $('#form').on("submit", function(event) {
        console.log('submitting');
        event.preventDefault();
        $.ajax({
            url: "/barang",
            method: "POST",
            dataType: "JSON",
            data: $('#form').serialize(),
            success: function(data) {
              if(data.status == true){
                getBarang();
              }
                
            }
        });
    });
    $( document ).ready(function() {
    getBarang();
    
});
    </script>
@endsection