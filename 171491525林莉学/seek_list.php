<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>����������վ</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#99CC66" topmargin="0" leftmargin="100">
<?php

include("connlj.php");
$key=$_POST["kkk"];

?>

<table width="778" border="1" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#00CC99">
    <th colspan="5"><?php echo  "���ҹؼ���{$key}���"?> </th>
  </tr>
  <tr bgcolor="#00CC99">
  <td><?php echo  "����"?> </td>
  <td><?php echo  "���"?> </td>
  </tr>
<?php
$sqlg = "Select * From fl where zhuti like '%{$key}%'";
$rsg=new com("adodb.recordset");
$rsg->open($sqlg,$db,1,1);//ִ�����,���ؼ�¼��


if($rsg->RecordCount==0) {?> <td bgcolor="#00CC99" colspan="2"><?php echo "���Ҳ���������¼";}?></td>
<?php
while(! $rsg->eof)
{
?>
 <tr bgcolor="#00CC99" height="35">
    <td><?php echo $rsg->Fields("zhuti")->value; ?></td>
	<td><?php echo $rsg->Fields("leibie")->value; ?></td>
 </tr>
<?php
$rsg->MoveNext(); 
}
$rsg=NULL;
?>
</table>












 <div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12">
				  <h3 style="text-align: left;">��������ָ</h3>
				</div>
				<div class="col-md-12 col-xs-12">��������������ָ���ɻ�����к�������ʪ����������������������</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">��������Ҫ����</h3></div>
				<div class="col-md-12 col-xs-12">�ͺС��ͽ�ֽ��ʪֽ����������ֽ�����ϴ���ʳƷ��װ������Ⱦ���ص�ֽ���̵١�ֽ��㡢һ���Ա��ӡ����ͷ�����ǡ����衢�մɵ�</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">������Ͷ��Ҫ��</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<ul>
						<li>��������ˮ��</li><li>���Ա�ʶ������������Ͷ�������������</li>
					</ul>
				</div>
			</div>
		</div>
</div>


<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<hr style="border-color: #d0d0d0">
		</div>
</div>
 	

 	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">�ɻ�������ָ</h3></div>
				<div class="col-md-12 col-xs-12">��ֽ�š������ϡ��ϲ�����Ʒ���Ͻ�������֯������˻��ա���ѭ�����õ����������</div>
			</div>
		</div>
	</div>


<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">�ɻ���������Ҫ����</h3></div>
				<div class="col-md-12 col-xs-12">����ƿ������ƿ��ƽ�岣���������ޡ�����ƿ��ϴ��ˮƿ��������ߡ��鱾����ֽ����浥��ֽ���䡢�·���������Ʒ��</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">�ɻ�����Ͷ��Ҫ��</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<ul>
						<li>��Ͷ���</li><li>�����������Ⱦ����ֽ����ƽ��</li><li>�����װ����������������ѹ��Ͷ��</li><li>�м���߽ǵġ�Ӧ������Ͷ��</li>
					</ul>
				</div>
			</div>
		</div>
</div>


<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<hr style="border-color: #d0d0d0">
		</div>
</div>
 	

 	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">�к�������ָ</h3></div>
				<div class="col-md-12 col-xs-12">�ϵ�ء��ϵƹܡ���ҩƷ�������ἰ�������ȶ����彡��������Ȼ�������ֱ�ӻ���Ǳ��Σ�������������</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">�к�������Ҫ����</h3></div>
				<div class="col-md-12 col-xs-12">�ϵ�ء�����Ͱ��ӫ��ƹܡ���ҩƷ�����װ���</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">�к�����Ͷ��Ҫ��</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<ul>
						<li>Ͷ��ʱ��ע�����</li><li>���������������װ����������</li><li>���׻ӷ������ܷ��Ͷ��</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	


<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<hr style="border-color: #d0d0d0">
		</div>
</div>
 	

 	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">ʪ������ָ</h3></div>
				<div class="col-md-12 col-xs-12">�ճ������������������׸��õ������ʷ�����</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">ʪ������Ҫ����</h3></div>
				<div class="col-md-12 col-xs-12">ʣ��ʣ������Ƥ���ˡ�������ֲ������ʳƷ��</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">ʪ����Ͷ��Ҫ��</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<ul>
						<li>�����ʵ�ʳ����������ţ�̵ȣ�Ӧֱ�ӵ�����ˮ��</li><li>�а�װ���ʪ����Ӧ����װ��ȥ�������Ͷ�š���װ����Ͷ�ŵ���Ӧ�Ŀɻ���������������</li>
					</ul>
				</div>
			</div>
		</div>
	</div>



      <div class="row">

        <div class="col-md-6 col-xs-12"> 
          <div class="row" style="border: 1px dashed #dfdfdf;"> 
            <div class="col-md-3 col-xs-3" align="center"> 
              <img style="max-width: 600px;" alt="�ɻ�����" src="images/5.png"> 
            </div> 
            <div class="col-md-9 col-xs-9" style="color: #3F6BA8;padding-left: 22px;vertical-align: middle;" align="center"> 
                <h3 style="margin-top: 0px">�ɻ�����</h3> 
                <p style="">ָ��ֽ�š������ϡ��ϲ�����Ʒ���Ͻ�������֯������˻��ա���ѭ�����õ���������</p> 
            </div> 
          </div> 
        </div> 

        <div class="col-md-6 col-xs-12"> 
          <div class="row" style="border: 1px dashed #dfdfdf;"> 
            <div class="col-md-3 col-xs-3" align="center"> 
              <img style="max-width: 600px;" alt="�к�����" src="images/4.jpg"> 
            </div> 
            <div class="col-md-9 col-xs-9" style="color: #B43953;padding-left: 22px;vertical-align: middle;" align="center"> 
               <h3 style="margin-top: 0px">�к�����</h3> 
                <p style="">ָ�ϵ�ء��ϵƹܡ���ҩƷ�������ἰ�������ȶ����彡��������Ȼ�������ֱ�ӻ���Ǳ��Σ������������</p> 
            </div> 
          </div> 
        </div> 
      </div>
      <div class="row">

        <div class="col-md-6 col-xs-12"> 
          <div class="row" style="border: 1px dashed #dfdfdf;"> 
            <div class="col-md-3 col-xs-3" align="center"> 
              <img style="max-width: 600px;"alt="ʪ����" src="images/3.jpg"> 
            </div> 
            <div class="col-md-9 col-xs-9" style="color: #8F6F55;padding-left: 22px;vertical-align: middle;" align="center"> 
                <h3 style="margin-top:0px ">ʪ����</h3> 
                <p style="">���׸�������ָʳ�ķ��ϡ�ʣ��ʣ��������ʳƷ����Ƥ���ˡ�������ֲ����ҩҩ�����׸�����������������</p> 
            </div> 
          </div> 
        </div> 

        <div class="col-md-6 col-xs-12"> 
          <div class="row" style="border: 1px dashed #dfdfdf;"> 
            <div class="col-md-3 col-xs-3" align="center"> 
              <img style="max-width: 600px;" alt="������" src="images/2.jpg"> 
            </div> 
            <div class="col-md-9 col-xs-9" style="color: #2F3D39;padding-left: 22px;vertical-align: middle;" align="center"> 
                <h3 style="margin-top: 0px">������</h3> 
                <p style="">������������ָ���ɻ�����к�������ʪ���������������������</p> 
            </div> 
          </div> 
        </div> 
      </div>

  </div>
</div>

</body>
</html>
