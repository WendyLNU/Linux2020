<!--��ʾ���ڡ�ʱ�䡢���ڡ�ȫ��ΪJavaScript��ֻ���ã�������-->
<SCRIPT language=JavaScript>
function Year_Month(){ 
    var now = new Date(); 
    var yy = now.getFullYear(); 
    var mm = now.getMonth()+1; 
    return('<font color="#000000">' +  yy + '��' + mm + '��</font>'); }
 function Date_of_Today(){ 
    var now = new Date(); 
    return('<font color="#000000">' +  now.getDate() + '��</font>'); }
 function Day_of_Today(){ 
    var day = new Array(); 
    day[0] = "������"; 
    day[1] = "����һ"; 
    day[2] = "���ڶ�"; 
    day[3] = "������"; 
    day[4] = "������"; 
    day[5] = "������"; 
    day[6] = "������"; 
    var now = new Date(); 
    return('<font color="#000000">' +  day[now.getDay()] + '</font>'); }
 function CurentTime(){ 
    var now = new Date(); 
    var hh = now.getHours(); 
    var mm = now.getMinutes(); 
    var ss = now.getTime() % 60000; 
    ss = (ss - (ss % 1000)) / 1000; 
    var clock = hh+':'; 
    if (mm < 10) clock += '0'; 
    clock += mm+':'; 
    if (ss < 10) clock += '0'; 
    clock += ss; 
    return(clock); } 
function refreshCalendarClock(){ 
document.all.calendarClock1.innerHTML = Year_Month(); 
document.all.calendarClock2.innerHTML = Date_of_Today(); 
document.all.calendarClock3.innerHTML = Day_of_Today(); 
document.all.calendarClock4.innerHTML = CurentTime(); }
 var webUrl = webUrl; 
document.write('<table border="0" cellpadding="0" cellspacing="0" width="100%" height="20">');
document.write('<tr><td align="center" width="100%" height="100%" >');
document.write('<font id="calendarClock1" style="font-family:Arial;font-size:11pt;line-height:100%"> </font>');
document.write('<font id="calendarClock2" style="font-family:Arial;font-size:11pt;line-height:100%"> </font>');
document.write('&nbsp;&nbsp;<font id="calendarClock3" style="font-family:Arial;font-size:11pt;line-height:100%"> </font><br>');
document.write('<font id="calendarClock4" style="color:#FFFFFF;font-family:����;font-size:11pt;line-height:100%"></font>');
document.write('</td></tr></table>');
setInterval('refreshCalendarClock()',1000);
</SCRIPT>
