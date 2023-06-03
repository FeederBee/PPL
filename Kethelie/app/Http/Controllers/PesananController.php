<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Product;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('products.customer',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        // return $request->file('image')->store();
        $Valid = $request->validate([
            'id_product' => 'required',
            'id_owner' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
        ]);

        $Valid['user_id']=auth()->user()->id;

        Pesanan::create($Valid);
        return redirect()->back();
    }


    public function update(Request $request, Pesanan $pesanan)
    {
        if (Auth::user()->isOwner()){
            $UpdateValid = $request->validate([
                'status'=> 'required',
            ]);
        }else{
            $UpdateValid = $request->validate([
                'jumlah' => 'required',
            ]);
        }
  
        $pesanan->update($UpdateValid);
  
        return redirect()->route('pesanans.show');
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();
  
        return redirect()->route('pesanans.show')->with('success','Product deleted successfully');
    }

    public function showDaftar()
    {
        $user = Auth::user();
        $userId=Auth::id();
        $pesanansOwner = Pesanan::where('id_owner', $userId)->get();
        $pesanansCust = Pesanan::whereHas('user', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->get();
        $pesanans = Pesanan::all();
        return view('Pemesanan.pemesanan', compact('pesanansCust', 'pesanansOwner', 'pesanans', 'user'));

    }
    public function showHistory()
    {
        $user = Auth::user();
        $userId=Auth::id();
        $pesanansOwner = Pesanan::where('id_owner', $userId)->get();
        $pesanansCust = Pesanan::whereHas('user', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->get();
        $pesanans = Pesanan::all();
        $ulasans = Ulasan::all();
        return view('Pemesanan.history', compact('pesanansCust','ulasans', 'pesanansOwner', 'pesanans', 'user'));

    }

}
