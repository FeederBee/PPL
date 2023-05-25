@extends('products.layout')
 
@section('content')
    <div class="position-relative text-center mt-4">
      <h3 class="m-4">Daftar Produk</h3>
      <!-- add product -->
        </div>            
    <hr>
    <!-- product -->
    @if($products->count() > 0)
      <div class="m-1 p-1 border border-4 border-success">
        @foreach ($products as $product)
        <div id="editForm" class="card m-2 p-4" style="flex-direction: row; align-items: center;">
          @if ($product->image)
            <img src="{{ asset('storage/' .$product->image) }}" alt="foto produk" height="200px" style="width: 200px" />
          @else
            <img src="image/e87fb9b637d17ac418e9059f7273d96a.jpg" class="card-img-top" alt="foto produk" height="200px" style="width: 200px" />
          @endif
          <div class="card-body ps-4 pt-2" style=" text-align:left">
            <h5 class="position-absolute card-title top-0" style="margin-top: 50px">{{ $product->nama }}</h5>
            <hr class="mt-5 border border-success"/>
            <p class="card-text position-relative pb-4" style="top: 20px">Harga/satuan : Rp{{ $product->harga }}</p>
            <p class="card-text position-relative">Stok : {{ $product->stok }}</p>

            <!-- Key for interaction edit or deleting data produk -->
            <a class="btn btn-success position-absolute btn btn-success bottom-0 end-0 m-4"  data-bs-target="#ModalEdit" data-bs-toggle="modal" style="right:90px;">Pesan</a>       
          </div>
        </div>
        <hr class="mb-3" style="margin: 10px; border-width: 4px; border-style: dashed; color: green" />
        @endforeach
      </div>
    @endif
  

    <!-- Modal section -->
    <!-- See -->
    @if($products->count() > 0)
    @foreach ($products as $product)
    <div class="modal fade" id="ModalEdit" aria-hidden="true" aria-labelledby="ModalEditLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-success border-3">
          <div class="modal-body">
      <form id="editForm" action="{{ route('products.update', $product->id ) }}" class="row g-2" method="POST">
          @csrf
          @method('PUT')
                  <div class="text-start mt-3">
                    <label for="formFile" class="form-label text-success">Foto</label>
                    <input class="form-control border border-2 border-success" type="file" id="formFile" />
                  </div>
                  <div class="col-md-6 text-start mt-3">
                    <label for="inputnama" class="form-label text-success">Nama</label>
                    <input type="text" name="nama" value="{{ $product->nama }}" class="form-control border border-2 border-success" id="inputnama" placeholder="Nama Anda"/>
                  </div>
                  <div class="row g-2">
                    <div class="col text-start mt-3">
                      <label for="inputharga" class="form-label text-success">Harga</label>
                      <input type="text" name="harga" value="{{ $product->harga }}" class="form-control border border-2 border-success" />
                    </div>
                    <div class="col text-start mt-3">
                      <label for="inputStok" class="form-label text-success">Stok</label>
                      <input type="text" name="stok" value="{{ $product->stok }}"  class="form-control border border-2 border-success" id="inputStok" />
                    </div>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-success" >Submit</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    @endforeach
    @endif

      
@endsection