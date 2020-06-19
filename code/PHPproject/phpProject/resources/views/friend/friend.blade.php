@extends('list.public')
@section('content')

<!--点击加号，弹出添加页面-->
<script type="text/javascript">
    
    

    //layui.use(['form','layer'], function(){

    function deleteFriend($myid,$friend_id){
        layui.use(['layer'], function(){
        $=layui.jquery,
        layer=layui.layer,
        layer.confirm('Are you sure you want to delete this friend?',function(index){
            $.post('/friend/delete/'+$myid+'/'+$friend_id,{"_token":"{{csrf_token()}}"},function(data){
                //console.log(data);
                if(data.status == 0){
                    location.reload();
                    layer.msg(data.message,{icon:6,time:8000});
                }else{
                    layer.msg(data.message,{icon:5,time:8000});
                }
            })
        });
        });
    }

    


</script>
<div>
    @foreach($myfriends as $friend )
        <div class="layui-bg-cyan" style="position:relative;width:800px;height:50px;margin-left:250px;margin-top:50px;border-radius: 4px;font-size:15px;">
            <div style="position:relative;top:15px;left:20px;">{{$friend->nickname}}</div>
            <div class="layui-btn-group" style="position:relative;left:650px;top:-7px">
                <button type="button" class="layui-btn layui-btn-primary layui-btn-sm" onclick="deleteFriend({{$friend->myid}},{{$friend->friend_id}})">
                    <i class="layui-icon">&#xe640;</i>
                </button>
            </div>
        </div>
        @endforeach

</div>

     
    



    
        
    
@endsection