<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

</head>
  <style>
  .alert-message {
    color: red;
  }
</style>
<body>
<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-success"> 
       
     </h2><br>
     <div class="row">
       <div class="col-12 text-right">
        
       </div>
    </div>
    <div class="row" style="clear: both;margin-top: 18px;">
        <div class="col-12">
          <table id="laravel_crud" class=" table table-bordered ">
<thead>
<tr>
<td>Id</td>
<td>Name</td>
<td>Email</td>
<td>password</td>
<td>usertype</td>
</tr>
</thead>
<tbody> 

@foreach ($users as $user)

<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->usertype }}</td>

<td><a href="#" class="btn btn-success editbtn">EDIT</a> </td>
</tr>

@endforeach
</tbody>
</table>
<div id="MyPopup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;</button>
                <h4 class="modal-title">
				EDIT YOUR DATA
                </h4>
            </div>
            <div class="modal-body">

			<form  id="editformID" >

			{{csrf_field()}}
            {{method_field('PUT')}}
			<table>
		
		    <input type="hidden" name="id" id="id">

			<tr>
			<th>Name</th>
			<td><input type="text" name="name" id="name"></td>
			</tr>
			<tr>
			<th>Email</th>
			<td><input type="text" name="email" id="email"></td>
			</tr>
			<tr>
			<th>Usertype</th>
			<td><input type="text" name="usertype" id="usertype"></td>
			</tr>
            <tr>
            <td><input type="submit"  name="update" value="update" class="btn btn-success btn-md"></td>
            </tr>
            
			</table>
		
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    
            </div>		
            </form>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<script type="text/javascript">
//JQUERY FUNCTIONS START//
    $(document).ready(function(){
        $('.editbtn').on('click',function(){
            $('#MyPopup').modal('show');

            $tr=$(this).closest('tr');
            var data=$tr.children("td").map(function(){
                return $(this).text();
                                             
            }).get();
            console.log(data);
            $('#id').val(data[0]);
            $('#name').val(data[1]);
			$('#email').val(data[2]);
            $('#usertype').val(data[3]);

        });
//JQUERY END //
// start ajax code for update
		$('#editformID').on('submit',function(e){
			e.preventDefault();

			var id = $('#id').val();

			$.ajax ({
				type: "PUT",
				url : "/edit/"+id,
				data: $('#editformID').serialize(),
				success: function (response){
					console.log(response);
					$('#MyPopup').modal('hide');
					  alert("Data Updated Successfully");
					  location.reload();
				},
			  error: function (error)
			  {
				  console.log(error);
			  }
			});
		});
        //end ajax code for update
    });

</script> 
</body>
</html>