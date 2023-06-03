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
        }
    }


    public function create()
    {
        $users = User::pluck('nama', 'id');
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

    public function destroy($id)
    {
        $teman = ListTeman::findOrFail($id);
        $teman->delete();
        return redirect()->back()->with('success', 'Teman berhasil dihapus');
        // return redirect()->route('owners.index')->with('success','Product deleted successfully');
    }
}
