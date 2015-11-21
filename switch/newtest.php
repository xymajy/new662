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
  function CLASS_YAO(array)
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
    <br>
    <br><br>

    
  </form>
  </body>

   

  <script language="javascript">
  //例子1-------------------------------------------------------------
  // //数据源
 //  var array=new Array();
 //  array[0]=new Array("T1","root","T1"); //数据格式 ID，父级ID，名称
 //  array[1]=new Array("T2","root","T2");
 //  array[2]=new Array("P1","T1","P1");
 //  array[3]=new Array("P2","T2","P2");
 //  array[4]=new Array("E1","P1","E1");
 //  array[5]=new Array("E2","P1","E2");  
 //  array[6]=new Array("E3","P2","E3");
 //  array[7]=new Array("E4","P2","E4");
  //--------------------------------------------
  //这是调用代码
  //var liandong=new CLASS_YAO(array) //设置数据源
  var testarray = <?php echo json_encode($rows2); ?>;
  // var array2=new Array();
  // document.write("<p> waht????\n </p>");
  //document.write(testarray);




  // array2[0]=new Array(<?=json_encode($rows3[0][0])?>,<?=json_encode($rows3[0][1])?>,<?=json_encode($rows3[0][2])?>); //数据格式 ID，父级ID，名称
  // array2[1]=new Array(<?=json_encode($rows3[1][0])?>,<?=json_encode($rows3[1][1])?>,<?=json_encode($rows3[1][2])?>);
  // array2[2]=new Array(<?=json_encode($rows3[2][0])?>,<?=json_encode($rows3[2][1])?>,<?=json_encode($rows3[2][2])?>);
  // array2[3]=new Array(<?=json_encode($rows3[3][0])?>,<?=json_encode($rows3[3][1])?>,<?=json_encode($rows3[3][2])?>);
  // array2[4]=new Array("E1","P1","E1");
  // array2[5]=new Array("E2","P1","E2"); 
  // array2[6]=new Array("E3","P2","E3");
  // array2[7]=new Array("E4","P2","E4");
  // document.write("<p> \n </p>");
  // document.write(array);
  // document.write("<p> \n </p>");
  // document.write(array2);


//   <?php $i = 0;?>
//   var array3 = new Array();
//   for(var i=0;i<(<?=count($rows3)?>);i++)
//     { 
// array3[i]=new Array(<?=json_encode($rows3[$i][0])?>,<?=json_encode($rows3[$i][1])?>,<?=json_encode($rows3[$i][2])?>); 
    
//     //array3[i]=new Array(<?=json_encode($rows3[$i][0])?>);
//     }
//   document.write("<p> here is array3 \n </p>");
//   document.write(array3);



  var liandong=new CLASS_YAO(testarray) //设置数据源
  //var liandong=new CLASS_YAO(<?php echo json_encode($rows2); ?>) //设置数据源
  liandong.firstSelectChange("root","s1"); //设置第一个选择框
  liandong.subSelectChange("s1","s2"); //设置子级选择框
  //liandong.subSelectChange("s2","s3");
  
  

  </script>
</html>





    <form name="form1" method="post">
    &nbsp;
    <SELECT ID="s1" NAME="s1"  >
    <OPTION selected></OPTION>
    </SELECT>
    <SELECT ID="s2" NAME="s2"  >
    <OPTION selected></OPTION>
    </SELECT>
    <br>
    <br><br>    
    </form>


    <form action="" method="post">
    <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
      <?php foreach ($rows as $row): ?>
      <option value="<?=$row[timeid]?>"><?=$row[timedate]," ",$row[starttime]," - ",$row[endtime]?></option>
      <?php endforeach; ?>
    </select>

    <input type="text" name="reason">
    <button type="submit"  name="action" value="Submit">Submit</button>
    </form>