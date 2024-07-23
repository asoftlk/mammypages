<?php
include "mp.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<style>
    .doctortype {
        border-left: 4px solid #68CF68;
        margin-bottom: 0;
    }

    .doctortype span {
        background-color: #000;
        color: #fff;
        padding: 2px 1px;
        margin-left: 2px;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: 100;
    }

    .namehref {
        text-decoration: none;
        color: #212529;
    }

    .namehref:hover {
        text-decoration: none;
        color: #212529;
    }

    #title-list li {
        padding: 10px;
        background: #fff;
        border-bottom: #bbb9b9 1px solid;
    }

    #suggesstion-box {
        display: none;
        z-index: 4;
        width: 100%;
        max-height: 250px;
        overflow-y: scroll;
        border: 2px solid #28a745;
        border-radius: 3px;
    }

    #suggesstion-box::-webkit-scrollbar {
        width: 10px;
    }

    #suggesstion-box::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    #suggesstion-box::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: #c1c1c1;
    }
    .main-content-sec .article-sec .top-menu {
        background-color: transparent !important;
    }
    .priority-list .priority-img {
        left: 6.1rem;
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
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6640694817095655" crossorigin="anonymous"></script>
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
   <div class="col-md-6">
      <div class="article-sec">
        <!-- rectangle -->
        <ins class="adsbygoogle l-ads-rectangle"
            style="display:block"
            data-ad-client="ca-pub-6640694817095655"
            data-ad-slot="4022982551"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <form action="" method="POST">
            <input class="form-control form-control-sm" type="search" name="searchdoctor" id="searchdoctor" placeholder="Search doctor" aria-label="Search">
            <!--button class="btn btn-success form-control p-2" type="submit" ><i class="bi bi-search"></i></button-->
            <div id="suggesstion-box" class="position-absolute" style="z-index:1000" ></div>
                
            <div class="d-flex justify-content-start">
                <label class="select">
                    <select name="speciality"class="filter-box form-select form-select-sm"  id="speciality">
                        <option value="">Select Speciality</option>
                        <?php
                            $specialityQuery = mysqli_query($conn, "SELECT DISTINCT speciality FROM doctor");
                            while ($specialityRow = mysqli_fetch_array($specialityQuery)) {
                                $specialityArray = explode(" ///", $specialityRow['speciality']);
                                foreach ($specialityArray as $spec) {
                                    echo '<option value="' . $spec . '">' . $spec . '</option>';
                                }
                            }
                            ?>
                    </select>
                </label>       
                <a class="btn btn-sm filter-btn" type="button" id="clearFilters">Clear Filters</a>
            </div>
        </form>
         <div class="top-menu">     
			<?php $doctor =mysqli_query($conn, "SELECT * FROM doctor INNER JOIN doctor_working_times hwt ON hwt.doctor_id = doctor.doctor_id WHERE priority > 0 ORDER BY priority LIMIT 5");
					$count = 0;
					$numrows = mysqli_num_rows($doctor);
					while($row=mysqli_fetch_array($doctor)){
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
                        date_default_timezone_set('Asia/Colombo');
                        $currentDay = strtolower(date('l')); 
                        $currentTime = date('H:i:s'); 
                        $openTime = $row[$currentDay . '_open'];
                        $closeTime = $row[$currentDay . '_close'];
                        $isOpen = ($currentTime >= $openTime && $currentTime <= $closeTime) ? '<span class="text-success text mr-1 l-open" style="float:right">Available</span>' : '<span class="text-danger text mr-1 l-open" style="float:right">Not Available</span>';

					echo '<div class="row m-0 priority-list sort-item">
							<div class="col-md-2" style="margin:auto">
							<div>
								<img src="directory/doctor/'.$row['logo'].'" class="img-fluid sort-item-img" style="max-height:5rem">
							</div>
							</div>
							<div class="col-md-10 pl-0" style="margin:1rem 0">
							<div class="d-flex">
                            <p class="text"><p class="text-heading text-capitalize">&nbsp;'.$row["name"].'</p>
                                <img src="assets/images/Paid.png" class="ml-auto mr-3 priority-img" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">
                                <span class="ml-auto"><strong>' . $isOpen . '</strong></span>
                            </div>
							<div class="d-flex">
							<p class="text">&nbsp;'.$speciality.'</P>
							<div class="ml-auto star-bar">';
							
							$ratingquery= mysqli_query($conn, "SELECT SUM(rating) AS total, COUNT(rating) as count from mp_comments WHERE mp_id= '$row[doctor_id]'");
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
                            <p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["address"].'</P>                           
                                <form action="mpconnect/doctor/' . urlencode(str_replace(' ', '_', $row["name"])) . '" method="post" style="display:inline;">
                                    <input type="hidden" name="doctor_id" value="' . $row["doctor_id"] . '">
                                    <button type="submit" class="btn btn-success p-1" style="font-size:12px; height:28px">View&nbsp;Doctor</button>
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
						echo '<h1 style="text-align:center; color:red"> End of doctors </h1>';
					}
					?>						
			
         </div>
      </div>
   </div>
           <div class="col-md-3">
               <div class="right-cont-part">
                    <!-- Square -->
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-client="ca-pub-6640694817095655"
                        data-ad-slot="8142244861"
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
            $('#btn_more').html("Loading...");
            $.ajax({
                url: "ajax/mpdatafetch",
                method: "POST",
                data: {
                    count: count,
                    type: "doctor"
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
                        initialData= '';
                    }
                }
            });
        });

        $(document).on('search', 'input[type="search"]', function(e) {
            if ($(this).val().trim().length === 0) {
                // $('#load_data').append(initialData);
            }
        });

        $('#searchdoctor, #speciality, #type, #city').on('input change keyup', function() {
            var query = $('#searchdoctor').val();
            var speciality = $('#speciality').val();

            if (query.length >= 1 || speciality) {
                load_data(query, speciality, null, null);
                $('.priority-list').hide();
            } else {
                $("#suggesstion-box").hide();
                $('#load_data').html(initialData);
                $('.priority-list').show();
            }
        });

        $('#clearFilters').click(function() {
            $('#searchdoctor').val('');
            $('#speciality').val('');
            $('#type').val('');
            $('#city').val('');

            $("#suggesstion-box").hide();
            $('#load_data').html(initialData);
            $('.priority-list').show();
        });

        function load_data(value,speciality, type, city) {
            $.ajax({
                url: "ajax/searchDoctor",
                method: "POST",
                data: {
                    search: "search",
                    value: value,
                    speciality: speciality,
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
                        result.data.forEach(function(doctor) {
                            var specialityArray = doctor.speciality.split(" ///");
                            var speciality = specialityArray.join(", ");
                            var rating = doctor.rating ? parseFloat(doctor.rating) : 0;
                            var encodedName = encodeURIComponent(doctor.name.replace(/\s+/g, '_'));
                            var doctorId = doctor.doctor_id;
                            var now = new Date().toLocaleString("en-US", {timeZone: "Asia/Colombo"});
                            var currentDate = new Date(now);
                            var currentDay = currentDate.toLocaleString("en-US", {weekday: "long"}).toLowerCase();
                            var currentTime = currentDate.toTimeString().split(" ")[0];

                            var openTime = doctor[currentDay + '_open'];
                            var closeTime = doctor[currentDay + '_close'];

                            var isOpen = (currentTime >= openTime && currentTime <= closeTime) ? '<span class="text-success text mr-1 l-open">Available</span>' : '<span class="text-danger text mr-1 l-close">Not Available</span>';
                            
                            html += '<div class="row m-0 sort-item">';
                            html += '<div class="col-md-2" style="margin:auto">';
                            html += '<img src="directory/doctor/' + doctor.logo + '" class="img-fluid" style="max-height:5rem">';
                            html += '</div>';
                            html += '<div class="col-md-10 pl-0" style="margin:1rem 0">';
                            html += '<div class="d-flex">';
                            html += '<p class="text">';
                            html += '<p class="text-heading text-capitalize">&nbsp;' + doctor.name + '</p>';
                            if (doctor.priority > 0) {
                                html += '<img src="assets/images/Paid.png" class="ml-auto priority-img " data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">';
                                html += '<span class="ml-auto"><strong>' + isOpen + '</strong></span>';
                                
                            } else {
                                html += '<span class="ml-auto"><strong>' + isOpen + '</strong></span><br>';
                            }
                            html += '</div>';
                            html += '<div class="d-flex">';
                            html += '<p class="text">&nbsp;' + speciality + '</P>';
                            html += '<div class="ml-auto star-bar">';
                            
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
                            html += '<p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;' + doctor.address + '</P>';                          
                            html += '<form class="desktopview" action="mpconnect/doctor/'+ encodedName +'" method="post" style="display:inline;">';
                            html += '<input type="hidden" name="doctor_id" value="'+doctorId+'">';
                            html += '<button type="submit" class="btn btn-success p-1" style="font-size:12px; height:28px">View&nbsp;Doctor</button>';
                            html += '</form>'; 
                            html += '</div>';
                            html += '<form class="mobileview" action="mpconnect/doctor/'+ encodedName +'" method="post" style="display:inline;">';
                            html += '<input type="hidden" name="doctor_id" value="'+doctorId+'">';
                            html += '<button type="submit" class="btn btn-success p-1" style="font-size:12px; height:28px">View&nbsp;Doctor</button>';
                            html += '</form>'; 
                            html += '</div></div>';
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

    $('#searchdoctor').on('search', function() {
        $('#suggesstion-box').hide()
    });
    $('#searchdoctor').on('focus', function() {

    });
    $("#suggesstion-box li").mousedown(function() {
        jQuery('.title-list').click(function() {
            window.location.href = $(this).attr('href');
        });
    });

    $("#searchdoctor").focus(function() {
        if ($('#searchdoctor').val().length == 0) {
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