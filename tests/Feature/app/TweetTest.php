<?php

namespace Tests\Feature\app;
// Created by php artisan make:test app/TweetTest
//run at vendor\bin\phpunit.bat

use App\Tweet;
use App\User;
use App\Followable;
use App\DB;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\TweetsController;
// use App\Followable;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TweetTest extends TestCase
{
    public $tweet;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testBDCreaTuitUser1(){
        //requiere modificar phpunit.xml con
        //        <server name="DB_CONNECTION" value="mysql"/>
        //        <server name="DB_DATABASE" value="tweety2"/>


        $tweet=Tweet::create([
            'user_id' => 1,
            'body' => 'ejemplodetweet'
        ]);

        $this->assertInstanceOf(Tweet::class, $tweet);

    }
}
