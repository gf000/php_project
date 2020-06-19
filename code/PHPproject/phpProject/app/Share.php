<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    //
    //用户模型关联表
    public $table = 'share';
    //表的主键
    public $primaryKey = 'share_id';

    protected $fillable = [
        'share_id', 'user_share','list_id','delete_right','complete_right','accept','edit_right'
    ];

    public $timestamps = false;
    
    public function getS(){
        return $this->table;
    }
}
