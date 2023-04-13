<?php include('db_connect.php');?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
<div class="col-md-12" style="float:center;">
				<div class="card">
					<div class="card-header">
						<b>Grades List</b>
					</div>
					<div class="card-body">
						<form id="edit_form" action="ajax.php?action=save_grade" method="post"></form>
						<table class="table table-condensed table-bordered table-hover">

							<thead>
								<tr>
									<th class="text-center" width="1%">#</th>
									<th class="text-center" width="5%">Student</th>
									<th class="text-center" width="5%">Category</th>
									<th class="text-center" width="5%">Subject/Quarter</th>
									<th class="text-center" width="1%">Score 1</th>
									<th class="text-center" width="1%">Score 2</th>
									<th class="text-center" width="1%">Score 3</th>
									<th class="text-center" width="1%">Score 4</th>
									<th class="text-center" width="1%">Score 5</th>
									<th class="text-center" width="1%">T.H.P.S</th>
									<th class="text-center" width="1%">T.H.R.S</th>
									<th class="text-center" width="1%">Action</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$sql=  mysqli_query($conn, "SELECT
	 g.id, g.category,g.quarter,g.it1,g.it2,g.it3,g.it4,g.it5,g.thps,g.trs,
	 ss.subject, st.name
	 from grade g
	 JOIN subjects ss ON ss.id=g.subject_id
	 JOIN students st ON st.id=g.student_id");
    while($row = mysqli_fetch_assoc($sql)) {
                                ?>
	
								
								<tr data-id="<?php echo $row['id'] ?>">

									<td class="text-center">
										<?php echo $i++ ?>
									</td>
									<td class="">
										<p>
											<b>
												<?php echo ucwords($row['name']) ?>
											</b>
										</p>
									</td>

									<td class="">
										<p>
											<b>
												<?php echo ucwords($row['category']) ?>
											</b>
										</p>
									</td>



									<td class="">
										<p>
											<b>
												<?php echo ucwords($row['subject']) ?>
											</b>
										</p>
										<small>
											<b>
												<?php echo ucwords($row['quarter']) ?>
											</b>
										</small>
									</td>
									
										<td class="">
											<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden />
											<input type="text" class="grade_editable" name="it1" value="<?php echo ucwords($row['it1']) ?>" readonly="readonly" maxlength="4" size="4" />
										</td>
										<td class="">
											<input  type="text" class="grade_editable" name="it2" value="<?php echo ucwords($row['it2']) ?>" readonly="readonly" maxlength="4" size="4" />
										</td>
										<td class="">
											<input type="text" class="grade_editable" name="it3" value="<?php echo ucwords($row['it3']) ?>" readonly="readonly" maxlength="4" size="4" />
										</td>
										<td class="">
											<input type="text" class="grade_editable" name="it4" value="<?php echo ucwords($row['it4']) ?>" readonly="readonly" maxlength="4" size="4" />
										</td>
										<td class="">
											<input type="text" class="grade_editable" name="it5" value="<?php echo ucwords($row['it5']) ?>" readonly="readonly" maxlength="4" size="4" />
										</td>

										<td class="">
											<input type="text" class="grade_editable" name="thps" value="<?php echo ucwords($row['thps']) ?>" readonly="readonly" maxlength="4" size="4" />
										</td>

										<td class="">
											<input type="text" class="grade_editable" name="trs" value="<?php echo ucwords($row['trs']) ?>" readonly="readonly" maxlength="4" size="4" />
										</td>
									

									<td class="text-center">


										<button class="btn btn-sm btn-outline-primary edit_grade" type="button" data-id="<?php echo $row['id'] ?>">Edit</button>
										<button form="edit_form" class="btn btn-sm btn-outline-success save_grade" type="submit" data-id="<?php echo $row['id'] ?>" hidden tabindex="0">Save</button>
										<button class="btn btn-sm btn-outline-danger delete_student" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
	</div>
		</div>
		</div>
	
	
<style>
	input[readonly="readonly"] {
		  border:0px;
	}
		td{
		vertical-align: middle !important;
		align-text: center;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})

	$('#edit_form').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_grade',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Grade successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}else{
					//$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					alert_toast("Error saving the grade", 'danger');
					console.log(resp);
				}
				end_load()
			}
		})
	})
	

	$('.edit_grade').click(function(){
		//uni_modal("Manage Grade Details","manage_grade.php?id="+$(this).attr('data-id'),"mid-large")
		let id = $(this).attr('data-id');
		let tr = $('table').find(`tr[data-id="${id}"]`);

		$(`.save_grade[data-id="${id}"]`).removeAttr('hidden');
		$(`.edit_grade[data-id="${id}"]`).attr('hidden', true);

		tr.children('td').each(function () {
			let input = $(this).find('input');
			input.attr('form', "edit_form");
			input.removeAttr('readonly');
		});
		
	})


	$('.delete_student').click(function(){
		_conf("Are you sure to delete this student?","delete_student",[$(this).attr('data-id')])
	})
	
	function delete_student($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_student',
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
</script>
