<!DOCTYPE html>
<html>
<head>
   <title>Bootstrap （Dropdowns）</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 
</head>
<body>

<!-- Single button -->
<select class="form-control" style="height:40px;width:200px">
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>

<select>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select>

</body>
</html>


<html>
<head>
<script language="javascript">
function number(){
var obj = document.getElementById("mySelect");
//obj.options[obj.selectedIndex] = new Option("我的吃吃","4");//在当前选中的那个的值中改变
obj.options.add(new Option("我的吃吃","4"));再添加一个option
//alert(obj.selectedIndex);//显示序号，option自己设置的
//obj.options[obj.selectedIndex].text = "我的吃吃";更改值
//obj.remove(obj.selectedIndex);删除功能
}
</script>
</head>
<body>
<select id="mySelect">
<option>我的包包</option>
<option>我的本本</option>
<option>我的油油</option>
<option>我的担子</option>
</select>
<input type="button" name="button" value="查看结果" onclick="number();">
</body>
</html>
