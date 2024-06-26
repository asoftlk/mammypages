<?php
include "header.php";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
<script>function removeReg(data, status) {
				  Swal.fire({
					  text: data,
					  icon: status,
					})
					.then(function(value) {
						window.location.href="users";
					  	  
					});
				}
				</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Posts</li>
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
					<label style="padding-left:30px;">Show &nbsp </label><select  id="select_id">
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div class="container">
        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
            <label>Posting ID:</label><input type="text" class="form-control" id="posting_id">
         </div>
        </div>
		</div>
    
	
		</form>        
      </div>
      <!--div class="modal-footer">
          <button type="button" class="btn btn-secondary">Update</button>
      </div-->
    </div>
  </div>
</div>
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
        url:"ajax/postfetch",
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