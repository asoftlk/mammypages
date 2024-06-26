<?php include "header.php"; ?>
<link rel="stylesheet" src="plugins/jquery-ui/jquery-ui.css">
<script src="plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.min.css" integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw==" crossorigin="anonymous" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
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

</style>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!--div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div-->
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="postproduct" enctype="multipart/form-data">
                <div class="card-body">
					<div class="form-group">
					  <label for="productcategory">Product Category</label>
					  <input type="text" name="productcategory" class="form-control" id="productcategory" placeholder="Product Category">
					</div>
					<div class="form-group">
					  <label for="productname">Product Name</label>
					  <input type="text" name="productname" class="form-control" id="productname" placeholder="Product Name">
					</div>
                    <div class="form-group">
					  <label for="producturl">Product URL</label>
					  <input type="text" name="producturl" class="form-control" id="producturl" placeholder="Product URL">
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
					<?php 
$productslist= mysqli_query($conn, "SELECT distinct productcategory from products");
$array = array();
while($row=mysqli_fetch_array($productslist)){
    $array[] = $row['productcategory'];
}
$products= json_encode($array);
?>
					<div class="card-footer">
					  <button type="submit" class="btn btn-primary">Submit</button>
					</div>
			  </form>
			</div>
		  </div>
		</div>
	</section>
  </div>
						
<?php include "footer.php"?>
 <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function () {

  $('#quickForm').validate({
	  ignore: ":hidden, [contenteditable='true']:not([name])",
	  rules: {
      productname: {
        required: true,
      },
      producturl: {
        required: true,
      },
	  productimage: {
            required: true,
            extension: "jpg|jpeg|png"
	  },
	  
    },
    messages: {
      productname: {
        required: "Please Enter Product Name",
      },
      producturl: {
        required: "Please Enter Product URL",
      },
	  productimage: {
            required: "Please Choose product image",
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
                
				if(data=='Posted Successfully'){
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
$('.custom-file input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
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
$( function() {
    var availableTags = <?php echo $products; ?>;
    $( "#productcategory" ).autocomplete({
      source: availableTags
    });
  } );
</script>
