<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户登录</title>
<link href="style/register.css" rel="stylesheet" type="text/css">
</head>

<script>
function cls1(){with(event.srcElement)if(value==defaultValue)value=""}
function res1(){with(event.srcElement)if(value=="") value=defaultValue}
function cls(){with(event.srcElement)if(value==defaultValue) value="",type="password"}
function res(){with(event.srcElement)if(value=="") value=defaultValue,type="text"}
</script>
<body>
<iframe src="navigation.php" width="100%" height="35px" name="navigation"  class="" scrolling="no" frameborder="no" ></iframe>
<!--登陆框架-->
<div class="main-bg">
    <div class="main">   
        
        <div class="main-right">
             <h2  style="float:left"> 登 陆  </h2>
         
         
          <div class="denglu">
          <span style="float: left; text-decoration: none; text-align: left; color: #525252;"><a href="register.php">注册</a></span>
          <div class="sign"></div>
          </div>
          
                
          <div class="content">
           <form  onSubmit="return Validator.Validate(this,3)" action="loginsubmit.php" name="form" method="post" >
            <ul>
              <li><input name="uName" class="circle"   value="用户名" type="text"  style="color: #666" onFocus="cls1(),this.style.color='#000';" onBlur="res1()"  dataType="Custom"  regexp="^[A-Za-z0-9]+$"  msg="该内容必须填写，且只能是字母或（和）数字"></li>
              <li><input name="Pwd"   class="circle"  value="密码"  type="text" style="color: #666" onFocus="cls(),this.style.color='#000';" onBlur="res()"   dataType="Custom"  regexp="^[A-Za-z0-9]+$" msg="该内容必须填写，且只能是字母或（和）数字"></li>
              <li><input name="submit"  class="zc" type="submit" value="登陆"  ></li>
            </ul>
            </form>
          </div>        
        </div>  
    </div>
</div>
<script src="JavaScript/submit.js"></script>
<div class="bottom"></div>
</body>
</html>
