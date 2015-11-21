<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
  <head>
  <title>This is switch leader page</title>
  <style>
  .error {color: #FF0000;}
  </style>
  <meta name="GENERATOR" content="Microsoft FrontPage 4.0">
  <meta name="ProgId" content="FrontPage.Editor.Document">
  <meta name="Originator" content="Microsoft Visual Studio .NET 7.1">
  <script language="javascript" >
  function CLASS_YAO3(array1,array2)
  {
    // Get the data array
    this.array1=array1; 
    this.array2=array2; 
    this.indexName='';
    this.obj='';
    // Set subSELECT :selectName1 is onchange SELECT ID , selectName2 is what will be SELECT
    this.subSelectChange=function(selectName1,selectName2,selectName3)
    {

      var obj1=document.all[selectName1];
      var obj2=document.all[selectName2];
      var obj3=document.all[selectName3];
      var objName=this.toString();
      var me=this;
      obj2.options[0]=new Option("Please select group first",'');
      obj3.options[0]=new Option("Please select group first",'');
      obj1.onchange=function()
      {
        me.optionChange(this.options[this.selectedIndex].value,obj2.id,2,array1);
        me.optionChange(this.options[this.selectedIndex].value,obj3.id,3,array2);
      }

    }
   
    // Set first SELECT column : indexName is what user SELECT , selectName is SELECT's ID
    this.firstSelectChange=function(indexName,selectName)  
    {
      this.obj=document.all[selectName];
      this.indexName=indexName;
      this.optionChange(this.indexName,this.obj.id,1,array1);
    }
  
    // indexName is the value return from first select, selectName is SELECT's ID
    this.optionChange=function (indexName,selectName,type, array)
    {
      var obj1=document.all[selectName];
      var me=this;
      obj1.length=0;
      // type 1: time  type 2: people
      if(type == 1) obj1.options[0]=new Option("Please select a group",'');
      else if(type == 2) obj1.options[0]=new Option("Please select the leader",'');
      else obj1.options[0]=new Option("Please select a new leader",'');

      for(var i=0;i<array.length;i++)
      { 
        if(array[i][1]==indexName)
        {
          obj1.options[obj1.length]=new Option(array[i][2],array[i][0]);
        }
      }
    }
  }
  </script>
  </head>
  <body>


    <?php echo $_SESSION["states"]; $_SESSION["states"] = ""; ?>
    <form action="" method="post">

    <select style="height:40px;width:300px" id="x1" name="x1"  >
    <option selected></option>
    </select>
    <span class="error"> * <?php echo $_SESSION["error1"]; $_SESSION["error1"] = ""; ?></span>

    <select style="height:40px;width:300px" id="x2" name="x2"  >
    <option selected></option>
    </select>
    <span class="error"> * <?php echo $_SESSION["error2"]; $_SESSION["error2"] = ""; ?></span>


    <select style="height:40px;width:300px" id="x3" name="x3"  >
    <option selected></option>
    </select>
    <span class="error"> * <?php echo $_SESSION["error3"]; $_SESSION["error3"] = ""; ?></span>  

    <button type="submit"  name="action" class="btn btn-primary hidden-xs" value="SwitchLeader">Submit</button>
    </form>





  </body>

   

  <script language="javascript">

  var switchleaderarray = <?php echo json_encode($switchleaders); ?>;
  var newleaderarray = <?php echo json_encode($newleaders); ?>;
  var switchliandong=new CLASS_YAO3(switchleaderarray, newleaderarray)         // Set data array
  switchliandong.firstSelectChange("root","x1");      // Set first SELECT column
  switchliandong.subSelectChange("x1","x2","x3");          // Set second & third level SELECT column
  </script>
</html>
