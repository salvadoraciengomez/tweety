<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Tweet;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'avatar', 'email', 'password',
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
        //$friends= Mete los ids de los usuarios a los que sigue
        $friends= $this->follows()->pluck('id'); //si está especificado follows->pluck('id') sin paréntesis, devolvería colección con X usuarios, pero con paréntesis solamente devuelve las id

        //Devuelve los tuits con las ids que hay en $friends o cuya id pertenezca al usuario ordenados por más reciente
        return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->latest()->get();
    }

    public function tweets(){
        return $this->hasMany(Tweet::class)->latest();
        //Devuelve solamente los tuits del usuario por orden 
    }

    public function getAvatarAttribute($value){
        return asset("storage/".$value);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password']=bcrypt($value);
    }


    #Métodos movidos al trait followable
    // public function follow(User $user){
    //     return $this->follows()->save($user);
    // }

    // public function follows(){
    //     return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    //     // desde la tabla follows, campos user_id following_user_id
    // }

    // public function following(){

    // }

    public function getRouteKeyName(){
        return 'username';  //Se usa para que al buscar /profiles/{user} busque por 'name' en lugar de DEFAULT 'id'
    }

    public function path($param ='' ){
        $path = route('profile', $this->username);

        return $param ? "{$path}/{$param}" : $path;
    }
}