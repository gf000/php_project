<?php

namespace App\Http\Controllers;

use App\TodoList;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class ListController extends Controller
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
        $mylists = DB::table('list')
                      ->select('list.*')
                      ->where('user_id',$user['id'])
                      ->where('shared',0)
                      ->get();
        $progress=[];
        foreach($mylists as $mylist){
            $all = DB::table('task')
               ->where('list_id',"=",$mylist->list_id)
               ->count();
            $complete = DB::table('task')
               ->where('list_id',"=",$mylist->list_id)
               ->where('complete',"=",1)
               ->count();
            if($all==0){
                $percentage=0;
            }else{
                $percentage = $complete / $all *100;
            }
            
            $progress[$mylist->list_id]=$percentage;
        }
        return view('list.mylist',['mylists'=>$mylists,'progress'=>$progress]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('list.create');
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
        $user = session()->get('user');
        $input = $request->except('_token');
        $result = TodoList::create(['title'=>$input['title'],'comment'=>$input['comment'],'shared'=>'0','user_id'=>$user['id']]);
        if ($result){
            $data=[
                'status'=>0,
                'message'=>'Add successfully!'
            ];    
        }else{
            $data=[
                'status'=>1,
                'message'=>'Add failed!'
            ];
        }
        return $data;
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
        $list = TodoList::find($id);
        return view('list.edit',['list'=>$list]);
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
        //根据id获取要修改的记录
        //return $id;
        $list = TodoList::find($id);
        //获取要修改的title和comment
        $title = $request->input('title');
        $comment = $request->input('comment');

        $list->title = $title;
        $list->comment = $comment;

        $result = $list->save();

        if($result){
            $data=[
                'status'=>0,
                'message'=>'Modify successfully!'
            ];
        }else{
            $data=[
                'status'=>1,
                'message'=>'Modify failed!'
            ];
        }
        return $data;

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
        $list = TodoList::find($id);
        $result = $list->delete();
        if($result){
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
