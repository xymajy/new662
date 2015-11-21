<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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
      if(type == 1) obj1.options[0]=new Option("Please select employee",'');
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
  </script>
    <title>warden</title>
  </head>
  <body>
  	<?php  echo $_SESSION["states"]; $_SESSION["states"] = ""; ?>

    <select style="height:40px;width:300px" id="s1" name="s1"  >
    <option selected></option>
    </select>
    <span class="error"> * <?php echo $_SESSION["error2"]; $_SESSION["error2"] = ""; ?></span>

<!--     <select style="height:40px;width:300px" id="s2" name="s2"  >
    <option selected></option>
    </select> -->
    <span class="error"> * <?php echo $_SESSION["error3"]; $_SESSION["error3"] = ""; ?></span>



    <!-- <input style="height:40px;width:300px" type="text" name="number"> -->

    <!-- <textarea style="height:60px;width:300px" name = "reason" cols=40 rows=4></textarea>   -->
    <br>
    <button type="submit"  name="action" value="Submit">Submit</button>
    </form>

  </body>

	<script language="javascript">

  	var testarray2 = <?php echo json_encode($deleteusers2); ?>;
    document.write((testarray);
  	var liandong2=new CLASS_YAO(testarray2)         // Set data array
  	liandong2.firstSelectChange("root","s1");      // Set first SELECT column
  	//liandong.subSelectChange("s1","s2");          // Set second level SELECT column
	</script>

</html>


