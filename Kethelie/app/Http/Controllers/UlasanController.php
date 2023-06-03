<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\Product;
use App\Models\Pesanan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UlasanController extends Controller
{
    //
    public function index()
    {
        $ulasans = Ulasan::all();
        return view('Pemesanan.history',compact('ulasans'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show()
    {
        $user = Auth::user();
        $ulasans = Ulasan::all();
        return view('ulasan.customer', compact('ulasans', 'user'));

    }

    public function store(Request $request)
    {
        $Valid = $request->validate([
            'nama_produk' => 'required',
            'nama_pengulas' => 'required',
            'ulasan' => 'required',
        ]);

        $pesanan = $request->input('id_product');
        $produk = Product::findOrFail($pesanan);
        
        $Valid['id_product']=$produk->id;
        $Valid['id_pengulas']=auth()->user()->id;


        Ulasan::create($Valid);

        return redirect()->back();
    }

    public function update(Request $request, Ulasan $ulasan)
    {
        $UpdateValid = $request->validate([
            'ulasan' => 'required',
        ]);
        $ulasan->update($UpdateValid);
  
        return redirect()->route('ulasan.show');
    }
    
    public function destroy(Ulasan $ulasan)
    {
        $ulasan->delete();
  
        return redirect()->back();
    }
}
