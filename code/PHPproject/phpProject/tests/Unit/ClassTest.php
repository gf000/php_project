<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Todolist;
use App\Task;
use App\User;
use App\Friend;
use App\Share;
use App\Test;

class ClassTest extends TestCase
{

    /**
     * Test
     */
    public function testTest(){
        $friend = new Test();
        $this->assertEquals('test',$friend->getTe());
    }

    /**
     * Todolist
     *
     */
    public function testTodo(){
        $friend = new Todolist();
        $this->assertEquals('list',$friend->getT());
    }

    /**
     * Task
     */

    public function testTask(){
        $friend = new Task();
        $this->assertEquals('task',$friend->getTa());
    }

    /**
     * 
     * User
     */

    public function testUser(){
        $friend = new User();
        $this->assertEquals('user',$friend->getU());
    }

    /**
     * Friend
     */
    public function testFriend(){
        $friend = new Friend();
        $this->assertEquals('friend',$friend->getF());
    }

    /**
     * Share
     */
    public function testShare(){
        $friend = new Share();
        $this->assertEquals('share',$friend->getS());
    }
}
