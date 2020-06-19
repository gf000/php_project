<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <title>Create a new Share</title>
  <link rel="stylesheet" type="text/css" href="{{asset('/layui/css/layui.css')}}">
  <script type="text/javascript" src="{{asset('/layui/layui.js')}}"></script>

  <style type="text/css">
      html body{
          background-color: #e2e2e2;
      }
  </style>
</head>
<body>

<form class="layui-form" action="/list/task/store" method="post">
  {{csrf_field()}}
  <input type="hidden" name="list_id" value="{{$list_id}}">

  <!--选择共享给哪位好友-->
  <div class="layui-form-item" style="margin:50px;">
    <label class="layui-form-label">Shared with</label>
    <div class="layui-input-block">
      <select name="user_share" lay-verify="required">
        <option value=""></option>
        @foreach($myfriends as $myfriend)  
        <option value="{{$myfriend->friend_id}}">{{$myfriend->nickname}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <!--是否有修改权限-->
  <div class="layui-form-item" style="margin:50px;">
    <label class="layui-form-label">Has Edit Right</label>
    <div class="layui-input-block">
      <select name="edit_right" lay-verify="required">
        <option value=""></option>
        <option value="1">yes</option>
        <option value="0">no</option>
      </select>
    </div>
  </div>

  <!--是否有完成权限-->
  <div class="layui-form-item" style="margin:50px;">
    <label class="layui-form-label">Has Complete Right</label>
    <div class="layui-input-block">
      <select name="complete_right" lay-verify="required">
        <option value=""></option>
        <option value="1">yes</option>
        <option value="0">no</option>
        
      </select>
    </div>
  </div>




  

  <div class="layui-form-item">
    <div class="layui-input-block" style="position:relative;left:15%;">
      <button class="layui-btn" lay-submit="" lay-filter="create">Submit</button>
      <button type="reset" class="layui-btn layui-btn-primary">Reset</button>
    </div>
  </div>
</form>

<script type="text/javascript" scr="ajax.js">
    //var form = document.form;
  layui.use(['form','layer'], function(){
    $=layui.jquery,
    layer=layui.layer,
    form = layui.form,
    
    
    form.on('submit(create)', function(data){
        $.ajax({
        type:'POST',
        url:'/list/sharedList',
        dataType:'json',
        data:data.field,
        success:function(data){
            //console.log(data);
            //弹层提示添加成功，并刷新父页面
            if(data.status == 0){
                layer.alert(data.message,{icon:6},function(){
                    window.opener.location.reload();
                    window.close();
                })
            }else{
                layer.alert(data.message,{icon:5});
            }
        },
        error:function(){

        }
    });
    return false;
});
});
</script>
 


</body>
</html>