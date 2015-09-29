<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>11111</title>
</head>
<body>


<!--************ JavaScript处理province--onChange *************-->
<script language = "JavaScript"> 
var onecount2; 
subcat2 = new Array(); 
<?php 
$num2 = count($forum_userid);
?>
onecount2=<?echo $num2;?>;
<?
for($j=0;$j<$num2;$j++)
{
?>
subcat2[<?echo $j;?>] = new Array("<?echo $forum_userid[$j]['id'];?>","<?echo $forum_userid[$j]['provinceId'];?>","<?echo $forum_userid[$j]['cityName'];?>");
<?}?> 
function changelocation(id) 
{ 
document.myform.city.length = 0; 
var id=id; 
var j; 
document.myform.city.options[0] = new Option('==选择城市==',''); 
for (j=0;j < onecount2; j++) 
{ 
if (subcat2[j][1] == id) 
   { 
   document.myform.city.options[document.myform.city.length] = new Option(subcat2[j][2], subcat2[j][0]); 
   } 
} 
}
</script> 

<!--********************页面表单*************************-->
<form name="myform" method="post"> 
地址：<select name="bigClass" onChange=
"changelocation(document.myform.bigClass.options[document.myform.bigClass.selectedIndex].value)" size="1"> 
<option selected>请选择省份</option> 
   
<?php 
$num = count($forum_timeid);

for($i=0;$i<$num;$i++)
{
?>
<option value="<?echo $forum_timeid[$i]['id'];?>"><?echo $forum_timeid[$i]['provinceName'];?></option> 
<? 
}
?>
</select>
<select name="city" multiple> 
<SELECT name=city size=1 id="city">
<option selected value="">==选择城市==</option> 
</select>
</form> 
</body>
</html>