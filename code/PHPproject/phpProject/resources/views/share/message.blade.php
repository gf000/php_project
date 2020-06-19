@extends('list.public')
@section('content')

<!--点击加号，弹出添加页面-->
<script type="text/javascript">
    function agree($list_id){
        layui.use(['layer'], function(){
        $=layui.jquery,
        layer=layui.layer,
        layer.confirm('Are you sure you accept this sharing?',function(index){
            $.post('/message/agree/'+$list_id,{"_token":"{{csrf_token()}}"},function(data){
                //console.log(data);
                if(data.status == 0){
                    location.reload();
                }else{
                    
                }
            })
        });
        });
    }

    function reject($list_id){
        layui.use(['layer'], function(){
        $=layui.jquery,
        layer=layui.layer,
        layer.confirm('Are you sure you reject this sharing?',function(index){
            $.post('/message/reject/'+$list_id,{"_token":"{{csrf_token()}}"},function(data){
                //console.log(data);
                if(data.status == 0){
                    location.reload();
                }else{
                    
                }
            })
        });
        });
    }

    


</script>

<div>
    
  
    <!--显示已有待办清单列表-->
    @foreach ($messages as $message)
    <div style="margin-top:50px;margin-left:50px;margin-bottom:50px;margin-right:50px;width:350px;float:left;">
        <div class="layui-card" >
            <div class="layui-card-header" style="text-align:center;height:50px;font-size:large">
                {{$message->title}}
            </div>
            <div class="layui-card-body" style="text-align:center;height:200px">
                <!--备注部分-->
                <div style="text-align:center;height:70px;font-size:15px;">
                    {{$message->comment}}
                </div> 
                
                <!--邀请人-->
                <div style="text-align:center;height:70px;font-size:20px;">
                    inviter:{{$message->nickname}}
                </div> 
                
                <!--同意按钮-->
                <button type="button" class="layui-btn layui-btn-sm" onclick="agree({{$message->list_id}})">
                    <i class="layui-icon">&#xe6af;</i>Agree
                </button>

                <!--拒绝按钮-->
                <button type="button" class="layui-btn layui-btn-sm" onclick="reject({{$message->list_id}})" >
                    <i class="layui-icon">&#xe69c;</i>Refuse
                </button>
       
            </div>
        </div>  
    </div>
    

    
    @endforeach

</div>

<script>
//注意进度条依赖 element 模块，否则无法进行正常渲染和功能性操作
layui.use('element', function(){
  var element = layui.element;
});


</script>



    
        
    
@endsection