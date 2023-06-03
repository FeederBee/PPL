@foreach ($ulasans as $ulasan)
    <div class="row">
        <div class="col text-start mt-3">
          <label for="inputnama" class="form-label text-success">Nama Produk</label>
          <input type="text" name="nama" value="{{ $products->nama }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="inputnama" style="width:150px" disabled/>
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    
    <div class="row">
        <div class="col text-start mt-3">
          <label for="inputharga" class="form-label text-success">Nama Pengulas</label>
          <input type="number" name="harga" value="{{ $products->harga }}" class="form-control border border-2 border-success  @error('harga')is-invalid @enderror" style="width:150px" disabled/>
          @error('harga')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
    </div>

    <div class="row">
        <div class="col text-start mt-3">
            <label for="inputStok" class="form-label text-success">Ulasan</label>
            <textarea rows="4" cols="50" name="ulasan" value="" class="form-control border border-2 border-success  @error('stok')is-invalid @enderror" id="ulasan"></textarea>
        </div>
    </div>
@endforeach