<!DOCTYPE html>
<html lang="en">
  	<head>
    <meta charset="utf-8">  
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
	      obj2.options[0]=new Option("Please select Group first",'');
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
	      if(type == 1) obj1.options[0]=new Option("Please select Group",'');
	      else obj1.options[0]=new Option("Please select number of employee",'');
	        for(var i=0;i<this.array.length;i++)
	        {	
	        	if(this.array[i][1]==indexName)
	        	{
	          obj1.options[obj1.length]=new Option(this.array[i][2],this.array[i][0]);
	        	}
	        }
	  	}
	  }
	    function CLASS_YAO2(array1,array2)
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
      else if(type == 2) obj1.options[0]=new Option("Please select a staff",'');
      else obj1.options[0]=new Option("Please select another group",'');

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
		  	<?php  echo $_SESSION["states"]; $_SESSION["states"] = ""; ?>
		    <form action="" method="post">
		    <div>
		    	<h3 class="bk-margin-off"><strong>Time Arrangement</strong></h3><br/>
			    <select  style="height:40px;width:300px" name = "timeid", id = "timeid">
			      <option value="">Please Select Time</option>
			      <?php foreach ($results as $result): ?>
			      <option value="<?=$result[timeid]?>"><?=$result[timedate]," ",$result[starttime]," - ",$result[endtime]?></option>
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
			    <button type="submit"  name="action4" class="btn btn-primary hidden-xs" value="Submit">Submit</button>
		    </div>
		    <div>
		    	<br/>
		    	<h3 class="bk-margin-off"><strong>Staff Switch</strong></h3><br/>
	  			<form action="" method="post">
			    <select style="height:40px;width:300px" id="a1" name="a1"  >  
			    <option selected></option>
			    </select>
			    <span class="error"> * <?php echo $_SESSION["error1"]; $_SESSION["error1"] = ""; ?></span>
			    <select style="height:40px;width:300px" id="a2" name="a2"  >
			    <option selected></option>
			    </select>
			    <span class="error"> * <?php echo $_SESSION["error2"]; $_SESSION["error2"] = ""; ?></span>
			    <select style="height:40px;width:300px" id="a3" name="a3"  >
			    <option selected></option>
			    </select>
			    <span class="error"> * <?php echo $_SESSION["error3"]; $_SESSION["error3"] = ""; ?></span>  
			    <button type="submit"  name="action" class="btn btn-primary hidden-xs" value="Assign">Submit</button>
			    </form>
		    </div>
  		</body>
  		
  	<script language="javascript">

  	var testarray = <?php echo json_encode($results2); ?>;
  	var liandong=new CLASS_YAO(testarray)         // Set data array
  	liandong.firstSelectChange("root","s1");      // Set first SELECT column
  	liandong.subSelectChange("s1","s2");          // Set second level SELECT column
  	var assignstaffs = <?php echo json_encode($assignstaffs); ?>;
  var assignstaffs2 = <?php echo json_encode($assignstaffs2); ?>;

  var liandong2=new CLASS_YAO2(assignstaffs,assignstaffs2)         // Set data array
  liandong2.firstSelectChange("root","a1");      // Set first SELECT column
  liandong2.subSelectChange("a1","a2","a3");          // Set second & third level SELECT column
	</script>

</html>
