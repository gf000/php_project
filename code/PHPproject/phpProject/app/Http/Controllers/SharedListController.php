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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //return 111;
        $input = $request->except('_token');

        $result = Share::create([['user_share'=>$input['user_share'],'list_id'=>$input['list_id'],'delete_right'=>$input['edit_right'],'complete_right'=>$input['complete_right'],'edit_right'=>$input['edit_right'],'accept'=>0]]);

        
        
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
