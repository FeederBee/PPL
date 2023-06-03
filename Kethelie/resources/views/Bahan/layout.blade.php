<!DOCTYPE html>
<html>
<head>
    <title>Ke The Lie | Bahan Baku</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    

</head>
<body>
  <nav class="navbar navbar-light bg-success">
      <div class="container-fluid ms-3">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
          <img src="images/ke the lie.png" alt="Logo" width="50" height="45" />
        </a>
      </div>
    </nav>
  
<div class="m-4">
     <div class="position-relative text-center mt-4">
       <h3 class="m-4">Daftar Bahan Baku</h3>
       <!-- add bahan -->
       <div>
         <button
           class="btn btn-outline-success position-absolute top-0 end-0"
           data-bs-target="#ModalAdd"
           data-bs-toggle="modal"
         >
           + Tambah Bahan Baku
         </button>
         </div>            
     <hr>
     <!-- bahan -->
     @if($bahans->count() > 0)
       <div class="m-1 p-1 border border-4 border-success">
         @foreach ($bahans as $bahan)
         <div id="editForm{{ $bahan->id }}" class="card m-2 p-4" style="flex-direction: row; align-items: center;">
           <div class="card-body ps-4 pt-2" style=" text-align:left">
             <h5 class="position-absolute card-title top-0" style="margin-top: 50px">{{ $bahan->nama }}</h5>
             <hr class="mt-5 border border-success"/>
             <p class="card-text position-relative pb-4" style="top: 20px">Harga : Rp{{ $bahan->harga }}</p>
             <p class="card-text position-relative">Stok : {{ $bahan->stok }}</p>
 
             <!-- Key for interaction edit or deleting data produk -->
             <a class="btn btn-success position-absolute btn btn-primary bottom-0 m-4"  data-bs-target="#ModalTambahStok{{ $bahan->id }}" data-bs-toggle="modal" style="right:160px;">Tambah Stok</a>
             <a class="btn btn-success position-absolute btn btn-primary bottom-0 m-4"  data-bs-target="#ModalEdit{{ $bahan->id }}" data-bs-toggle="modal" style="right:90px;">Edit</a>
             <form action="{{ route('Bahan.destroy', $bahan->id) }}" method="POST">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-danger position-absolute btn btn-primary bottom-0 end-0 m-4">Delete</button>
             </form>        
           </div>
         </div>
         <hr class="mb-3" style="margin: 10px; border-width: 4px; border-style: dashed; color: green" />
         @endforeach
       </div>
     @endif
   
 
     <!-- Modal section -->
     <!-- Bahan Add -->
     <div class="modal fade" id="ModalAdd" aria-hidden="true" aria-labelledby="ModalAddLabel" tabindex="-1">
       <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content border border-success border-3">
           <div class="modal-body">
             <form action="{{ route('Bahan.store') }}" class="row g-2 " method="POST">
                 @csrf
                   <input type="hidden" name="user_id" value="{{ $user->id }}">
                   <div class="col-md-6 text-start mt-3">
                     <label for="inputnama" class="form-label text-success text-start">Nama</label>
                     <input type="text" name="nama" class="form-control border border-2 border-success @error('nama')is-invalid @enderror" id="inputnama" placeholder="Nama Bahan Baku"/>
                     @error('nama')
                         <div class="invalid-feedback">
                           {{ $message }}
                         </div>
                       @enderror
                   </div>
                   <div class="row g-2">
                     <div class="col text-start mt-3">
                       <label for="inputharga" class="form-label text-success text-start">Harga</label>
                       <input type="number" name="harga" class="form-control border border-2 border-success @error('harga')is-invalid @enderror" placeholder="Harga Bahan Baku" />
                       @error('harga')
                         <div class="invalid-feedback">
                           {{ $message }}
                         </div>
                       @enderror
                     </div>
                     <div class="col text-start mt-3">
                       <label for="inputStok" class="form-label text-success text-start">Stok</label>
                       <input type="number" name="stok" class="form-control border border-2 border-success @error('stok')is-invalid @enderror" id="inputStok" placeholder="Stok Bahan Baku"/>
                       @error('stok')
                         <div class="invalid-feedback">
                           {{ $message }}
                         </div>
                       @enderror
                     </div>
                   </div>
                 </div>
                 <div class="modal-footer">
                   
                   <button class="btn btn-success" type="submit" >Tambahkan</button>
                 </div>
               </div>
             </div>
           </div>
         </form>
     <!-- edit -->
     @if($bahans->count() > 0)
     @foreach ($bahans as $bahan)
     <div class="modal fade" id="ModalEdit{{ $bahan->id }}" aria-hidden="true" aria-labelledby="ModalEditLabel" tabindex="-1">
       <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content border border-success border-3">
           <div class="modal-body">
           <form id="editForm{{ $bahan->id }}" action="{{ route('Bahan.update', $bahan->id ) }}" enctype="multipart/form-data" class="row g-2" method="POST">
               @csrf
               @method('PUT')
                   <div class="col-md-6 text-start mt-3">
                     <label for="inputnama" class="form-label text-success">Nama</label>
                     <input type="text" name="nama" value="{{ $bahan->nama }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="inputnama"/>
                     @error('nama')
                         <div class="invalid-feedback">
                           {{ $message }}
                         </div>
                       @enderror
                   </div>
                   <div class="row g-2">
                     <div class="col text-start mt-3">
                       <label for="inputharga" class="form-label text-success">Harga</label>
                       <input type="text" name="harga" value="{{ $bahan->harga }}" class="form-control border border-2 border-success  @error('harga')is-invalid @enderror" />
                       @error('harga')
                         <div class="invalid-feedback">
                           {{ $message }}
                         </div>
                       @enderror
                     </div>
                     <div class="col text-start mt-3">
                       <label for="inputStok" class="form-label text-success">Stok</label>
                       <input type="text" name="stok" value="{{ $bahan->stok }}"  class="form-control border border-2 border-success  @error('stok')is-invalid @enderror" id="inputStok" />
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
                 <button class="btn btn-success" type="submit">Submit</button>
               </div>
             </form>

             
             </div>
           </div>
         </div>

    <!-- Tambah Stok -->
    <div class="modal fade" id="ModalTambahStok{{ $bahan->id }}" aria-hidden="true" aria-labelledby="ModalEditLabel" tabindex="-1">
       <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content border border-success border-3">
           <div class="modal-body">
           <form id="editForm{{ $bahan->id }}" action="{{ route('Bahan.updateStok', $bahan->id ) }}" enctype="multipart/form-data" class="row g-2" method="POST">
               @csrf
               @method('PUT')
               
                     <div class="col text-start mt-3">
                       <label for="TambahStok" class="form-label text-success">Stok Baru</label>
                       <input type="number" name="jumlah_tambahan"  placeholder="Masukkan Jumlah Stok Baru" class="form-control border border-2 border-success  @error('stok')is-invalid @enderror" id="TambahStok" />
                       @error('stok')
                         <div class="invalid-feedback">
                           {{ $message }}
                         </div>
                       @enderror
                     </div>
                   </div>
                 
                  <div class="modal-footer ">
                    <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-success" type="submit">Submit</button>
                  </div>
             </form>

             
             </div>
           </div>
         </div>
     @endforeach

     @endif
</div>

<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
   
</body>
</html>