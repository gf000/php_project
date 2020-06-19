<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class RouteTest extends TestCase
{
    /**
     * login
     */
    public function testlogin()
    {
        $response = $this->get('/user/login');

        $response->assertViewIs('user.login');    
    }

    public function testlogi()
    {
        $response = $this->get('/user/logi');

        $response->assertViewIs('user.login');    
    }
    
    
    /**
     * register
     */
    public function testregister()
    {
        $response = $this->get('/user/register');

        $response->assertViewIs('user.register');
    }

 


    public function testlogout()
    {
        $response = $this->get('/user/logout');

        $response->assertRedirect('user/login');
    }
    


    public function testdeletall(){
        $response = $this->get('list/task/deleteAll');

        $response->assertStatus(302);
    }


    public function testdologin()
    {
        $response = $this->post('/user/doLogin',[
            'nickname' => 'aa',
            'password' => 'aa'
        ]);
        $response->assertStatus(500);
    }

    public function teststore()
    {
        $response = $this->post('/user/store',[
            'nickname' => 'aa',
            'email' => 'aa',
            'password' => 'aa'
        ]);

        // $response->assertRedirect('user/login');
        $response->assertStatus(500);

    }

    


    
}
