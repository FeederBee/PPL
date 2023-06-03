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
        // $userId=Auth::id();
        // $pesanans = Pesanan::all();

        // if (Auth::user()->isOwner()){
        //     $user = Auth::user();
        //     $products = Product::whereHas('user', function ($query) use ($user) {
        //         $query->where('user_id', $user->id);
        //     })->get();

        //     // $ulasans = Ulasan::whereHas('user', function ($query) use ($user) {
        //     //     $query->where('id_product', $products->id);
        //     // })->get();
        //     $ulasans = Ulasan::all();
        //     return view('ulasan.daftarulasan',compact('user','products', 'ulasans'))->with('i', (request()->input('page', 1) - 1) * 5);
        // }

        // }else
        // {
        //     $ulasans = Ulasan::whereHas('user', function ($query) use ($user) {
        //         $query->where('id_pengulas', $user->id);
        //     })->get();
        //     // $ulasans = Pesanan::all();
        //     return view('ulasan.customer', compact('ulasans', 'user'));

        // }
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
        // if (Auth::user()->isOwner()){
        //     $UpdateValid = $request->validate([
        //         'status'=> 'required',
        //     ]);
        // }else{
        //     $UpdateValid = $request->validate([
        //         'ulasan' => 'required',
        //     ]);
        // }
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
