<?php

namespace App\Http\Controllers;

use App\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SharedListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=session()->get('user'); 
        //$mylists = User::find($user['id'])->contacts();
        //$mylists = User::find(1)->contacts();
        
        $sharedlists = DB ::table('list')
                      ->join('share','list.list_id','=','share.list_id')
                      ->join('user','list.user_id','=','user.id')
                      ->select('share.*','list.title','list.comment','list.user_id','nickname')
                      ->where('share.user_share',$user['id'])
                      ->where('accept','=',1)
                      ->get();
        
        foreach($sharedlists as $sharedlist){
            $all = DB::table('task')
               ->where('list_id',"=",$sharedlist->list_id)
               ->count();
            $complete = DB::table('task')
               ->where('list_id',"=",$sharedlist->list_id)
               ->where('complete',"=",1)
               ->count();
            if($all==0){
                $percentage=0;
            }else{
                $percentage = $complete / $all *100;
            }
            $progress[$sharedlist->list_id]=$percentage;
            
            
        }
        return view('list.sharedList',['sharedlists'=>$sharedlists,'progress'=>$progress]);
        
 
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->except('_token');
    
        $result = Share::create(['user_share'=>$input['user_share'],'list_id'=>$input['list_id'],'complete_right'=>$input['complete_right'],'edit_right'=>$input['edit_right'],'accept'=>0]);

        if ($result){
            $data=[
                'status'=>0,
                'message'=>'Successfully submitted an invitation to share!'
            ];    
        }else{
            $data=[
                'status'=>1,
                'message'=>'Share failed!'
            ];
        }
        return $data;
    }
    
    
    public function share($list_id)
    {
        $user = $user=session()->get('user'); 
        $myfriends = DB::table('friend')
                    ->join('user','friend_id','=','user.id')
                    ->select('nickname','friend_id')
                    ->where('myid',$user->id)
                    ->get();
        return view('share.create',['list_id'=>$list_id,'myfriends'=>$myfriends]);
    }

    public function message()
    {
        $user = $user=session()->get('user'); 
        $messages = DB::table('share')
                    ->join('list','list.list_id','=','share.list_id')
                    ->join('user','user.id','=','list.user_id')
                    ->select('list.*','nickname')
                    ->where('user_share',$user->id)
                    ->where('accept',0)
                    ->get();
        
        return view('share.message',['messages'=>$messages]);
    }

    public function agree($list_id)
    {
        $user = $user=session()->get('user'); 
        $result1 = DB::table('share')
                  ->where('list_id','=',$list_id)
                  ->where('user_share',$user->id)
                  ->update(['accept'=>1]);
        $result2 = DB::table('list')
                  ->where('list_id','=',$list_id)
                  ->update(['shared'=>1]);
        if($result1 && $result2){
            $data=[
                'status'=>0,
            ];
        }else{
            $data=[
                'status'=>1,
            ];
                }
        return $data;
      
    }

    public function reject($list_id)
    {
        $user = $user=session()->get('user'); 
        $result = DB::table('share')
                  ->where('list_id','=',$list_id)
                  ->where('user_share',$user->id)
                  ->update(['accept'=>2]);
       
        if($result){
            $data=[
                'status'=>0,
            ];
        }else{
            $data=[
                'status'=>1,
            ];
                }
        return $data;
      
    }
}
