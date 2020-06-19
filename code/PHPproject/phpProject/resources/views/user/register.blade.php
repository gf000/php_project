<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="{{asset('/layui/css/layui.css')}}">
        <script type="text/javascript" src="{{asset('layui/layui.js')}}"></script>
    </head>
    <style type="text/css">
        #left{
            float:left;
        }
        #right{
            float:right;
        }
        #picture{
            position:absolute;
            left:1000px;
            top:70px;
        }
        input[type=text],input[type=password]{
            width:100%;
            padding:12px 20px;
            margin:8px 0;
            display:inline-block;
            border:1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit]{
            width:100%;
            background-color:rgb(10, 67, 104);
            color: white;
            padding: 14px 20px;
            margin:30px 0;
            border:none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20px;
        }
        input[type=submit]:hover {
            
            background-color:rgb(8, 47, 73);
        }
        #form{
            position:absolute;
            left:280px;
            top:300px;
            width: 400px;
            border-radius: 5px;
            /*background-color: blanchedalmond;*/
            padding:20px;
        }
        #saying{
            position:absolute;
            top:100px;
            left:1000px;
            width:500px;
            height:50px;
            background-color: rgb(134, 85, 49);
            color: white;
        }
        #saying p{
            font-size:20px;
            font-weight: bold;
            position:relative;
            left:100px;   
        }

        #text h1{
            position:absolute;
            top:170px;
            left:400px;
        }
        #text p{
            position:absolute;
            top:230px;
            left:400px;
        }
        #errors{
            position:absolute;
            top:270px;
            left:300px;
            color:red;
            font:200px;
        }
        
        
    </style>
    <body>
        <div id="left">
            
            <div id="text">
                <h1>Create a account</h1>
                <p>Already have an account?<a href="/user/login">Log in >></a></p>
            </div>

            <!--错误信息显示-->
            <div id="errors">
                    <ul>
                        @if (is_object($errors))
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            @endif
                        @else
                            <li>{{$errors}}</li>
                        @endif
                    </ul>
                </div>  

            <div id=form>
                <form action="/user/store" method="post" class="layui-form">
                    {{csrf_field()}}
                    <label for="nickname">Nickname</label>
                    <input id="nickname" type="text" class="layui-input" name="nickname" lay-verify="required">
                    <label>Email</label>
                    <input id="email" type="text" class="layui-input" name="email" lay-verify="required|email">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" lay-verify="required">
                    <label for="password">Confirm Password</label>
                    <input id="confirmPassword" type="password" name="comfirmPassword" lay-verify="required">
                    <input type="submit" lay-submit  value="Submit">
                </form>
            </div>
        </div>
        <div id="right">
            <img id="picture" src="{{'/images/picture.jpg'}}" alt="picture" width="500" height="700">
            <div id="saying">
                <p>Truth never fears investigation</p>
            </div>
        </div>
    </body>
    <script>
layui.use('form', function(){
  var form = layui.form;
  
  //各种基于事件的操作，下面会有进一步介绍
});
</script>
</html>