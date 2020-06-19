<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    //
    public function show()
    {
        //
        $user=session()->get('user'); 
        //$mylists = User::find($user['id'])->contacts();
        //$mylists = User::find(1)->contacts();
        $myfriends = DB::table('friend')
                    ->join('user','friend_id','=','user.id')
                    ->select('friend.*','nickname')
                    ->where('myid',$user['id'])
                    ->get();
       
        return view('friend.friend',['myfriends'=>$myfriends]);
        
    }

    public function delete($myid,$friend_id){
        $result1 = DB::table('friend')
                  ->where('myid',$myid)
                  ->where('friend_id',$friend_id)
                  ->delete();
        $result2 = DB::table('share')
                  ->join('list','list.list_id','=','share.list_id')
                  ->where('user_id',$myid)
                  ->where('user_share',$friend_id)
                  ->delete();
        
        if($result1 && $result2){
            $data=[
                'status'=>0,
                'message'=>'Delete successfully!'
            ];
        }else{
            $data=[
                'status'=>1,
                'message'=>'Delete failed!'
            ];
        }
        return $data;
    }
    
}
