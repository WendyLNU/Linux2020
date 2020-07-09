<?php
session_start();
//清空创建的session值
unset($_SESSION);
//销毁所有session值
session_destroy();

?>
<script type="text/javascript">
window.location.href = '../index.php';
</script>