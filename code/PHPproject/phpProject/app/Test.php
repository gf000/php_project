<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    
    public $table = 'test';

    public function getTe(){
        return $this->table;
    }
}

