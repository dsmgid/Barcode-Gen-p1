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
                      @php
                          $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                      @endphp
                      @foreach ($barang as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->harga }}</td>
                        <td><img src="data:image/png;base64,{{ base64_encode($generator->getBarcode($item->barcode, $generator::TYPE_EAN_13))  }}"></td>
                        <td>
                            <button class="btn btn-danger" onclick="delBar(this.value)" value="{{ $item->id }}">Hapus</button>
                            
                            @if (in_array($item->id,$_SESSION['selected']))
                            <button class="btn btn-warning" onclick="rmBar(this.value)" value="{{ $item->id }}">Batal</button>
                            @else
                            <button class="btn btn-primary" onclick="addBar(this.value)" value="{{ $item->id }}">Pilih</button>
                            @endif
                        </td>
                    </tr>
                      @endforeach
                    
                  </tbody>
              </table>