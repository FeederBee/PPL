@extends('ulasan.layout')
 
@section('content')
<div class="row row-cols-lg-4  p-3 border border-4 border-success">
    @foreach ($ulasans as $ulasan)
    <div id="KonfirmasiForm{{ $ulasan->id }}" class="col-sm-6 mb-4 ">
        <div class="card border border-2 border-success ">
            <div class="card-body rounded-bottom">
                <h5 class="card-title">Nama Produk : {{$ulasan->nama_produk}}</h5>
                <h5 for="ulasan"> Ulasan : </h5>
                <p class="card-text" id="ulasan"> {{$ulasan->ulasan}}</p>
            </div>
        </div>
    </div>
    @endforeach
@endsection