


<!--<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>landing Page</title>
        <link rel="stylesheet" type="text/css" href="{{asset('/layui/css/layui.css')}}">
        <script type="text/javascript" src="{{asset('/layui/layui.js')}}"></script>
    </head>
    <body>
        <ul class="layui-nav" style="position">
            <li class="layui-nav-item">
                <a href="">Message<span class="layui-badge">9</span></a>
            </li>
            <li class="layui-nav-item">
                <a href="">个人中心<span class="layui-badge-dot"></span></a>
            </li>
            <li class="layui-nav-item">
                <a href=""><img src="//t.cn/RCzsdCq" class="layui-nav-img">我</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;">修改信息</a></dd>
                    <dd><a href="javascript:;">安全管理</a></dd>
                    <dd><a href="/user/logout">logout</a></dd>
                </dl>
            </li>
        </ul>
    </body>
    <script>
        //注意：导航 依赖 element 模块，否则无法进行功能性操作
        layui.use('element', function(){
        var element = layui.element;
  
        //…
        });
    </script>
<html>
    -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>SUPINFO PHP PROJECT</title>
  <link rel="stylesheet" type="text/css" href="{{asset('/layui/css/layui.css')}}">
  <script type="text/javascript" src="{{asset('/layui/layui.js')}}"></script>
  <style type="text/css">
      html body{
          background-color: #e2e2e2;
      }
  </style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">layui 后台布局</div>
    
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">TODO List</a>
          <dl class="layui-nav-child">
            <dd><a href="/list/myList">My TODO List</a></dd>
            <dd><a href="/list/sharedList">Shared TODO List</a></dd>
            
          </dl>
        </li>
        <li class="layui-nav-item"><a href="/friend">My Friends</a></li>
        <li class="layui-nav-item"><a href="/message">Message</a></li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    
    @yield('content')
  
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © supinfo.com - 底部固定区域
  </div>
</div>

<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</body>
</html>