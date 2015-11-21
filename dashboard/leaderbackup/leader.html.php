<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Leader</title>

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

    <?php foreach ($results as $row): ?>
      <form action="" method="post">
			username: <input type="hidden" name="userid" value="<?=$row[userid]?>"><?=$row[username]?><br>
			Leave appointment: <input type="hidden" name="timeid" value="<?=$row[timeid]?>"><?=$row[timedate]," ",$row[starttime]," - ",$row[endtime]?><br>
      Reason: <input type="hidden" name="userid" value=""><?=$row[reason]?><br>
      <button type="submit"  name="action" value="apagree">Agree</button>
      <button type="submit"  name="action" value="apreject">Reject</button>
		  </form>	
    <?php endforeach; ?>
    <?php echo "<br>"."*************************I'm handsome cut-off***********************************" . "<br>". "<br>"?>
    <?php foreach ($results2 as $row): ?>
      <form action="" method="post">
      username1: <input type="hidden" name="userid1" value="<?=$row[userid1]?>"><?=$row[un1]?>
      username2: <input type="hidden" name="userid2" value="<?=$row[userid2]?>"><?=$row[un2]?><br>
      switch time1: <input type="hidden" name="timeid1" value="<?=$row[usertime1]?>"><?=$row[td1]," ",$row[ts1]," - ",$row[te1]?><br>
      switch time2: <input type="hidden" name="timeid2" value="<?=$row[usertime2]?>"><?=$row[td2]," ",$row[ts2]," - ",$row[te2]?><br>
      Reason: <input type="hidden" name="userid" value=""><?=$row[reason]?><br>
      <button type="submit"  name="action" value="swagree">Agree</button>
      <button type="submit"  name="action" value="swreject">Reject</button>
      </form> 
    <?php endforeach; ?>




    <form action="" method="post">
    <select style="height:40px;width:300px" id="s1" name="s1"  >
    <option selected></option>
    </select>

    <br>

    <select style="height:40px;width:300px" id="s2" name="s2"  >
    <option selected></option>
    </select>

    <br><br>
    <!-- <input style="height:40px;width:300px" type="text" name="reason"> -->
    <button type="submit"  name="action" value="Addemployee">Submit</button>
    </form>


  	</body>
    <script language="javascript">

    var testarray = <?php echo json_encode($results3); ?>;
    var liandong=new CLASS_YAO(testarray)         // Set data array
    liandong.firstSelectChange("root","s1");      // Set first SELECT column
    liandong.subSelectChange("s1","s2");          // Set second level SELECT column
    </script>

</html>


