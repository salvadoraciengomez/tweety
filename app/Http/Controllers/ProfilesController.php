<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user){
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user){

        if($user->isNot(auth()->user())) abort(403);
        //Use policy instead @vid63 4:50

        return view('profiles.edit', compact('user'));

    }

    public function update(User $user){

        $attributes= request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user)
            ],
            'name' => [
                'string',
                'required',
                'max:255'
            ],
            'avatar' => [
                'file'
            ],
            'email' => ['string', 'required', 'email', 'max:255',Rule::unique('users')->ignore($user)],
            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed'
            ],
        ]);

            if(request('avatar')){
                $attributes['avatar']=request('avatar')->store('avatars');
            }
        
        //require: 
        //.env >> FILESYSTEM_DRIVER=public
        //php artisan storage:link

        $user->update($attributes);
        return redirect($user->path());
    }

    public function showAll(){
        $todos=\DB::table('users')->select('username')->get();
        return view('profiles.showAll', [
            'todos' => $todos
        ]);
    }
}
