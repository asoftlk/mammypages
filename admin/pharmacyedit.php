<?php ob_start();
include "header.php"; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.min.css" integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw==" crossorigin="anonymous" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="fapro/css/all.css">
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

    .required:after {
        content: " *";
        color: red;
    }

    .subtype {
        display: none;
    }
</style>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * from pharmacy p LEFT JOIN pharmacy_working_times pwt ON pwt.pharmacy_id = p.pharmacy_id Where p.id='$id'");
$row = mysqli_fetch_array($result);

$days = ['mon' => 'monday', 'tue' => 'tuesday', 'wed' => 'wednesday', 'thu' => 'thursday', 'fri' => 'friday', 'sat' => 'saturday', 'sun' => 'sunday'];
$times = [];

foreach ($days as $abbr => $day) {
    $openKey = $day . '_open';
    $closeKey = $day . '_close';
    $times[$abbr . 'open'] = $row[$openKey] == '00:00:00' ? '' : $row[$openKey];
    $times[$abbr . 'close'] = $row[$closeKey] == '00:00:00' ? '' : $row[$closeKey];
}

?>

<script>
    $(document).ready(function() {
        $("#datetime").hide();
    });
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pharmacy</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="viewpharmacy">Pharmacy</a></li>
                        <li class="breadcrumb-item active">Edit Pharmacy</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="viewpharmacy.php" class="btn btn-mammy">Cancel / Back</a>
                </div><br><br>
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary" style="border:none">
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="updatepharmacy" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="mpId" value="<?php echo $row['pharmacy_id']; ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="required" for="mpname">Pharmacy Name</label>
                                        <input type="text" name="mpname" class="form-control" id="mpname" value="<?php echo $row["name"]; ?>" placeholder="Pharmacy Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="cerNo">Certificate No</label>
                                        <input type="text" name="cerNo" class="form-control" id="cerNo" value="<?php echo $row["certificate"]; ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="required" for="address">Pharmacy Address</label>
                                        <input type="text" name="address" class="form-control" id="address" value="<?php echo $row['address']; ?>" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="address">City</label>
                                        <input type="text" name="city" class="form-control" id="city"  value="<?php echo $row['city']; ?>">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="required" for="mapLocation">Pharmacy Map location</label>
                                        <input type="text" name="mapLocation" class="form-control" id="mapLocation" value="<?php echo htmlspecialchars($row['map']); ?>" placeholder="Copy form Google Map by poining the location">
                                    </div>
                                    <div class="form-group">
                                            <label class="required" for="cerNo">Year of Establishment</label>
                                            <input type="text" name="estYear" class="form-control" id="estYear" value="<?php echo $row['established']; ?>">
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="required" for="city">City</label>
                                        <input type="text" name="city" class="form-control" id="hospitcity" value="<?php echo $row['city']; ?>" placeholder="City">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="required" for="contactNumber">Contact Number</label>
                                        <input type="tel" name="contactNumber" class="form-control" id="contactNumber" value="<?php echo $row['mobile']; ?>" placeholder="Contact Number">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="whatsapp">Whatsapp Number</label>
                                        <input type="tel" name="whatsapp" class="form-control" id="whatsapp" value="<?php echo $row['whatsapp']; ?>" placeholder="Contact Number">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="required" for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" placeholder="Email ID">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="web">Website</label>
                                        <input type="url" name="web" class="form-control" id="web" value="<?php echo $row['website']; ?>" placeholder="Website">
                                    </div>
                                    <div class="form-group">
                                        <label class="required" for="service">Services</label>
                                        <input type="text" data-role="tagsinput" class="form-control" id="service" name="service" value="<?php echo $row['service']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="branchworking">Hours of Operation</label>
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Open time</th>
                                                <th>End time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($days as $abbr => $day) : ?>
                                                <tr>
                                                    <td><?php echo ucfirst($day); ?></td>
                                                    <td>
                                                        <input type="time" name="<?php echo $abbr; ?>opentime" class="form-control form-control-sm border-0" id="<?php echo $abbr; ?>opentime" placeholder="<?php echo ucfirst($day); ?> Open Time" value="<?php echo $times[$abbr . 'open']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="<?php echo $abbr; ?>endtime" class="form-control form-control-sm border-0" id="<?php echo $abbr; ?>endtime" placeholder="<?php echo ucfirst($day); ?> End Time" value="<?php echo $times[$abbr . 'close']; ?>">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-info" onclick="clearTimeInputs('<?php echo $abbr; ?>')">Clear</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="fb">Facebook Link</label>
                                        <input type="url" name="fb" class="form-control" id="fb" value="<?php echo $row['facebook']; ?>" placeholder="Facebook Link">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="insta">Instagram Link</label>
                                        <input type="url" name="insta" class="form-control" id="insta" value="<?php echo $row['instagram']; ?>" placeholder="Instagram Link">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="linkedin">TikTok Link</label>
                                        <input type="url" name="linkedin" class="form-control" id="linkedin" value="<?php echo $row['linkedin']; ?>" placeholder="TikTok Link">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label class="required">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option selected="" disabled="" value="null" class="hidden">--Select Status</option>
                                            <option value="Verified" <?php if ($row['status'] == "Verified") echo  'selected="selected"'; ?>>Verified</option>
                                            <option value="Not Verified" <?php if ($row['status'] == "Not Verified") echo  'selected="selected"'; ?>>Not Verified</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label class="required" for="about">About</label>
                                        <textarea class="form-control" id="about" name="about" class="about" required><?php echo $row['about']; ?></textarea>
                                    </div>
                                </div>
                                <!--div class="row">
					  <div class="col-md-12 form-group">
						<label >Priority</label>
                        <select class="form-control" name="priority" id="priority" value="<?php echo $priority = $row['priority']; ?>">
                          <option selected="" disabled="" value="null" class="hidden">--Select Priority</option>
						  <option value="0" <?php if ($priority == "0") echo  'selected="selected"'; ?>>None</option>
						  <option value="1" <?php if ($priority == "1") echo  'selected="selected"'; ?>>1</option>
						  <option value="2" <?php if ($priority == "2") echo  'selected="selected"'; ?>>2</option>
						  <option value="3" <?php if ($priority == "3") echo  'selected="selected"'; ?>>3</option>
						  <option value="4" <?php if ($priority == "4") echo  'selected="selected"'; ?>>4</option>
						 <option value="5" <?php if ($priority == "5") echo  'selected="selected"'; ?>>5</option>
						 <option value="6" <?php if ($priority == "6") echo  'selected="selected"'; ?>>6</option>
						 <option value="7" <?php if ($priority == "7") echo  'selected="selected"'; ?>>7</option>
						 <option value="8" <?php if ($priority == "8") echo  'selected="selected"'; ?>>8</option>
						 <option value="9" <?php if ($priority == "9") echo  'selected="selected"'; ?>>9</option>
						 <option value="10" <?php if ($priority == "10") echo  'selected="selected"'; ?>>10</option>	
						</select>
					  </div>
					</div-->

                                <div class="form-group">
                                    <label class="required" for="logoimage">logo Image</label>
                                    <br>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept="image/*" id="customFilelogo" name="logoimage" value="">
                                        <label class="custom-file-label" name="logoimage" for="logoimage"><?php echo $row['logo'] ?></label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div id="customFilelogopreview">
                                        <?php if (($row['logo'] != "") && file_exists("../directory/pharmacy/" . $row['logo'])) { ?>
                                            <p class="img-center" style="color:green;margin-bottom:0">Logo Preview</p>
                                            <button class="close img-center" onclick="removepreview($('#customFilelogo'))" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button>
                                            <img src="../directory/pharmacy/<?php echo $row['logo'] ?>" class="img-fluid img-center" style="position:relative; width:200px; max-height: 180px; border:1px solid gray; margin-bottom:5px" />
                                        <?php } ?>
                                    </div>
                                </div>

                                <br>
                                <div class="form-group">
                                    <label class="required" for="featuredimage">Featured Image</label>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept="image/*" id="customFilefeature" name="featuredimage" value="">
                                        <label class="custom-file-label" name="featuredimage" for="featuredimage"><?php echo $row['image'] ?></label>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <div id="customFilefeaturepreview">
                                        <?php if (($row['image'] != "") && file_exists("../directory/pharmacy/" . $row['image'])) { ?>
                                            <p class="img-center" style="color:green;margin-bottom:0">Featured Image Preview</p>
                                            <button class="close img-center" onclick="removepreview($('#customFilefeature'))" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button>
                                            <img src="../directory/pharmacy/<?php echo $row['image'] ?>" class="img-fluid img-center" style="position:relative; width:200px; max-height: 180px; border:1px solid gray; margin-bottom:5px" />
                                        <?php } ?>
                                    </div>
                                </div>


                                <div id="artfetch">
                                    <div class="form-group">
                                        <label for="galleryimage">Gallery Image(s)</label>
                                        <?php
                                        $galquery = mysqli_query($conn, "SELECT * FROM mppharmacy_gallery WHERE pharmacy_id= '$row[pharmacy_id]'");
                                        $i = 0;
                                        while ($galrow = mysqli_fetch_array($galquery)) {
                                            echo '<div>
							<div class="input-group">
								<div class="custom-file">
									<input type="hidden" name="galleryid[]" value="' . $galrow["id"] . '">
									<input type="file" class="custom-file-input customFilegallery" id="customFilegallery' . $i . '" name="galleryimage[]" accept="image/*">
									<label class="custom-file-label" for="galleryimage">' . $galrow['image_name'] . '</label>
								</div>
								</div>
						<div class="text-center">
						<div id="customFilegallery' . $i . 'preview">';
                                            if (($galrow['image_name'] != "") && file_exists("../directory/pharmacy/" . $galrow['image_name'])) {
                                                echo '<p class="img-center" style="color:green;margin-bottom:0">Gallery Image Preview</p>
								<button class="close img-center" onclick="removepreview($(\'#customFilegallery' . $i . '\'))" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button>
								<img src="../directory/pharmacy/' . $galrow["image_name"] . '"  class="img-fluid img-center" style="position:relative; width:200px; max-height: 180px; border:1px solid gray; margin-bottom:5px"/>';
                                            }
                                            echo    '</div>
                    </div><a href="#" class="remove-lnk1" style="float:right; margin-right:2rem; color:red">Remove</a></div>';
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                    <div id="galleryimages">
                                    </div>
                                </div>
                                <button class="btn btn-primary add-image" style="float:left">Add More</button>
                                <br>
                                <br>

                                <div class="form-group">
                                    <label for="videoembed">Embed Video</label>
                                    <input type="text" name="videoembed" class="form-control" value="<?php if (strpos($row['video'], 'iframe')) {
                                                                                                            echo htmlspecialchars($row['video']);
                                                                                                        }  ?>" id="videoembed" placeholder="Embed Video Code">
                                </div>
                                <p class="text-center  font-weight-bold">Or</p>
                                <div class="form-group">
                                    <label for="galvideo">Gallery Video</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="galvideo" class="custom-file-input" id="galvideo" accept="video/*">
                                            <label class="custom-file-label" for="galvideo"><?php if (strpos($row['video'], 'iframe')) {
                                                                                                echo "Choose Video";
                                                                                            } else {
                                                                                                echo $row['video'];
                                                                                            } ?></label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div> <!--/.col (right) -->
        </div><!-- /.container-fluid -->
    </section>
</div>

<script>
    //$( 'a[href*="dashboard"]').css("color", '#cf5787');
</script>

<?php include "footer.php"; ?>
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>

<script>
    $('.select2').select2();

    function removeReg(data, status) {
        Swal.fire({
                text: data,
                icon: status,
            })
            .then(function(value) {
                //console.log('returned value:', value);
                if (data == "Pharmacy Updated") {
                    window.location.href = "viewpharmacy";
                }

            });
    };


    $(function() {
        $.validator.addMethod("htmlEditorEmpty", function(value, element) {
            return this.optional(element) || value.summernote('isEmpty');
        }, "Please enter details");
        $.validator.addMethod("valueNotEqualsAbout", function() {
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

                midwifename: {
                    required: true,
                },
                'specialist[]': {
                    required: true,
                },
                contactNumber: {
                    required: true,
                    rangelength: [10, 12],
                },
                mapLocation: {
                    required: true,
                },
                address: {
                    required: true,
                },
                city: {
                    required: true,
                },
                email: {
                    required: true,
                },
                type: {
                    required: true,
                },
                subtype: {
                    required: true,
                },
                midwifeworking: {
                    required: true,
                },

                status: {
                    required: true,
                },
                about: {
                    required: true,
                },
                "galimages[]": {
                    required: true,
                    extension: "jpg|jpeg|png"
                },
                "galimage[]": {
                    required: true,
                    extension: "jpg|jpeg|png"
                },
            },
            messages: {

            },
            submitHandler: function(form) {
                var form_data = new FormData(form);
                $('.galleryimages').each(function() {
                    $(this).rules("add", {
                        required: true,
                        messages: {
                            required: "Image is required",
                        }
                    });
                });
                $.ajax({
                    type: form.method,
                    url: form.action,
                    mimeType: "multipart/form-data",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#submit").prop('value', 'Updating...');
                        $("#submit").prop('disabled', true); // disable button
                    },
                    success: function(data) {
                        // debugger
                        $("#submit").prop('disabled', false);
                        $("#submit").prop('value', 'Update');
                        if (data.trim() === 'Pharmacy Updated') {
                            console.log("data");
                            removeReg(data, 'success');
                        } else {
                            removeReg(data, 'error');
                        }
                    },
                    error: function(data) {
                        //console.log("error");
                        $("#submit").prop('disabled', false);
                        $("#submit").prop('value', 'Update');
                        console.log(data);
                        removeReg(data, 'error');
                    }
                });
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

<script>
    $('#reservationdatetime').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        minDate: new Date(),
        icons: {
            time: 'fa fa-clock'
        },
    });

    $('#summernote').summernote({
        width: "100%",
        height: "250"
    });

    $(document).on('change', '#pubtype', function() {
        if ($('#pubtype option:selected').text() == 'Scheduled') {
            $("#datetime").prop("disabled", false);
            $("#datetime").show();
        } else {
            $("#datetime").prop("disabled", true);
            $("#datetime").hide();
        }
    });

    $(document).on("change", ".custom-file-input", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $(document).on('change', "#customFilefeature, #customFilelogo, .customFilegallery", function() {
        var fileName1 = $(this).attr('id');
        var filetype = event.target.files[0];
        if (filetype) {
            $('#' + fileName1 + 'preview').children().remove();
            var source = URL.createObjectURL(filetype);
            $('#' + fileName1 + 'preview').append('<p class="img-center" style="color:green;margin-bottom:0">Image Preview</p><button class="close img-center" onclick="removepreview(' + fileName1 + ')" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button><img src="' + source + '" class="img-fluid img-center" style="position:relative; width:200px; max-height: 180px; border:1px solid gray; margin-bottom:5px"/>');
        }

    });

    function removepreview(fileName1) {
        var fileName2 = $(fileName1).attr('id');
        var filename = $('#' + fileName2).val("");
        $(fileName1).siblings(".custom-file-label").text("choose file");
        $('#' + fileName2 + 'preview').empty();
    }
</script>

<script>
    $(document).ready(function() {
        var max_input = 10;
        var x = 1;
        $('.add-image').click(function(e) {
            e.preventDefault();
            var htmlfield = '<div class="form-group">\
					<div class="input-group">\
                      <div class="custom-file">\
                        <input type="file" name="galleryimages[]" class="custom-file-input customFilegallery" id="galleryimages" multiple>\
                        <label class="custom-file-label" for="articleimages">Choose file</label>\
                      </div>\
					  </div>\
					  <div class="text-center" id="galleryimagespreview"></div>\
                    <a href="#" id="remove-lnk" style="float:right; margin-right:2rem; color:red">Remove</a></div>';
            if (x < max_input) { // validate the condition
                x++;
                $('#galleryimages').append(htmlfield);
            }
        });
        $('#galleryimages').on("click", "#remove-lnk", function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); // remove input field
            x--; // decrement the counter
        });
        $('#artfetch').on("click", ".remove-lnk1", function(e) {
            e.preventDefault();
            var fileid = $(this).parent('div').attr('id');
            $(this).parent('div').remove(); // remove input field
            x--; // decrement the counter
        });
    });
    $("#productcat").on('change', function() {
        var productcat = $('#productcat').select2().val();
        $('#products').children().remove();
        $.ajax({
            url: "ajax/products",
            data: {
                productcat: productcat
            },
            type: "POST",
            success: function(data) {
                var json = $.parseJSON(data);
                //$('#products').append('<option selected="" disabled="" value="null" class="hidden">--Products--</option>');
                for (var i = 0; i < json.length; i++) {
                    $('#products').append('<option value="' + json[i].productid + '">' + json[i].Productname + '</option>');
                    //console.log(json[i]);
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    if ($('#type option:selected').val() == "Government pharmacy") {
        $('.subtype').show();
    }
    $(document).on('change', '#type', function() {
        if ($('#type option:selected').val() == "Government pharmacy") {
            $('.subtype').show();
        } else {
            $('.subtype').hide();
        }
    });
</script>
<script>
    function clearTimeInputs(day) {
        var openInput = document.getElementById(day + 'opentime');
        var closeInput = document.getElementById(day + 'endtime');

        openInput.value = '';
        closeInput.value = '';
    }
</script>