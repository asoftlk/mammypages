<?php
include "header.php";

 if(isset($_GET['del_id'])) 
{
	$id = $_GET['del_id'];
	$data1 = mysqli_query($conn,"select * from products where id = '$id'");
	if(mysqli_num_rows($data1)>0){
		$row = mysqli_fetch_array($data1);
		unlink("../products/".$row['file_name']);
		mysqli_query($conn, "DELETE FROM products WHERE id=$id");
		echo '<script>alert("Deleted Successfully");window.location.href="productlist";</script>';  
		//header( "refresh:0.01;url=productlist" );
	}
	else{
		echo '<script>alert("Delete failed")</script>';
	}	
}
$productslist= mysqli_query($conn, "SELECT distinct productcategory from products");
$array = array();
while($row=mysqli_fetch_array($productslist)){
    $array[] = $row['productcategory'];
}
$products= json_encode($array);
?>
<link rel="stylesheet" src="plugins/jquery-ui/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.min.css" integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<style>
.ui-menu-item .ui-menu-item-wrapper.ui-state-active {
    background: #6693bc !important;
    font-weight: bold !important;
    color: #ffffff !important;
} 
ul.ui-autocomplete {
    list-style: none;
    list-style-type: none;
    margin: 0px;
    padding: 5px;
    background-color:white;
    z-index:5;
    border:1px solid black;
    width:50%;
}
.modal-dialog {
    min-width:50%;
    min-height: calc(100% - 3.5rem);
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ui-front">
        <form id="quickForm" method="POST" action="postproduct" enctype="multipart/form-data">
		<input type="hidden" name="id" id="id">
        <div class="container">
			<div class="form-group">
            <label>Product Category</label><input type="text" name="productcategory" class="form-control" id="productcategory">
         </div>
			<div class="form-group">
            <label>Product Name</label><input type="text" name="Productname" class="form-control" id="Productname">
         </div>
			<div class="form-group">
            <label>Product Category</label><input type="text" name="producturl" class="form-control" id="producturl">
         </div>
          <div class="preview d-flex">
            <label>Product Image:</label>
            <img src=""   id="product_image" class="img-fluid" style="max-height:200px">
		</div>
        <div class="form-group">
			<label for="productimage">Product Image</label>
			<div class="input-group">
			  <div class="custom-file">
				<input type="file" name="productimage" class="custom-file-input" id="productimage" >
				<label class="custom-file-label" for="productimage">Choose file</label>
			 </div>
			</div>
		</div>
		 </div>
		 <div class="modal-footer">
<!--<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>-->
          <button type="submit" class="btn btn-sm btn-secondary">Update</button>
      </div>
    </form>
                
       </div> 

      
    </div>
  </div>
</div>
<?php include "footer.php";?>
 <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script>
$(function () {

  $('#quickForm').validate({
	  ignore: ":hidden, [contenteditable='true']:not([name])",
	  rules: {
	  productcategory:
	  {
		  required:true,
	  },
      Productname: {
        required: true,
      },
      producturl: {
        required: true,
      },
	  productimage: {
            extension: "jpg|jpeg|png"
	  },
	  
    },
    messages: {
	  productcategory: {
        required: "Please Enter Product Category",
      },
      Productname: {
        required: "Please Enter Product Name",
      },
      producturl: {
        required: "Please Enter Product URL",
      },
	  productimage: {
            extension: "The image extension should be jpg/jpeg/png"
	  },
	  
	},
	submitHandler: function(form) {
			var form_data = new FormData(form);

		$.ajax({
            type:form.method,
            url: form.action,
            mimeType: "multipart/form-data",
            data:form_data,
			contentType: false,
			cache: false,
			processData: false,
            success:function(data){
                
				if(data=='Updated Successfully'){
                removeReg(data, 'success');
				}
				else{
					removeReg(data, 'error');
				}
            },
            error: function(data){
                //console.log("error");
                console.log(data);
                removeReg(data, 'error');
            }
        });
	},
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
function removeReg(data, status) {
  Swal.fire({
      text: data,
      icon: status,
    })
    .then(function(value) {
      //console.log('returned value:', value);
      if(status=="success"){
	  window.location.reload();
      }
    });
}

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
    load_data(1, myval);
    $('#select_id').val(myval);
    }
    else{
        load_data(1, 10);
    }

    function load_data(page, value, query = '')
    {
      $.ajax({
        url:"ajax/productfetch",
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
  
  function fetch_id(id)
		{
		 $.ajax({
        url:"ajax/productfetchedit",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
			//debugger
            var data1= JSON.parse(data);
            for(var key in data1){
                if($("#" + key).length != 0){
                    if(key == 'productimage')
                        {
                        if(data1[key]){
                          $('#product_image').attr('src', '../products/'+data1[key]);  
                        }
                        else{
                              $('#product_image').remove();  
                        }
                        }
                    else{
                    $('#'+key).val(data1[key]); 
                    }
                }
                //console.log(key +  " -> " + data1[key]);
              // $('#').val(data1.first_name); 
            }
			var availableTags = <?php echo $products; ?>;
			$( "#productcategory" ).autocomplete({
			  source: availableTags
			});
			$('#exampleModalCenter').modal('show');
			$( "#productcategory" ).autocomplete( "option", "appendTo", ".eventInsForm" );

          //$('.modal-body').html(data);
        }
      });
		}

	$(document).on("change", ".custom-file-input", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});

  $(document).on('change', "#productimage", function(){
	  var filetype = event.target.files[0];
		if (filetype) {
			var source=URL.createObjectURL(filetype);
			$('#product_image').attr('src', source);
		}
  });
</script>
