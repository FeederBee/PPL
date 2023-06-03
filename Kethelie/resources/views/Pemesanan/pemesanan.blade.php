@extends('Pemesanan.layout')
 
@section('content')
    <div class="position-relative text-center mt-4">
          <h3 >Daftar Pemesanan </h3>
    </div>            
    <hr>

    <!-- Menampilkan pesanan yang masih belum diapa-apain -->
<div class="row row-cols-lg-4  p-3 border border-4 border-success">
  @if (Auth::user()->isOwner())
    @foreach ($pesanansOwner as $pesanan)
      @if ($pesanan->status!='Dikonfirmasi')
          <div id="KonfirmasiForm{{ $pesanan->id }}" class="col-sm-6 mb-4 ">
          <img src="images/ke the lie.jpg" class="card-img-top border border-2 border-success rounded-top" alt="...">
              <div class="card border border-2 border-success ">
                  <div class="card-body rounded-bottom">
                      <h5 class="card-title">Nama Produk : {{$pesanan->nama}}</h5>
                      <p class="card-text">  Jumlah order : {{$pesanan->jumlah}}</p>
                      <div>
                          <a class="btn btn-success btn btn-primary"  data-bs-target="#ModalKonfirmasi{{ $pesanan->id }}" data-bs-toggle="modal" >Confirmasi</a>
                      </div>
                  </div>
              </div>
          </div>
      @endif
    @endforeach
  @else
    @foreach ($pesanansCust as $pesanan)
      @if ($pesanan->status!='Dikonfirmasi')
        <div class="col-sm-6 mb-4 ">
            <img src="images/ke the lie.png" class="card-img-top border border-2 border-success rounded-top" alt="...">
            <div class="card border border-2 border-success ">
                <div class="card-body rounded-bottom">
                    <h5 class="card-title">Nama Produk : {{$pesanan->nama}}</h5>
                    <p class="card-text">Jumlah Dipesan : {{$pesanan->jumlah}}</p>
                    <div>
                        <form action="{{ route('pesanans.update',$pesanan->id) }}" method="POST">
                        <a class="btn btn-success btn btn-primary"  data-bs-target="#ModalEdit{{ $pesanan->id }}" data-bs-toggle="modal" >Ubah</a>
                            </form>
                        <form action="{{ route('pesanans.destroy',$pesanan->id) }}" method="POST">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger position-absolute btn btn-primary bottom-0 mb-3" style="left:100px">Batal</button>
                        </form>   
                    </div>
                </div>
            </div>
        </div>
      @endif
    @endforeach
  @endif
</div>

<!-- Konfirmasi pemesanan -->
@if($pesanans->count() > 0)
    @foreach ($pesanansOwner as $pesanan)
      @if ($pesanan->status!='Dikonfirmasi')
      <div class="modal fade" id="ModalKonfirmasi{{ $pesanan->id }}" aria-hidden="true" aria-labelledby="ModalEditLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border border-success border-3">
            <div class="modal-body">
              <form id="KonfirmasiForm{{ $pesanan->id }}" action="{{ route('pesanans.update', $pesanan->id ) }}" enctype="multipart/form-data" class="row g-2" method="POST">
                @csrf
                @method ('PUT')
                    <div class="col-md-6 text-start mt-3">
                      <label for="inputnama" class="form-label text-success">Apakah Anda Yakin Ingin Mengkonfirmasi Pesanannya?</label> 
                      <input type="hidden" name="status" value="Dikonfirmasi" class="form-control border border-2 border-success" />    
                    </div>      
                <div class="modal-footer">
                  <a class="btn btn-danger" data-bs-dismiss="modal">Tidak</a>
                  <button class="btn btn-success" type="submit">Ya</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endif
  @endforeach
@endif

<!-- Edit jumlah pemesanan Customer-->
@if($pesanans->count() > 0)
    @foreach ($pesanans as $pesanan)
    <div class="modal fade" id="ModalEdit{{ $pesanan->id }}" aria-hidden="true" aria-labelledby="ModalEditLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-success border-3">
          <div class="modal-body">
          <form id="editForm{{ $pesanan->id }}" action="{{ route('pesanans.update', $pesanan->id ) }}" enctype="multipart/form-data" class="row g-2" method="POST">
              @csrf
              @method ('PUT')
                  <div class="col-md-6 text-start mt-3">
                    <label for="inputnama" class="form-label text-success">Nama Produk</label>
                    <input type="hidden" name="nama" value="{{ $pesanan->nama }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="inputnama" placeholder="Nama Anda"/>
                    <input type="text"  value="{{ $pesanan->nama }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="inputnama" placeholder="Nama Anda" disabled/>
                    @error('nama')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                  </div>
                    <div class="col text-start mt-3">
                      <label for="inputStok" class="form-label text-success">Jumlah Pesanan</label>
                      <input type="number" name="jumlah"   class="form-control border border-2 border-success  @error('stok')is-invalid @enderror" id="inputStok" placeholder="{{ $pesanan->jumlah }}"/>
                      @error('stok')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
          
              <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-success" type="submit">Submit</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    @endforeach
    @endif
@endsection