<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    
    public $table = 'friend';
    
    public $primaryKey = 'id';

    protected $fillable = [
        'id', 'myid', 'friend_id'
    ];

    public $timestamps = false;

    public function getF(){
        return $this->table;
    }
}
