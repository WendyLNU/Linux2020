<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户注册</title>
<link href="style/register.css" rel="stylesheet" type="text/css">
</head>
<script>
function cls1(){with(event.srcElement)if(value==defaultValue) value=""}
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
      <h2  style="float:left"> 注 册 </h2>
      <div class="denglu"> <span style="float: left; text-decoration: none; text-align: left; color: #525252;"><a href="login.php">登陆</a></span>
        <div class="sign"></div>
      </div>
      <div class="content">
        <form  onSubmit="return Validator.Validate(this,3)" action="submit.php" name="form" method="post" >
          <ul>
            <li>
              <input name="uName"   class="circle" style="color: #666" value="用户名" type="text" onfocus="cls1(),this.style.color='#000';" onblur="res1()" dataType="Custom"  
              regexp="^[A-Za-z0-9]+$" msg="该内容必须填写，且只能是字母或（和）数字">
            </li>
            <li>
              <input name="uPass"  class="circle"  style="color: #666" value="密码"   onfocus="cls(),this.style.color='#000';" onblur="res()"  dataType="Custom" 
              regexp="^[A-Za-z0-9]+$" msg="该内容必须填写，且只能是字母或（和）数字">
            </li>
            <li>
              <input name="rePwd" class="circle"  style="color: #666" value="确认密码"  onfocus="cls(),this.style.color='#000';" onblur="res()" dataType="Custom" 
               regexp="^[A-Za-z0-9]+$" msg="该内容必须填写，且只能是字母或（和）数字">
            </li>
            <li>
              <input name="submit"  class="zc" type="submit" value="注册"  style="color: #FFFFCC;" >
            </li>
          </ul>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="bottom"></div>
<script src="JavaScript/submit.js"></script>
</body>
</html>
