<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BahanController extends Controller
{
    //
    public function index() 
    {
        
        $user = Auth::user();
        $bahans = Bahan::whereHas('user', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        return view('bahan.layout',compact('user','bahans'))->with('i', (request()->input('page', 1) - 1) * 5);
        

    }

    public function store(Request $request)
    {
        //
        $BahanValid = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
        $BahanValid['user_id']=auth()->user()->id;

        Bahan::create($BahanValid);
        return redirect()->route('Bahan.index');
    }

    public function update(Request $request, $id)
    {
        $UpdateValid = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $bahan = Bahan::findOrFail($id);
  
        $bahan->update($UpdateValid);
  
        return redirect()->route('Bahan.index');
    }

    public function destroy($id)
    {   
        $bahan = Bahan::findOrFail($id);
        $bahan->delete();

        return redirect()->route('Bahan.index');
    }

    public function updateStok(Request $request, $id)
    {
        $bahan = Bahan::findOrFail($id);
        $jumlahTambahan = $request->input('jumlah_tambahan');

        if ($bahan) {
            $bahan->stok += $jumlahTambahan;
            $bahan->save();
        }

        return redirect()->route('Bahan.index')->with('success', 'Stok bahan berhasil diperbarui.');
    }
    
}
