<?php include('db_connect.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Enter Grade</title>

 <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body{
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label { 
      padding: 0;
      margin: 0;
      outline: none;
      color: #666;
      line-height: 22px;
      }
	
      form {
		  float: left;
		background: white;
      width: 40%;
      padding: 30px;
      border-radius: 25px;
      box-shadow: 0 0 8px #1c87c9; 
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
	  position: left;	  
      padding: 5px;
      width: 100%;
      }
	  select {
		  width:100%;
	  }
      input[type="text"] {
      padding: 4px 5px;
      }
       input[type="submit"]  {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background:  #1c87c9;
      font-size: 15px;
      color: #fff;
      cursor: pointer;
      }
	  input[type="reset"]  {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background:  #1c87c9;
      font-size: 15px;
      color: #fff;
      cursor: pointer;
      }
	  
	 td{
		vertical-align: middle !important;
	}
	td p {
	    margin: unset;
	}
		  
      
	  
    </style>
</head>
<body>
	<div id="manage-grade">
		<form method="POST" action="add.php">
		 <H5> Enter Score </H5> 
			<label><b>Student Name:<b></label>
			<select name="student_id" id="student_id" class="custom-select select2">
                <option value=""></option>
                <?php 
								
								$students = $conn->query("SELECT * FROM students order by id asc ");
								while($row=$students->fetch_assoc()):
								?>
               <option  value="<?php echo $row['id'] ?>" <?php echo isset($id) && $id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
			    <?php endwhile; ?>
            </select>
			
			
			
			
			<label><b>Subject</label></b>
			<select name="subject_id" id="subject_id" class="custom-select select2">
                <option value=""></option>
                <?php 
								
								$subjects = $conn->query("SELECT * FROM subjects order by id asc ");
								while($row=$subjects->fetch_assoc()):
								?>
                   <option style="font-family:courier;" value="<?php echo $row['id'] ?>" <?php echo isset($id) && $id == $row['id'] ? 'selected' : '' ?>><?php echo $row['subject'] ?></option>
                <?php endwhile; ?>
				
            </select>
			
			<div class="wrapper">
			<div class="menu">
			<label><b>Quarter</label></b>
			<select name="quarter" id="quarter">
                <option value="1st Quarter">1st Quarter</option>
				<option value="2nd Quarter">2nd Quarter</option>
				<option value="3rd Quarter">3rd Quarter</option>
				<option value="4th Quarter">4th Quarter</option>
            </select>
			</div></div>
			
			<div class="wrapper">
			<div class="menu">
			<label><b>Category</label></b>
			<select name="category" id="category">
                <option value="Written_Work">Written Work</option>
				<option value="Performance_Task">Performance Task</option>
				<option value="Quarterly Assessment">Quarterly Assessment</option>
            </select>
			</div></div>
			<br>
			
			<div class="content">
			<div id="Written_Work" class="data">
		  
		  <label> <b>Score I:</b> </label>
         <input style="width:25px;text-align:center;font-family:courier;font-size:15px;" type="text" name="it1" id="trs1" onkeyup="Total1()" onkeydown="Total1()">
			
          <label> <b>Score II:</b> </label>
		 <input style="width:25px;text-align:center;font-family:courier;font-size:15px;" type="text" name="it2" id="trs2" onkeyup="Total1()" onkeydown="Total1()">
		
		  <label> <b>Score III:</b> </label>
		 <input style="width:25px;text-align:center;font-family:courier;font-size:15px;" type="text" name="it3" id="trs3" onkeyup="Total1()" onkeydown="Total1()">
		 
		   <label> <b>Score IV:</b> </label>
		 <input style="width:25px;text-align:center;font-family:courier;font-size:15px;" type="text" name="it4" id="trs4" onkeyup="Total1()" onkeydown="Total1()">
		 
		   <label> <b>Score V:</b> </label>
		 <input style="width:25px;text-align:center;font-family:courier;font-size:15px;" type="text" name="it5" id="trs5" onkeyup="Total1()" onkeydown="Total1()">
		 	<b><p style="width:250px;text-align:center;font-family:courier;font-size:15px;" id="ps1" type="text" name="ps1"></p></b>
		  <label> Total Highest Possible Score </label>
            <input style="width:50px" type="text" name="thps" id="thps" onkeyup="Total()" onkeydown="Total()">
			
         <label> Total Raw Score </label>
		 <input style="width:50px" type="text" name="trs" id="trs" onkeyup="Total()" onkeydown="Total()">
			</div>	
</div>



		<br><br>
			<input type="submit" name="add" id="btn_add"> &nbsp; <input type="reset" value="Cancel">
			
		</form>
	</div>
<div class="col-md-7" style="float:right;">
				<div class="card">
					<div class="card-header">
						<b>Grades List</b>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">

							<thead>
								<tr>
									<th class="text-center" width="1%">#</th>
									<th class="text-center" width="5%">Student</th>
									<th class="text-center" width="5%">Category</th>
									<th class="text-center" width="5%">Subject</th>
									<th class="text-center" width="1%">T.H.P.S</th>
									<th class="text-center" width="1%">T.H.R.S</th>
									
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$sql=  mysqli_query($conn, "SELECT
	 g.category,g.quarter,g.thps,g.trs,
	 ss.subject, st.name
	 from grade g
	 JOIN subjects ss ON ss.id=g.subject_id
	 JOIN students st ON st.id=g.student_id");
    while($row = mysqli_fetch_assoc($sql)) {
    ?>
   
	
								
								<tr>
								
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p><b><?php echo ucwords($row['name']) ?></b></p>
									</td>
								
								<td class="">
										<p><b><?php echo ucwords($row['category']) ?></b></p>
									</td>
									
								
									
																		<td class="">
										<p><b><?php echo ucwords($row['subject']) ?></b></p>
										<small><b><?php echo ucwords($row['quarter']) ?></b></small>
									</td>
									
									<td class="">
										<p><b><?php echo ucwords($row['thps']) ?></b></p>
									</td>
									
									<td class="">
										<p><b><?php echo ucwords($row['trs']) ?></b></p>
									</td>
									
	
									
									
									</td>
								</tr>
							 <?php
    
    } mysqli_close($conn);
      ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script> 

$(document).ready(function(){
$("#category").on('change', function(){
 $(".data").hide();
 $("#" + $(this).val()).fadeIn(700);
 }).change();
 });
 </script>
 
 


<script>
 function Total(){
  var sub1 = parseInt(document.getElementById("trs").value);
  
  var sub6 = parseInt(document.getElementById("thps").value);

  if(sub1>500 || sub6>500)
  {
    alert("Please Enter Marks in range of 100");
  }
  else {
    var ps= sub1/sub6*100;
	var wa=ps*0.30;
	document.getElementById("ps").innerHTML = "<b>Percentage Score:</b>"+ps+"%";  
	document.getElementById("wa").innerHTML = "<b>Weighted Average:</b>"+wa+"%";  
	  
	
  }
}

	function Total1(){
  var sub1 = parseInt(document.getElementById("trs1").value);
  var sub6 = parseInt(document.getElementById("trs2").value);
  var sub2 = parseInt(document.getElementById("trs3").value);
  var sub7 = parseInt(document.getElementById("trs4").value);
  var sub3 = parseInt(document.getElementById("trs5").value);

  if(sub1>500 || sub6>500)
  {
    alert("Please Enter Marks in range of 100");
  }
  else {
    var ps= sub1+sub6+sub2+sub7+sub3;
	document.getElementById("ps1").innerHTML = "<b>Total Raw Score Score:</b>"+ps;  
	  
	
  }
}
function Total2(){
  var sub11 = parseInt(document.getElementById("trs1").value);
  var sub12 = parseInt(document.getElementById("trs2").value);
  var sub13 = parseInt(document.getElementById("trs3").value);
  var sub14 = parseInt(document.getElementById("trs4").value);
  var sub15 = parseInt(document.getElementById("trs5").value);

  if(sub1>500 || sub6>500)
  {
    alert("Please Enter Marks in range of 100");
  }
  else {
    var ps= sub11+sub12+sub13+sub14+sub15;
	document.getElementById("ps1").innerHTML = "<b>Total Raw Score Score:</b>"+ps;  
	  
	
  }
}
</script>
<script>
	$('#manage-subject').on('reset',function(){
		$('#msg').html('')
		$('input:hidden').val('')
	})
	$('#manage-subject').submit(function(e){
		e.preventDefault()
		$('#msg').html('')
		start_load()
		$.ajax({
			url:'ajax.php?action=save_subject',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}else if(resp == 2){
				$('#msg').html('<div class="alert alert-danger mx-2">Subject already exist.</div>')
				end_load()
				}				
			}
		})
	})
	$('.edit_grade').click(function(){
		start_load()
		var cat = $('#manage-grade')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='student_id']").val($(this).attr('data-student_id'))
		cat.find("[name='category']").val($(this).attr('data-category'))
		end_load()
	})
	$('.delete_subject').click(function(){
		_conf("Are you sure to delete this subject?","delete_subject",[$(this).attr('data-id')])
	})
	function delete_subject($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_subject',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	$('table').dataTable()
</script>
</body>
</html>