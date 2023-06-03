<?php

namespace App\Http\Controllers;

use App\Models\ListTeman;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ListTemanController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->isOwner()){
            $loggedInUserId = Auth::id();
            $listTeman = ListTeman::all();

            if ($listTeman->isNotEmpty() && $listTeman->contains('status', 'Friend')){
                $userOwners = User::where('id', '!=', $loggedInUserId)
                            ->where('status','=', 'Owner')
                            ->whereNotIn('id', $listTeman->pluck('id_teman_user'))
                            ->get(); 
                $temans=ListTeman::where('user_id', '=', $loggedInUserId)
                        ->where('status','=','Friend')
                        ->get();
                return view('Teman.friend_list',compact('temans','listTeman','userOwners','loggedInUserId'));
            }else{
                $userOwners = User::where('id', '!=', $loggedInUserId)
                            ->where('status','=', 'Owner')
                            ->get(); 
                return view('Teman.friend_list', compact('listTeman', 'userOwners'));
            }

            // $temans=ListTeman::where('user_id', $loggedInUserId);
        }
    }


    public function create()
    {
        // $users = User::pluck('nama', 'id');
        
        // // return view('teman.create', ['users' => $users]);
        return redirect()->route('owners.index');
    }

    public function store(Request $request)
    {
        $Valid = $request->validate([
            'id_teman_user' => 'required',
            'status' => 'required',
            'nama' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3024',
        ]);
        
        $Valid['user_id']=auth()->user()->id;
        ListTeman::create($Valid);

        return redirect()->route('owners.index');
    }

    public function destroy(ListTeman $teman)
    {
        $teman->delete();
  
        return redirect()->route('owners.index')->with('success','Product deleted successfully');
    }

    // public function update(Request $request, Pesanan $pesanan)
    // {
    //     if (Auth::user()->isOwner()){
    //         $UpdateValid = $request->validate([
    //             'status'=> 'required',
    //         ]);
    //     }else{
    //         $UpdateValid = $request->validate([
    //             'jumlah' => 'required',
    //         ]);
    //     }
  
    //     $pesanan->update($UpdateValid);
  
    //     return redirect()->route('pesanans.show');
    // }

    // public function friend()
    // {
    //     // $temans = ListTeman::whereHas('user', function ($query) use ($user) {
    //     //     $query->where('user_id', $user->id);
    //     // })->get();

    //     $temans=ListTeman::all();

    //     return view('owners.index',compact('temans'));
        
    // }


}
