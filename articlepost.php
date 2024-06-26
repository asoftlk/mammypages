 <?php include "db.php"; ?> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.min.css" integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw==" crossorigin="anonymous" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.min.css">
 <link rel="stylesheet" href="admin/fapro/css/all.css">
<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3c8dbc;
    border-color: #367fa9;
    padding: 1px 10px;
    color: #fff;
}
label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 700;
    color: #5f46c6;
}
.note-editor .note-toolbar, .note-popover .popover-content {
    margin: 0 -10px;
}
</style>
    <div class="col-md-7" style="border-right:1px solid #dddddd; padding:0">
        
        <div style="background-color:white; border-bottom:10px solid #f4f4f4; padding:15px"><h5><b>POST ARTICLE</b></h5></div>
        
<script>
$(document).ready(function() {
    $( "#datetime" ).hide(); 
});	
</script>
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary" style="border:none">
              <!-- form start -->
              <form id="quickForm" method="POST" action="postarticle" enctype="multipart/form-data">
                <div class="card-body">
					<div class="row">
						<div class="col-md-6 form-group">
						<label>Select Language</label>
                        <select class="form-control" name="language" id="language1">
                          <option selected="" disabled="" value="null" class="hidden">--Select Language</option>
						  <option value="eng">English</option>
                          <option value="sin">සිංහල</option>
                          <option value="tam">தமிழ்</option>
                        </select>
						</div>
						<div class="col-md-6 form-group">
						<label>Article Category</label>
                        <select class="form-control" name="category" id="category1">
                        </select>
						</div>					  
					</div>
					<div class="row">
					  <div class="col-md-12 form-group">
						<label for="articleTitle">Article Title</label>
						<input type="text" name="articleTitle" class="form-control" id="articleTitle" placeholder="Article Title">
					  </div>
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
						<label>Article Type</label>
                        <select class="form-control" name="arttype">
                          <option selected="" disabled="" value="null" class="hidden">--Article Type</option>
                          <option>Text</option>
                          <option>Image</option>
                          <option>Video</option>
                        </select>
						</div>
						<div class="col-md-6 form-group">
						<label>Publish Type</label>
                        <select name="pubtype" class="form-control" id="pubtype">
                          <option selected="" disabled="" value="null" class="hidden">--Publish Type</option>
                          <option>Immediate</option>
                          <option>Scheduled</option>
                        </select>
						</div>
					</div>
					<div class="row">
					  <div class="col-md-12 form-group" id="datetime">
						  <label>Date and time:</label>
							<div class="input-group date" id="reservationdatetime" data-target-input="nearest">
								<input type="text" class="form-control datetimepicker-input" name="datetime" placeholder="DD/MM/YYYY HH:MM" data-target="#reservationdatetime"/>
								<div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
					  </div>
					  
					</div>
					<div class="row">
					  <div class="col-md-6 form-group">
						<label for="tags">Tags</label>
						<input type="text" name="tags" class="form-control" id="tags" placeholder="Article Tags">
					  </div>
					  <div class="col-md-6 form-group">
						<label for="keywords">Keywords</label>
						<input type="text" name="keywords" class="form-control" id="keywords" placeholder="Article Keywords">
					  </div>
					</div>
					<div class="row">
					  <label for="articledescription">Description</label>
					  <textarea id="summernote" name="articledescription" class="articledescription" required></textarea>
					</div>
					<div class="form-group">
                    <label for="featuredimage">Featured Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="featuredimage" class="custom-file-input" id="featuredimage" >
                        <label class="custom-file-label" for="featuredimage">Choose file</label>
                      </div>
                    </div>
					</div>
					<div id="artimages">
					<div class="form-group">
                    <label for="articleimages">Article Images</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="articleimages[]" class="custom-file-input" id="articleimages">
                        <label class="custom-file-label" for="articleimages">Choose file</label>
                      </div>
                    </div>
					</div>
					</div>
					<button class="btn btn-primary add-image" style="float:left">Add More</button>
					<br>
					<br>
					<div class="form-group">
                    <label for="articlefile">Article File(pdf)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="articlefile" class="custom-file-input" id="articlefile">
                        <label class="custom-file-label" for="articlefile">Choose file</label>
                      </div>
                    </div>
					</div>
					</div>
				</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit for Review</button>
                </div>
              </form>
            </div>
            </div>
          <div class="col-md-6">
          </div>
          <!--/.col (right) -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
        
    </div>
    <div class="col-md-2">
     
    </div>
  </div>
  
</div>
<script>
//$( 'a[href*="dashboard"]').css("color", '#cf5787');
</script>

<?php include "footer.php";?>
<script src="admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="admin/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function () {
  $.validator.addMethod("htmlEditorEmpty", function(value, element) {
        alert("checking");
        return this.optional(element) || value.summernote('isEmpty');
    }, "Please enter details");
   $.validator.addMethod("valueNotEqualsAbout", function () {
	   debugger
            $("#articledescription").val($('.summernote').code());
            if ($("#articledescription").val() != "" && $("#articledescription").val().replace(/(<([^>]+)>)/ig, "") != "") {
                $('#articledescription').val('');
                return true;
            } else {
                return false;
            }
        }, 'This field is required.');
  $('#quickForm').validate({
	  ignore: ":hidden, [contenteditable='true']:not([name])",
	  rules: {
      language: {
        required: true,
      },
      category: {
        required: true,
      },
	  articleTitle: {
		  required: true,
	  },
      arttype: {
        required: true,
      },
	  pubtype: {
        required: true,
      },
	  datetime: {
		  required: true,
	  },
	  tags: {
		  required: true,
	  },
	  keywords: {
		  required: true,
	  },
	  articledescription:{
		  valueNotEqualsAbout: true,
		  htmlEditorEmpty: true,
		  required: true,
	  },
	  featuredimage: {
            required: true,
            extension: "jpg|jpeg|png"
	  },
	  'articleimages[]': {
            required: true,
            extension: "jpg|jpeg|png"
      },
	  products: {
		  required: true,
	  },
	  articlefile : {
		  extension: "pdf",
	  },
    },
    messages: {
      language: {
        required: "Please select Article Language",
      },
      category: {
        required: "Please Select Article category",
      },
      arttype: {
		required: "Please Select Article Type",
	  },
	  pubtype: {
		required: "Please Select Publish Type",
	  },
	  datetime: {
		  required: "Please enter Date and Time in DD/MM/YYYY HH:SS",
	  },
	  tags: {
		  required: "Please Enter Tags",
	  },
	  keywords: {
		  required: "Please Enter keywords",
	  },
	  featuredimage: {
            required: "Please Choose featured image",
            extension: "The image extension should be jpg/jpeg/png"
	  },
	  'articleimages[]': {
            required: "Please Choose article images",
            extension: "The image extension should be jpg/jpeg/png"
      },
	  
	  
	},
	submitHandler: function(form) {
			var form_data = new FormData(form);
			$('.articleimages').each(function() {
			$(this).rules("add", 
				{
					required: true,
					messages: {
						required: "Image is required",
					}
				});
			});
		$.ajax({
            type:form.method,
            url: form.action,
            mimeType: "multipart/form-data",
            data:form_data,
			contentType: false,
			cache: false,
			processData: false,
            success:function(data){
               // debugger
				//console.log(data);
				if(data=='Posted Successfully'){
                removeReg(data, 'success');
				//window.location.reload();
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
</script>

  <script>

    //$('#reservationdatetime').datetimepicker({ format : 'DD/MM/YYYY HH:mm', minDate:new Date(), icons: { time: 'fa fa-clock' }, });
	
    $('#summernote').summernote({width:"100%", height:"250"});
	
	$(document).on('change', '#pubtype', function () {
            if($('#pubtype option:selected').text()=='Scheduled'){
				$( "#datetime" ).prop("disabled", false );
				$( "#datetime" ).show();
			}
			else{
				$( "#datetime" ).prop("disabled", true );
				$( "#datetime" ).hide();
			}
    });

	$(document).on('change', '.custom-file-input', function (event) {
	if(event.target.files[length]){
    $(this).next('.custom-file-label').html(event.target.files[0].name);
	}
})
</script>
<script>

 function removeReg(data, status) {
  Swal.fire({
      text: data,
      icon: status,
    })
    .then(function(value) {
        if(status == 'success'){
            window.location.reload();
        }
      //console.log('returned value:', value);	  
    });
}

function fetch_cat1(){
	var lang = $('#language1 option:selected').val();
	$('#category1').children().remove();
    $.ajax({
        url: "ajax/language",
        data: {lang : lang},
		type: "POST",
        success: function(data) {
            var json = data ? JSON.parse(data): [];
			$('#category1').append('<option selected="" disabled="" value="null" class="hidden">--Article Category</option>');
			for (var i=0;i<json.length;++i)
			{
				$('#category1').append('<option>'+json[i]+'</option>');
				//console.log(json[i]);
			} 
        },
		error: function(data) {
			console.log(data);
		}
    });
}

$(document).on('change', '#language1', function() {

    fetch_cat1();
});
$(document).on('load', function() {
    fetch_cat1();
});

</script>
<script>
$(document).ready(function(){
    var max_input = 10;
    var x = 1;
$('.add-image').click(function (e) {
      e.preventDefault();
      var htmlfield='<div class="form-group">\
					<div class="input-group">\
                      <div class="custom-file">\
                        <input type="file" name="articleimages[]" class="custom-file-input" id="articleimages" multiple>\
                        <label class="custom-file-label" for="articleimages">Choose file</label>\
                      </div>\
					  </div>\
                    <a href="#" id="remove-lnk" style="float:right; margin-right:2rem; color:red">Remove</a></div>';
    if (x < max_input) { // validate the condition
        x++;
        $('#artimages').append(htmlfield);
    }
});
$('#artimages').on("click", "#remove-lnk", function (e) {
      e.preventDefault();
      $(this).parent('div').remove();  // remove input field
      x--; // decrement the counter
    });
});
</script>
