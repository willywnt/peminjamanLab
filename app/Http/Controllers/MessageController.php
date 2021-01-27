<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan_User;


class MessageController extends Controller
{
    public function kirim(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:3|max:1000'
        ]);

        $data = new Pesan_User;
        $data->pesan = $request->message;
        $data->user_id = auth()->user()->id;
        $data->save();

        return redirect()->back()->with('success', 'Terima kasih telah mengirim pesan');
    }
}
