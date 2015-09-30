<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
  <title>JSDropdown</title>
  <meta name="GENERATOR" content="Microsoft FrontPage 4.0">
  <meta name="ProgId" content="FrontPage.Editor.Document">
  <meta name="Originator" content="Microsoft Visual Studio .NET 7.1">
  <script language="javascript" >
  /*  
**    ==================================================================================================  
**    
**    Author：YAODAYIZI  
**
**    ==================================================================================================  
**/  	
  function CLASS_LIANDONG_YAO(array)
  {
   //数组，联动的数据源
  	this.array=array; 
  	this.indexName='';
  	this.obj='';
  	//设置子SELECT
	// 参数：当前onchange的SELECT ID，要设置的SELECT ID
      this.subSelectChange=function(selectName1,selectName2)
  	{
  	//try
  	//{
    var obj1=document.all[selectName1];
    var obj2=document.all[selectName2];
    var objName=this.toString();
    var me=this;
  
    obj1.onchange=function()
    {
    	
    	me.optionChange(this.options[this.selectedIndex].value,obj2.id)
    }

  	}
  	//设置第一个SELECT
	// 参数：indexName指选中项,selectName指select的ID
  	this.firstSelectChange=function(indexName,selectName)  
  	{
  	this.obj=document.all[selectName];
  	this.indexName=indexName;
  	this.optionChange(this.indexName,this.obj.id)

  	}
  
  // indexName指选中项,selectName指select的ID
  	this.optionChange=function (indexName,selectName)
  	{
    var obj1=document.all[selectName];
    var me=this;
    obj1.length=0;
    obj1.options[0]=new Option("Please Select",'');
    for(var i=0;i<this.array.length;i++)
    {	
    
    	if(this.array[i][1]==indexName)
    	{
    	//alert(this.array[i][1]+" "+indexName);
      obj1.options[obj1.length]=new Option(this.array[i][2],this.array[i][0]);
    	}
    }
  	}
  	
  }
  </script>
	</head>
	<body>
    <?php  echo $array[1]; ?>
  <form name="form1" method="post">
  	&nbsp;
  	<SELECT ID="s1" NAME="s1"  >
    <OPTION selected></OPTION>
  	</SELECT>
  	<SELECT ID="s2" NAME="s2"  >
    <OPTION selected></OPTION>
  	</SELECT>
  	<SELECT ID="s3" NAME="s3">
    <OPTION selected></OPTION>
  	</SELECT>
  	<br>
  	<br><br>

  	
  </form>
	</body>

	
	
	<script language="javascript">
	//例子1-------------------------------------------------------------
	//数据源
  var array=new Array();
  array[0]=new Array("T1","root","T1"); //数据格式 ID，父级ID，名称
  array[1]=new Array("T2","root","T2");
  array[2]=new Array("P1","T1","P1");
  array[3]=new Array("P2","T2","P2");
  array[4]=new Array("E1","P1","E1");
  array[5]=new Array("E2","P1","E2");	
  array[6]=new Array("E3","P2","E3");
  array[7]=new Array("E4","P2","E4");
  //--------------------------------------------
  //这是调用代码
  var liandong=new CLASS_LIANDONG_YAO(array) //设置数据源
  liandong.firstSelectChange("root","s1"); //设置第一个选择框
  liandong.subSelectChange("s1","s2"); //设置子级选择框
  liandong.subSelectChange("s2","s3");
  
  
	//例子2-------------------------------------------------------------
	//数据源	
  // var array2=new Array();//数据格式 ID，父级ID，名称
  // array2[0]=new Array("测试测试","根目录","测试测试"); 
  // array2[1]=new Array("华北地区","根目录","华北地区");
  // array2[2]=new Array("上海","测试测试","上海");
  // array2[3]=new Array("广东","测试测试","广东");
  // array2[4]=new Array("徐家汇","上海","徐家汇");
  // array2[5]=new Array("普托","上海","普托");	
  // array2[6]=new Array("广州","广东","广州");
  // array2[7]=new Array("湛江","广东","湛江");
  // array2[8]=new Array("不知道","湛江","不知道");
  // array2[9]=new Array("5555","湛江","555");
  // array2[10]=new Array("++++","不知道","++++");
  // array2[11]=new Array("111","徐家汇","111");
  // array2[12]=new Array("222","111","222");
  // array2[13]=new Array("333","222","333");
  // //--------------------------------------------
  // //这是调用代码
  // //设置数据源
  // var liandong2=new CLASS_LIANDONG_YAO(array2);
  // //设置第一个选择框
  // liandong2.firstSelectChange("根目录","x1");
  // //设置子选择框
  // liandong2.subSelectChange("x1","x2")
  // liandong2.subSelectChange("x2","x3")
  // liandong2.subSelectChange("x3","x4")
  // liandong2.subSelectChange("x4","x5")
	</script>
</html>
