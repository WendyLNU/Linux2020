<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title>发表留言</title>
</head>
<form>
    <?php
    include ("conn.php");
    if($_GET[action]=='save')
    {
        $name=trim($_POST['name']);
        $content=trim($_POST['content']);
        if(!get_magic_quotes_gpc())
        {
            $name=addslashes($name);
            $content=addslashes($content);
        }
        if(!$name||!$content)
        {
            echo '请输入用户名和内容';
            echo '<a href="javascript:history.back()">返回</a>';
            exit;
        }
        if(strlen($name)>20)
        {
            echo '姓名太长';
            echo '<a href="avascript:history.back()">返回</a>';
            exit;
        }
        if(strlen($content)>250)
        {
            echo '内容太长';
            echo '<a href="avascript:history.back()">返回</a>';
            exit;
        }
        $sql="insert into bbs_into (name,content,tine) values('".$name."','".$content."','".date('Y-m-d H:i:s')."')";
        if(!mysqli_query($sql,$conn))
        {
            echo "<p>增加留言出错</p>";
            exit;
        }
            echo "添加成功<a href='index.php'>查看留言</a>";
            exit;
    }
    ?>

    <table class="tb" width="500" border="0" cellspacing="0" cellpadding="0” align="center" >
    <tr>
        <td align="center"><b>发表留言</b></td>
    </tr>
    <tr>
        <td valign=center align="center">留言内容：</td>
    </tr>
    <tr>
        <td><form id="form1" name="form1" method="post" action="add.php"?action=save">
                <table width="500" border="1" cellspacing="0" cellpadding="0”  align="center">
    <tr>
        <td width="15%">姓名：</td>>
        <td width="85%"><input type="text" name="name" /></td>
    </tr>
<tr>
    <td width="15%">内容：</td>>
    <td width="85%"><textarea name="content" cols="50" rows="6"></textarea></td>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="提交" />
    <input type="reset" name="Submit" value="重置" /></td>
    </tr>
</form></td>
</tr>
<tr>
    <td align="right"><a href="index.php">查看留言</a></td>
</tr>
</table></body></html>


