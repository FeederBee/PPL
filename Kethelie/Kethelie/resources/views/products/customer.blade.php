@extends('products.layout')
 
@section('content')
    <div class="position-relative text-center mt-4">
      <h3 class="m-4">Daftar Produk</h3>
        </div>            
    <hr>
    <!-- product -->
    @if($products->count() > 0)
      <div class="m-1 p-1 border border-4 border-success">
        @foreach ($products as $product)
        <div id="editForm{{ $product->id }}" class="card m-2 p-4" style="flex-direction: row; align-items: center;">
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

            <!-- Key for interaction edit ulasan, or deleting data produk -->
            <a class="btn btn-primary position-absolute btn btn-primary bottom-0 m-4" data-bs-target="#ModalUlasan{{ $product->id }}" data-bs-toggle="modal" style="right:90px;" >Lihat Ulasan</a>
            <a class="btn btn-success position-absolute btn btn-primary bottom-0 end-0 m-4"  data-bs-target="#ModalEdit{{ $product->id }}" data-bs-toggle="modal" style="right:90px;">Pesan</a>  
          </div>
        </div>
        <hr class="mb-3" style="margin: 10px; border-width: 4px; border-style: dashed; color: green" />
        @endforeach
      </div>
    @endif
  

    <!-- Modal section -->
    <!-- add pesanan -->
    @if($products->count() > 0)
    @foreach ($products as $product)
    <div class="modal fade" id="ModalEdit{{ $product->id }}" aria-hidden="true" aria-labelledby="ModalEditLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-success border-3">
          <div class="modal-body">
          <form id="editForm{{ $product->id }}" action="{{ route('pesanans.store', $product->id ) }}" enctype="multipart/form-data" class="row g-2" method="POST">
              @csrf
                  <input type="hidden" name="id_product" value="{{ $product->id }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="inputnama" placeholder="Nama Anda"/>
                  <input type="hidden" name="id_owner" value="{{ $product->user_id }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="inputnama" placeholder="Nama Anda"/>
                  <div class="col-md-6 text-start mt-3">
                    <label for="inputnama" class="form-label text-success">Nama Produk</label>
                    <input type="hidden" name="nama" value="{{ $product->nama }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="inputnama" placeholder="Nama Anda"/>
                    <input type="text"  value="{{ $product->nama }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="inputnama" placeholder="Nama Anda" disabled/>
                    @error('nama')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                  </div>
                  <div class="row g-2">
                    <div class="col text-start mt-3">
                      <label for="inputharga" class="form-label text-success">Harga Produk</label>
                      <input type="hidden" value="{{ $product->harga }}" class="form-control border border-2 border-success  @error('harga')is-invalid @enderror" />
                      <input type=""  value="{{ $product->harga }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="inputnama" placeholder="Nama Anda" disabled/>
                      @error('harga')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col text-start mt-3">
                      <label for="inputStok" class="form-label text-success">Jumlah Pesanan</label>
                      <input type="number" name="jumlah"   class="form-control border border-2 border-success  @error('stok')is-invalid @enderror" id="inputStok" />
                      @error('stok')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                
              </div>
              <div class="modal-footer">
                <a class="btn btn-danger" data-bs-dismiss="modal">Batal</a>
                <button class="btn btn-success" type="submit">Pesan</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    @endforeach

     <!-- lihat ulasan -->
     @foreach ($products as $product)
    <div class="modal fade" id="ModalUlasan{{ $product->id }}" aria-hidden="true" aria-labelledby="ModalEditLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border border-success border-3">
        <div class="modal-header">
        <h5 class="modal-title">Ulasan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
          <div class="modal-body ">
              @foreach ($ulasans as $ulasan)
              @if ($ulasan->id_product == $product->id)
              <div class="border border-2 border-success rounded mt-2">
                <div class="row ms-1">
                    <div class="col text-start mt-3">
                      <label for="inputnama" class="form-label text-success">Nama Produk</label>
                      <input type="text" name="nama" value="{{ $product->nama }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="inputnama" style="width:150px" disabled/>
                      @error('nama')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    </div>
                    <div class="row ms-1">
                      <div class="col text-start mt-3">
                        <label for="inputharga" class="form-label text-success">Nama Pengulas</label>
                        <input type="number" name="harga" value="{{ $ulasan->nama_pengulas }}" class="form-control border border-2 border-success  @error('harga')is-invalid @enderror" style="width:150px" disabled/>
                        @error('harga')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                        <hr>
                      </div>
                    </div>

                    
                    <div class="row ms-2 me-4 border border-1 border-success rounded">
                      <div class="col text-start mt-1 ">
                        <label for="inputStok" class="form-label text-success">Ulasan :</label>
                        <p class="ps-3">{{ $ulasan->ulasan }}</p>
                        
                      </div>
                    </div>
                    <hr>
                    @if ($user->status != 'Owner' && $user->id == $ulasan->id_pengulas)
                    <form action="{{ route('ulasans.destroy',$ulasan->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                          <button type="submit" class="btn btn-danger btn btn-primary bottom-0 mb-2 ms-2">Delete</button>
                    </form>
                    @endif

              </div>
              @endif
                  @endforeach
                
              </div>
              <div class="modal-footer">
                <a class="btn btn-danger" data-bs-dismiss="modal">Kembali</a>
              </div>
          </div>
          </div>
        </div>
    @endforeach
      


    @endif
    

      
@endsection