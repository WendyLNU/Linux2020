<?php
if(!session_id())session_start();
// 数据库类
class Mysql{
    // 属性
    public $host; // 地址
    public $name; // 用户名
    public $pwd; // 密码
    public $database; // 数据库名
    public $charset; // 字符集
    public $link; // 创建的数据库连接
    public $sql; // 执行的sql语句
    // 方法
    // 构造方法
    public function __construct($db,$host="127.0.0.1",$name="root",$pwd="123456",$charset='utf8')
    {
        // 给需要的属性赋值
        $this->host=$host;
        $this->name=$name;
        $this->pwd=$pwd;
        $this->database=$db;
        $this->charset=$charset;
        // 连接数据库,创建链接
        $this->link=mysqli_connect($this->host,$this->name,$this->pwd,$this->database);
        mysqli_set_charset($this->link,$this->charset);
    }
    // 封装功能方法
    // 查询  查一堆  查一条  查一个
    // 查一堆
    function selectArray($sql){
        // 语句赋值到 sql属性里
        $this->sql=$sql;
        // 执行这个语句
        $rt=mysqli_query($this->link,$this->sql);
        if(!$rt){
            $this->getError();
        }
        // 从结果集中提取数组
        $list=mysqli_fetch_all($rt,true);
        // 释放结果集
        mysqli_free_result($rt);
        return $list;
    }
    // 查一条
    function selectOne($sql)
    {
        // 语句赋值到 sql属性里
        $this->sql=$sql;
        // 执行这个语句
        $rt=mysqli_query($this->link,$this->sql);
        if(!$rt){
            $this->getError();
        }
        // 从结果集中提取数组
        $one=mysqli_fetch_assoc($rt);
        // 释放结果集
        mysqli_free_result($rt);
        return $one;
    }
    // 查一个
    function getValue($sql)
    {
        $this->sql=$sql;
        $rt=mysqli_query($this->link,$this->sql);
        if(!$rt){
            $this->getError();
        }
        $one=mysqli_fetch_row($rt);
        mysqli_free_result($rt);
        return $one[0];
    }
    // 报错方法
    function getError(){
        // sql语句出错了
        echo "<h1>你的sql语句出错了</h1>";
        echo "你错误的语句是 : ".$this->sql."<br>";
        echo "错误信息是 : ".mysqli_error($this->link);
        exit;
    }
    // 删除 参数(表名,条件)
    function delete($table,$where){
        $this->sql="delete from {$table} where {$where}";
        $rt=mysqli_query($this->link,$this->sql);
        if(!$rt){
            $this->getError();
        }
        // 正确 返回受影响的行数(被删掉的行数量)
        return mysqli_affected_rows($this->link);
    }
    /** 添加方法
     * @param $table string 表名
     * @param $arr array 要添加的数据
     * @return int|void 添加的数量
     */
    function insert($table,$arr){
        $keys="";
        $values="";
        foreach ($arr as $k=>$v){
            $keys.=$k.",";
            $values.="'".$v."',";
        }
        $k=rtrim($keys,',');
        $v=rtrim($values,',');
        $this->sql="insert into {$table} ({$k}) values ({$v})";
        $rt=mysqli_query($this->link,$this->sql);
        if(!$rt){
            $this->getError();
        }
        // 正确 返回受影响的行数(添加的数量)
        return mysqli_affected_rows($this->link);
    }
    function update($table,$arr,$where="1=1"){
        $sets="";
        foreach ($arr as $k=>$v){
            $sets.=$k."='".$v."',";
        }
        $sets=rtrim($sets,",");
        $this->sql="update {$table} set {$sets} where {$where}";
        $rt=mysqli_query($this->link,$this->sql);
        if(!$rt){
            $this->getError();
        }
        // 正确 返回受影响的行数(修改的条数)
        return mysqli_affected_rows($this->link);
    }

    function exec($sql){
        $this->sql=$sql;
        $rt=mysqli_query($this->link,$this->sql);
        if(!$rt){
            $this->getError();
        }
        return true;
    }
    function msg($msg){
        echo "<script language='javascript'>alert('".$msg."');</script>";
    }
    //跳转到指定页面
    function href($url){
        echo "<script language='javascript'>window.location.href='".$url."';</script>"; 
    }
    //返回浏览器的前一页
    function history(){
        echo "<script language='javascript'>window.history.go(-1);</script>";   
    } 
    // 析构方法 在对象被销毁之前执行
    function __destruct()
    {
        // 关闭数据库连接
        mysqli_close($this->link);
    }
}
$db = new Mysql("db","localhost","root","123456");
?>