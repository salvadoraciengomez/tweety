<?php

namespace App;
use App\User;

trait Followable{
    public function follow(User $user){
        return $this->follows()->save($user);
    }

    public function unfollow(User $user){
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user){
        // if(auth()->user()->following($user)){
        //     auth()->user()->unfollow($user);
        // }
        // else{
            
        //     auth()->user()->follow($user);
        // }
        if($this->following($user)){
            return $this->unfollow($user);
        }
        else{
            
            return $this->follow($user);
        }
    }


    public function followers(){
        $todos=User::all();
        $losSeguidores=[];
        $i=0;
        foreach ($todos as $current){
            $i++;
            if($current->following(auth()->user())) $losSeguidores[$i]=$current;
        }

        return $losSeguidores;   
    }

    public function follows(){
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
        // desde la tabla follows, campos user_id following_user_id
    }

    public function following(User $user){
        // return $this->follows->contains($user);//Se intercambia con la línea de abajo por si hay miles de registros
        return $this->follows()->where('following_user_id', $user->id)->exists();
        
    }
}
?>