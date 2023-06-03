<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\User;
use App\Models\ListTeman;
use Illuminate\Support\Facades\Auth;

use App\Events\MessageSent;

class PesanController extends Controller
{
    public function index()
    {
        // Ambil daftar pengguna
        $sender = Auth::user();
        $users = User::where('id', '!=', auth()->user()->id)
                ->where('status', '=', 'Owner')
                ->get();
        $temans=ListTeman::where('user_id', '=', $sender->id)
        ->where('status','=','Friend')
                ->get();
        return view('message.index', compact('users', 'sender', 'temans'));
    }

    public function show(User $user)
    {
        // Ambil pesan antara pengguna saat ini dan pengguna lainnya
        $sender = Auth::user();

        $users = User::where('id', '!=', auth()->user()->id)
        ->where('status', '=', 'Owner')
        ->get();
        
        $messages = Pesan::whereIn('user_id', [auth()->user()->id, $user->id])
            ->whereIn('receiver_id', [auth()->user()->id, $user->id])
            ->orderBy('created_at', 'asc')
            ->get();

        $temans=ListTeman::where('user_id', '=', $sender->id)
                        ->where('status','=','Friend')
                        ->get();
        
        $penerima = $user->nama;

        return view('message.show', compact('user', 'messages','users', 'sender', 'temans', 'penerima'));
    }

    public function store(User $user, Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Simpan pesan ke database
        $message = new Pesan();
        $message->user_id = auth()->user()->id;
        $message->receiver_id = $user->id;
        $message->message = $validatedData['message'];
        $message->save();

        // Kirim pesan baru secara real-time
        event(new MessageSent($message));

        return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
    }

    public function sendMessage($id)
    {
        return view('message', ['id' => $id]);
    }





}
