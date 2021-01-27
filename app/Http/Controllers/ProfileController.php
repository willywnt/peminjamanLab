<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\UpdatePasswordRequest;

class ProfileController extends Controller
{
    public function profil(Request $request){
        $user = User::with('profile')->where('id',$request->user()->id)->get();
        return view('profil',compact('user'));
    }

    public function password(){
        return view('profil.password');
    }
    public function ganti_password(UpdatePasswordRequest $request){
        auth()->user()->update([
            'password' => Hash::make($request->get('new_password'))
        ]);
        return redirect('password')->with('success','Password berhasil diganti');
    }

    public function update(Request $request){
        
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nomor_hp' => 'required|numeric|digits_between:11,13',
            'email' => Rule::unique('users')->ignore(auth()->user()->id)
        ]);
        
        $profile = Profile::where('user_id',auth()->user()->id);
        $profile->update([
            'nomor_hp' => $request->nomor_hp
        ]);
        auth()->user()->update([
            'email' => $request->email
        ]);

        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            if(auth()->user()->avatar){
                Storage::delete('/public/images/'. auth()->user()->avatar);
            }
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update([
                'avatar' => $filename
            ]);
        }
        return redirect()->back()->with('success','Data berhasil diupdate');
    }
}
