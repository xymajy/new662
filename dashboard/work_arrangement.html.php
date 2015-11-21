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
      if(type == 1) obj1.options[0]=new Option("These time need more employee",'');
      else obj1.options[0]=new Option("Please select employee",'');
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
    <form action="index.php" method="post">
    <select style="height:40px;width:300px" id="s1" name="s1"  >
    <option selected></option>
    </select>

    <br>

    <select style="height:40px;width:300px" id="s2" name="s2"  >
    <option selected></option>
    </select>

    <br><br>
    <!-- <input style="height:40px;width:300px" type="text" name="reason"> -->
    <button type="submit"  name="action3" class="btn btn-primary hidden-xs" value="Addemployee">Submit</button>
    </form>
	</body>
	<script language="javascript">

    var testarray = <?php echo json_encode($moreemployees); ?>;
    var liandong=new CLASS_YAO(testarray)         // Set data array
    liandong.firstSelectChange("root","s1");      // Set first SELECT column
    liandong.subSelectChange("s1","s2");          // Set second level SELECT column
    </script>
</html>