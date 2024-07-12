<?php
	include "mp.php";
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
	?>
	<style>
		.main-content-sec .article-sec .top-menu {
			background-color: transparent !important;
		}
	</style>
<div class="content">
	<section class="main-content-sec">
		<div class="container-fluid p-0">
			<div class="row m-0 desktopviewArticle">
				<div class="col-md-3">
					<div class="left-menu-part" style="background:transparent;">
						<div class="unscroll" style="background-color:#fff; margin:10px 0; padding:10px 0">
							<?php include "sidebar.php"; ?>
							<div class="client-sec"><a class="client-btn">Sponsors</a></div>
						</div>
						<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- home -->
						<ins class="adsbygoogle"
							style="display:block"
							data-ad-client="ca-pub-6640694817095655"
							data-ad-slot="5367742441"
							data-ad-format="auto"
							data-full-width-responsive="true"></ins>
						<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				</div>
				<div class="col-md-6">
					<div class="article-sec">
						<div class="MuiPaper-root MuiPaper-elevation MuiPaper-rounded MuiPaper-elevation3 css-x8q3gx l-border-radius">
							<img class="l-border-radius" src="https://s3.ap-southeast-1.amazonaws.com/dlg.dialog.lk/s3fs-public/2022-12/dialog-and-nonvoice.jpg" alt="Advertisement" style="width: 100%; height: 100%; object-fit: cover;">
						</div>
						<form action="" method="POST">
                            <input class="form-control form-control-sm" type="search" name="searchHospital" id="searchHospital" placeholder="Search Hospital" aria-label="Search">
                            <!--button class="btn btn-success form-control p-2" type="submit" ><i class="bi bi-search"></i></button-->
                            <div id="suggesstion-box" class="position-absolute" style="z-index:1000" ></div>
								
							<div class="d-flex justify-content-start">
                                <label class="select">
                                    <select name="speciality" class="filter-box"  id="speciality">
                                        <option value="">Select Speciality</option>
                                        <?php
                                            $specialityQuery = mysqli_query($conn, "SELECT DISTINCT speciality FROM hospital");
                                            while ($specialityRow = mysqli_fetch_array($specialityQuery)) {
                                                $specialityArray = explode(" ///", $specialityRow['speciality']);
                                                foreach ($specialityArray as $spec) {
                                                    echo '<option value="' . $spec . '">' . $spec . '</option>';
                                                }
                                            }
                                            ?>
                                    </select>
                                </label>
                                 <label class="select">
                                    <select name="type"  class="filter-box" id="type">
                                        <option value="">Select type</option>
                                        <?php
                                            $typeQuery = mysqli_query($conn, "SELECT DISTINCT type FROM hospital");
                                            while ($typeRow = mysqli_fetch_array($typeQuery)) {
                                                $typeArray = explode(" ///", $typeRow['type']);
                                                foreach ($typeArray as $type) {
                                                    echo '<option value="' . $type . '">' . $type . '</option>';
                                                }
                                            }
                                            ?>
                                    </select>
                                 </label>
                                 <label class="select">
                                    <select name="city"  class="filter-box" id="city">
                                        <option value="">Select City</option>
                                        <?php
                                            $cityQuery = mysqli_query($conn, "SELECT DISTINCT city FROM hospital");
                                            while ($cityRow = mysqli_fetch_array($cityQuery)) {
                                                $cityArray = explode(" ///", $cityRow['city']);
                                                foreach ($cityArray as $city) {
                                                    echo '<option value="' . $city . '">' . $city . '</option>';
                                                }
                                            }
                                            ?>
                                    </select>
                                 </label>
								<a class="btn btn-sm filter-btn" type="button" id="clearFilters">Clear Filters</a>
							</div>
						</form>
						<div class="d-flex justify-content-end">
							<div class="position-relative">
								<div id="suggesstion-box" class="position-absolute" style="z-index:1000" ></div>
							</div>
						</div>
						<div class="top-menu">
							<?php $hospital =mysqli_query($conn, "SELECT * FROM hospital INNER JOIN hospital_working_times hwt ON hwt.hospital_id = hospital.hospital_id WHERE priority > 0 ORDER BY priority LIMIT 5");
								$count = 0;
								$numrows = mysqli_num_rows($hospital);
                                date_default_timezone_set('Asia/Colombo');
                                $currentDay = strtolower(date('l')); 
                                $currentTime = date('H:i:s'); 
                                                           
								while($row=mysqli_fetch_array($hospital)){
									$specialityarray = explode(" ///", $row['speciality']);
									$speciality = "";
									for($i=0; $i< count($specialityarray); $i++){
										if($i == count($specialityarray)-1){
											
											$speciality .= $specialityarray[$i];
										}
										else{
											$speciality .= $specialityarray[$i].", ";
										}
									}
                                    $openTime = $row[$currentDay . '_open'];
                                    $closeTime = $row[$currentDay . '_close'];
                                    $isOpen = ($currentTime >= $openTime && $currentTime <= $closeTime) ? '<span class="text-success text mt-2 mr-1">Open</span>' : '<span class="text-danger text mt-2 mr-1">Closed</span>';
									
			
								echo '<div class="row m-0 priority-list sort-item">
										<div class="col-md-3" style="margin:auto">
										<div>
											<img src="directory/hospital/'.$row['logo'].'" class="img-fluid" style="max-height:5rem">
										</div>
										</div>
										<div class="col-md-9 pl-0" style="margin:1rem 0">
										<div class="d-flex">
											<p class="text">
												<p class="text-heading">&nbsp;'.$row['name'].'</p>
												<img src="assets/images/Paid.png" width="16" height="20" class="ml-auto mr-3" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">
												<strong>' . $isOpen . '</strong>
										</div>
										<div class="d-flex">
										<p class="text">&nbsp;'.$speciality.'</P>
										<div class="ml-auto">';
										
										$ratingquery= mysqli_query($conn, "SELECT SUM(rating) AS total, COUNT(rating) as count from mp_comments WHERE mp_id= '$row[hospital_id]'");
										$ratingrow = mysqli_fetch_assoc($ratingquery);
										if($ratingrow['count'] != 0){
											$rating= $ratingrow['total']/$ratingrow['count'];
										}
										else{
											$rating=0;
										}
										for($i=0; $i<5; $i++){
											if($rating>=1){
											echo '<i class="bi bi-star-fill"></i>&nbsp;';
											}
											elseif($rating>0 and $rating<1){
											echo '<i class="bi bi-star-half"></i>&nbsp;';
											}
											else{
											echo '<i class="bi bi-star"></i>&nbsp;';
											}
											$rating=$rating-1;									
										}
										echo '</div>
										</div>
										<div class="d-flex justify-content-between">
                                            <p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["address"].'</p>                           
                                            
                                            <form action="mpconnect/hospital/' . urlencode(str_replace(' ', '', $row["name"])) . '" method="post" style="display:inline;">
                                            <input type="hidden" name="hospital_id" value="' . $row["hospital_id"] . '">
                                            <button type="submit" class="btn btn-success p-1" style="font-size:12px; height:28px">View&nbsp;Hospital</button>
                                            </form>
                                            </div>
                                        </div>   
									</div>';
								}
								if($numrows >0){
									echo '<div id="load_data"></div>
										<div id="remove_row" class="p-4" style="background-color:f4f4f4">  
										<button type="button" name="btn_more" data-vid="'.$count.'" id="btn_more" class="btn btn-success form-control">Load More</button>  
									</div>';
								}
								else{
									echo '<h1 style="text-align:center; color:red"> End of Hospitals </h1>';
								}
								?>						
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="right-cont-part">
						<div class="card l-border-radius">
							<img class="card-img l-border-radius" src="https://www.shutterstock.com/image-vector/megafon-bharti-airtel-limited-safaricom-600nw-2409713703.jpg" alt="Advertisement" style="width: 100%; object-fit: cover;">
						</div>
						<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- Square -->
						<ins class="adsbygoogle"
							style="display:block"
							data-ad-client="ca-pub-6640694817095655"
							data-ad-slot="5367742441"
							data-ad-format="auto"
							data-full-width-responsive="true"></ins>
						<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include "footer.php"; ?>
<script>
	$(".descript").children().removeAttr('style');
	$(".descript").css('color', 'gray');
	$(document).ready(function() {
	    $('[data-toggle="tooltip"]').tooltip();
	});
	$('#share').tooltip({
	    selector: "a[rel=tooltip]"
	})
	$('li[class="nav-item"] a[href="mpdirectory"]').addClass('active');
</script>
<script>
	$('#cathome').remove();
</script>
<script>
	var initialData;
	$(document).ready(function() {
	    $(document).on('click', '#btn_more', function() {
	        var count = $(this).data("vid");
            console.log(count);
	        $('#btn_more').html("Loading...");
	        $.ajax({
	            url: "ajax/mphospitaldatafetch",
	            method: "POST",
	            data: {
	                count: count,
	                type: "Hospital"
	            },
	            dataType: "text",
	            success: function(data) {
	
	                if (data != '') {
	                    $('#remove_row').remove();
	                    $('#load_data').append(data);
	                    initialData = data;
	                } else {
	                    $('#btn_more').attr("class", "btn btn-secondary form-control");
	                    $('#btn_more').attr("disabled", "true");
	                    $('#btn_more').html("No More Data");
	                }
	            }
	        });
	    });
	
	    $(document).on('search', 'input[type="search"]', function(e) {
	        if ($(this).val().trim().length === 0) {
	            $('#load_data').append(initialData);
	        }
	    });
	
	    $('#searchHospital, #speciality, #type, #city').on('input change keyup', function() {
	        var query = $('#searchHospital').val();
	        var speciality = $('#speciality').val();
	        var type = $('#type').val();
	        var city = $('#city').val();
	
	        if (query.length >= 1 || speciality || type || city) {
	            load_data(query, speciality, type, city);
	            $('.priority-list').hide();
	        } else {
	            $("#suggesstion-box").hide();
	            $('#load_data').html(initialData);
	            $('.priority-list').show();
	        }
	    });
	
	    $('#clearFilters').click(function() {
	        $('#searchHospital').val('');
	        $('#speciality').val('');
	        $('#type').val('');
	        $('#city').val('');
	
	        $("#suggesstion-box").hide();
	        $('#load_data').html(initialData);
	        $('.priority-list').show();
	    });
	
	    // function load_data(value, speciality, type, city) {
	    //     $.ajax({
	    //         url: "ajax/searchhospital",
	    //         method: "POST",
	    //         data: {
	    //             search: "search",
	    //             value: value,
	    //             speciality: speciality,
	    //             type: type,
	    //             city: city
	    //         },
	    //         success: function(data) {
	    //             var result = JSON.parse(data);
	    //             if (value.length >= 1) {
	    //                 $("#suggesstion-box").show();
	    //                 $("#suggesstion-box").html(result.html);
	    //             } else {
	    //                 $("#suggesstion-box").hide();
	    //             }
        //             console.log(result.data);
	    //             if (result.data.length > 0) {
	    //                 var html = '';
	    //                 result.data.forEach(function(hospital) {
	    //                     var specialityArray = hospital.speciality.split(" ///");
	    //                     var speciality = specialityArray.join(", ");
	    //                     var rating = hospital.rating ? parseFloat(hospital.rating) : 0;
        //                     var encodedName = encodeURIComponent(hospital.name.replace(/\s+/g, '_'));
        //                     var hospitalId = hospital.hospital_id;
	                        
	    //                     html += '<div class="row m-0" style="border-bottom: 8px solid #f4f4f4;">';
	    //                     html += '<div class="col-md-3" style="margin:auto">';
	    //                     html += '<a href="mpconnect/hospital/' + encodedName + '">';  
	    //                     html += '<img src="directory/hospital/' + hospital.logo + '" class="img-fluid" style="max-height:5rem"></a>';
	    //                     html += '</div>';
	    //                     html += '<div class="col-md-9 pl-0" style="margin:1rem 0">';
	    //                     html += '<div class="d-flex">';
	    //                     html += '<p class="text"><a href="mpconnect/hospital/' + encodedName + '" class="namehref">';
	    //                     html += '<p class="text-heading">&nbsp;' + hospital.name + '</p></a>';
	    //                     if (hospital.priority > 0) {
	    //                         html += '<img src="assets/images/Paid.png" width="16" height="20" class="ml-auto" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">';
	    //                     }
	    //                     html += '</div>';
	    //                     html += '<div class="d-flex">';
	    //                     html += '<p class="text">&nbsp;' + speciality + '</P>';
	    //                     html += '<div class="ml-auto">';
	                        
	    //                     for (var i = 0; i < 5; i++) {
	    //                         if (rating >= 1) {
	    //                             html += '<i class="bi bi-star-fill"></i>&nbsp;';
	    //                         } else if (rating > 0) {
	    //                             html += '<i class="bi bi-star-half"></i>&nbsp;';
	    //                         } else {
	    //                             html += '<i class="bi bi-star"></i>&nbsp;';
	    //                         }
	    //                         rating--;
	    //                     }
	                        
	    //                     html += '</div></div>';
	    //                     html += '<div class="d-flex justify-content-between">';
	    //                     html += '<p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;' + hospital.address + '</P>';                          
        //                     html += '<form action="mpconnect/hospital/'+ encodedName +'" method="post" style="display:inline;">';
        //                     html += '<input type="hidden" name="hospital_id" value="'+hospitalId+'">';
        //                     html += '<button type="submit" class="btn btn-success p-1" style="font-size:12px; height:28px">View&nbsp;Hospital</button>';
        //                     html += '</form>';
	    //                     html += '</div></div></div>';
	    //                 });
	    //                 $("#load_data").html(html);
	    //             } else {
	    //                 $("#load_data").html('<p>No results found</p>');
	    //             }
	    //         }
	    //     });
	    // }
        function load_data(value, speciality, type, city) {
            $.ajax({
                url: "ajax/searchhospital",
                method: "POST",
                data: {
                    search: "search",
                    value: value,
                    speciality: speciality,
                    type: type,
                    city: city
                },
                success: function(data) {
                    var result = JSON.parse(data);
                    if (value.length >= 1) {
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(result.html);
                    } else {
                        $("#suggesstion-box").hide();
                    }
                    if (result.data.length > 0) {
                        var html = '';
                        result.data.forEach(function(hospital) {
                        console.log(hospital);
                            var specialityArray = hospital.speciality.split(" ///");
                            var speciality = specialityArray.join(", ");
                            var rating = hospital.rating ? parseFloat(hospital.rating) : 0;
                            var encodedName = encodeURIComponent(hospital.name.replace(/\s+/g, ''));
                            var hospitalId = hospital.hospital_id;

                            var now = new Date().toLocaleString("en-US", {timeZone: "Asia/Colombo"});
                            var currentDate = new Date(now);
                            var currentDay = currentDate.toLocaleString("en-US", {weekday: "long"}).toLowerCase();
                            var currentTime = currentDate.toTimeString().split(" ")[0];

                            var openTime = hospital[currentDay + '_open'];
                            var closeTime = hospital[currentDay + '_close'];

                            var isOpen = (currentTime >= openTime && currentTime <= closeTime) ? '<span class="text-success text mt-2 mr-1">Open</span>' : '<span class="text-danger text mt-2 mr-1">Closed</span>';

                            html += '<div class="row m-0" style="border-bottom: 8px solid #f4f4f4;">';
                            html += '<div class="col-md-3" style="margin:auto">';
                            html += '<img src="directory/hospital/' + hospital.logo + '" class="img-fluid" style="max-height:5rem">';
                            html += '</div>';
                            html += '<div class="col-md-9 pl-0" style="margin:1rem 0">';
                            html += '<div class="d-flex">';
                            html += '<p class="text">';
                            if (hospital.priority > 0) {
								html += '<p class="text-heading">&nbsp;yy' + hospital.name + '</p>';
                                html += '<img src="assets/images/Paid.png" width="16" height="20" class="ml-auto mr-2" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">';
								html += '<strong>' + isOpen + '</strong>';
                            }
							else{
								html += '<p class="text-heading mr-auto">&nbsp;' + hospital.name + '</p>';
								html += '<strong>' + isOpen + '</strong><br>';
							}
                            html += '</div>';
                            html += '<div class="d-flex">';
                            html += '<p class="text">&nbsp;' + speciality + '</P>';
                            html += '<div class="ml-auto">';
                            
                            for (var i = 0; i < 5; i++) {
                                if (rating >= 1) {
                                    html += '<i class="bi bi-star-fill"></i>&nbsp;';
                                } else if (rating > 0) {
                                    html += '<i class="bi bi-star-half"></i>&nbsp;';
                                } else {
                                    html += '<i class="bi bi-star"></i>&nbsp;';
                                }
                                rating--;
                            }
                            
                            html += '</div></div>';
                            html += '<div class="d-flex justify-content-between">';
                            html += '<p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;' + hospital.address + '</P>';                          
                            html += '<form action="mpconnect/hospital/'+ encodedName +'" method="post" style="display:inline;">';
                            html += '<input type="hidden" name="hospital_id" value="'+hospitalId+'">';
                            html += '<button type="submit" class="btn btn-success p-1" style="font-size:12px; height:28px">View&nbsp;Hospital</button>';
                            html += '</form>';
                            html += '</div></div></div>';
                        });
                        $("#load_data").html(html);
                    } else {
                        $("#load_data").html('<p>No results found</p>');
                    }
                }
            });
        }

	});
	var height = $("#h2").height() + 20;
	$(".left-menu-part, .right-cont-part").css({
	    'position': 'sticky',
	    'top': height
	});
	$(window).on('resize', function() {
	    var height = $("#h2").height() + 20;
	    $(".left-menu-part, .right-cont-part").css({
	        'top': height,
	        'position': 'sticky'
	    });
	});
	var count = 0;
	$(document).ajaxComplete(function() {
	    if (count == 0) {
	        $('#btn_more').click();
	        count++;
	    }
	});
	
	$('#searchHospital').on('search', function() {
	    $('#suggesstion-box').hide()
	});
	$('#searchHospital').on('focus', function() {
	
	});
	$("#suggesstion-box li").mousedown(function() {
	    jQuery('.title-list').click(function() {
	        window.location.href = $(this).attr('href');
	    });
	});
	
	$("#searchHospital").focus(function() {
	    if ($('#searchHospital').val().length == 0) {
	        $('#suggesstion-box').hide()
	    }
	});
	$(document).mouseup(function(e) {
		var container = $("#suggesstion-box");
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			container.hide();
		}
	});
</script>
</body>