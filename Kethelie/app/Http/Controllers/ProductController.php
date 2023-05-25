<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isOwner()){
            $user = Auth::user();
            $products = Product::whereHas('user', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
            return view('products.owner',compact('user','products'))->with('i', (request()->input('page', 1) - 1) * 5);

        }else {
            $products = Product::all();
            return view('products.customer',compact('products'));

        }

        // return view('products.index',compact('customerproduk','user','products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store()
;
        $ImageValid = $request->validate([

            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:3024'
        ]);

        if ($request->file('image')) {
            $ImageValid['image']= $request->file('image')->store('produk-images');
        } else {
            
        }

        $ImageValid['user_id']=auth()->user()->id;

        Product::create($ImageValid);
        // Product::create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $UpdateValid = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:3024'
        ]);

        if ($request->file('image')) {
            $UpdateValid['image']= $request->file('image')->store('produk-images');
        } else {
            
        }

  
        $product->update($UpdateValid);
  
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }

    public function userid()
    {
        $userId = Auth::id(); // Mengambil ID pengguna yang sedang login
        return view('products.index', compact('userId'));
    }

}