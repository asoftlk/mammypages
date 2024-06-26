<?php
include "header.php";

 if(isset($_GET['del_id'])) 
{
	$id = $_GET['del_id'];
	$data1 = mysqli_query($conn,"select * from magazine where id = '$id'");
	if(mysqli_num_rows($data1)>0){
		$row = mysqli_fetch_array($data1);
		unlink("../magazineimages/".$row['featured_image']);
		unlink("../magazines/".$row['file_name']);
		mysqli_query($conn, "DELETE FROM magazine WHERE id=$id");
		echo '<script>alert("Deleted Successfully");window.location.href="magazinelist";</script>';  
		//header( "refresh:0.01;url=magazinelist" );
	}
	else{
		echo '<script>alert("Delete failed")</script>';
	}	
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Magazines</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Magazines</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             <div class="card" >
				<div class="card-header" style="display:inline-block">
					<label style="padding-left:30px;">Show &nbsp </label><select onchange="val()" id="select_id">
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<option value="250">250</option>
				  </select><label> &nbsp Entries</label>
					<input style=" width:30%; float:right" type="text" name="search_box" id="search_box" placeholder="Search..." >
			
				<div class="card-body">
				  
				  <div class="table-responsive" id="dynamic_content">
					
				  </div>
				</div>
			  </div>
			</div>
			</div>
			</div>


      </div>
    </section>
    <!-- /.content -->
</div>
<?php include "footer.php";?>


<script>
 function myfunction() {
		var element = document.getElementById("sidebar");
		element.classList.toggle("active");
	}
  $(document).ready(function(){
	$('#select_id').change(function(){
    var num=($(this).val());
	localStorage.setItem("num", num);
	load_data(1,num);
	});
    var myval = localStorage.getItem("num");
    if(myval){
       // console.log(myval);
    load_data(1, myval);
    $('#select_id').val(myval);
    }
    else{
        load_data(1, 10);
    }

    function load_data(page, value, query = '')
    {
      $.ajax({
        url:"ajax/magazinefetch",
        method:"POST",
        data:{page:page, value:value, query:query},
        success:function(data)
        {
			//debugger
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, ($('#select_id').val()), query);
	  //debugger
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, ($('#select_id').val()), query);
	 // debugger
    });

  });
</script>
