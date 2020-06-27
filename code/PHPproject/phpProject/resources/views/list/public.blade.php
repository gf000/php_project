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

<script type="text/javascript">
    
    function daytime(){
        document.getElementById("body").style.background = "#e2e2e2";
        sessionStorage.setItem("mode","#e2e2e2");
    }

    function night(){
        document.getElementById("body").style.background = "#393D49";
        sessionStorage.setItem("mode","#393D49");
    }

    layui.use(['layer'], function(){
        $=layui.jquery,
        layer=layui.layer,
        

        $(function(){
        var getMode = sessionStorage.getItem("mode");
        document.getElementById("body").style.background = getMode;

        })
        })
</script>

<body class="layui-layout-body" id="body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">SUPINFO</div>
  
  <!-- 头部区域（可配合layui已有的水平导航） -->
  <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item" onclick="daytime()" style="margin:15px;">DayTime Mode</a></li>
      <li class="layui-nav-item" onclick="night()" style="margin:15px;">Night Mode</li>
      <li class="layui-nav-item"><a href=""></a></li>
      <li class="layui-nav-item">
        <a href="javascript:;"></a>
      </li>
    </ul>

    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          {{session()->get('user')['nickname']}}
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="/user/logout">Logout</a></li>
    </ul>
  </div>   
    
  
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
    © supinfo.com
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