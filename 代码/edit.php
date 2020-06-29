<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title>修改留言</title>
</head>
<table>
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
        $sql="update bbs_info set name '".$name."',content='".$content."'where id=".intval($_POST['id']);
        if(!mysqli_query($sql,$conn))
        {
            echo "<p>修改留言出错</p>";
            exit;
        }
        echo "修改成功<a href='index.php'>查看留言</a>";
        exit;
    }
    $result=mysqli_query('select * from bbs_info where id='.intval($_GET['id']));
    $row=mysqli_fetch_array($result,MYSQLI_BOTH);
    if(!row){
        echo "数据不存在";
        exit;
    }
    ?>

    <table class="tb" width="500" border="0" cellspacing="0" cellpadding="0” align="center" >
    <tr>
        <td align="center"><b>修改留言</b></td>
    </tr>
    <tr>
        <td><form id="form1" name="form1" method="post" action="edit.php"?action="save"></form></td>
        <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
        <table width="500" border="1" cellspacing="0" cellpadding="0”>
        <tr>
        <td width="60">用户名：</td>
        <td width="440"><input type="text" name="name" value="<?php echo htmlentities($row['name'],ENT_COMPAT,'utf-8')?>"/></td>
    </tr>
    <td width="60">内容：</td>
    <tr>

        <td width="440"><textarea name="content" cols="70" rows="6">
                <?php echo htmlentities($row['content'],ENT_COMPAT,'utf-8')?>
            </textarea></td>
    </tr>
        <td colspan="2" align="center"><input type="submit" name="submit" value="提交" />
            <input type="reset" name="Submit" value="重置" /></td>
    </tr></table>
</form></td>
</tr>
<tr>
    <td align="right"><a href="index.php">查看留言</a></td>
</tr>
</table></body></html>


