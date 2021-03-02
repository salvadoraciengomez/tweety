<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Tweet;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline(){
        return Tweet::where('user_id', $this->id)->latest()->get();
        //$ids= Mete los ids de los usuarios a los que sigue
        $ids= $this->follows->pluck('id');
        //Añade los propios a $ids
        $ids->push($this->id);
        //Devuelve los tuits con las ids que hay en $ids ordenados por más reciente
        Tweet::whereIn('user_id', $ids)->latest()->get();
    }

    public function tweets(){
        return $this->hasMany(Tweet::class);
        //Devuelve solamente los tuits del usuario
    }

    public function getAvatarAttribute(){
        return "https://i.pravatar.cc/40?u=".$this->email;
    }

    public function follow(User $user){
        return $this->follows()->save($user);
    }

    public function follows(){
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
        // desde la tabla follows, campos user_id following_user_id
    }
}
