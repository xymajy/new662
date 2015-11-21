<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
  <title>JSDropdown</title>
  <style>
  .error {color: #FF0000;}
  </style>
  <meta name="GENERATOR" content="Microsoft FrontPage 4.0">
  <meta name="ProgId" content="FrontPage.Editor.Document">
  <meta name="Originator" content="Microsoft Visual Studio .NET 7.1">
  <script language="javascript" >
  	
  function CLASS_YAO(array)
  {
    // Get the data array
  	this.array=array; 
  	this.indexName='';
  	this.obj='';
  	// Set subSELECT :selectName1 is onchange SELECT ID , selectName2 is what will be SELECT
    this.subSelectChange=function(selectName1,selectName2)
  	{

      var obj1=document.all[selectName1];
      var obj2=document.all[selectName2];
      var objName=this.toString();
      var me=this;
      obj2.options[0]=new Option("Please select time first",'');
      obj1.onchange=function()
      {
      	me.optionChange(this.options[this.selectedIndex].value,obj2.id,2)
      }

  	}
  	// Set first SELECT column : indexName is what user SELECT , selectName is SELECT's ID
  	this.firstSelectChange=function(indexName,selectName)  
  	{
    	this.obj=document.all[selectName];
    	this.indexName=indexName;
    	this.optionChange(this.indexName,this.obj.id,1)

  	}
  
    // indexName is the value return from first select, selectName is SELECT's ID
  	this.optionChange=function (indexName,selectName,type)
  	{
      var obj1=document.all[selectName];
      var me=this;
      obj1.length=0;
      // type 1: time  type 2: people
      if(type == 1) obj1.options[0]=new Option("Please select your prefer time",'');
      else obj1.options[0]=new Option("Please select people",'');
        for(var i=0;i<this.array.length;i++)
        {	
        	if(this.array[i][1]==indexName)
        	{
          obj1.options[obj1.length]=new Option(this.array[i][2],this.array[i][0]);
        	}
        }
  	}
  }
  </script>
	</head>
	<body>
    <?php  echo $_SESSION["states"]; $_SESSION["states"] = "";?>



    <div class="row text-center">
    <form action="" method="post">
    <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
      <option value="">Please Select Time You want to change</option>
      <?php foreach ($rows as $row): ?>
      <option value="<?=$row[timeid]?>"><?=$row[timedate]," ",$row[starttime]," - ",$row[endtime]?></option>
      <?php endforeach; ?>
    </select>
    <span class="error"> * <?php echo $_SESSION["error1"]; $_SESSION["error1"] = ""; ?></span>
    

    <select style="height:40px;width:300px" id="s1" name="s1"  >
    <option selected></option>
    </select>
    <span class="error"> * <?php echo $_SESSION["error2"]; $_SESSION["error2"] = ""; ?></span>
    

    <select style="height:40px;width:300px" id="s2" name="s2"  >
    <option selected></option>
    </select>
    <span class="error"> * <?php echo $_SESSION["error3"]; $_SESSION["error3"] = ""; ?></span>
       
    </div>
    <br><br><br><br><br><br><br>
    <div class="input-group">
    <input type="text" class="form-control bk-noradius" name = "reason" ></input>      
    <span class="input-group-btn">
    <button class="btn btn-primary hidden-xs"type="submit"  name="Switch" value="Submit">Submit</button>
    </span>
    </form>
    </div>




	</body>

	 

	<script language="javascript">

  var testarray = <?php echo json_encode($rows2); ?>;
  var liandong=new CLASS_YAO(testarray)         // Set data array
  liandong.firstSelectChange("root","s1");      // Set first SELECT column
  liandong.subSelectChange("s1","s2");          // Set second level SELECT column
	</script>
</html>
