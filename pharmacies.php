<?php
include "mp.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<style>
    .pharmacytype {
        border-left: 4px solid #68CF68;
        margin-bottom: 0;
    }

    .pharmacytype span {
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
            <div class="MuiPaper-root MuiPaper-elevation MuiPaper-rounded MuiPaper-elevation3 css-x8q3gx">
                <img src="https://s3.ap-southeast-1.amazonaws.com/dlg.dialog.lk/s3fs-public/2022-12/dialog-and-nonvoice.jpg" alt="Advertisement" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        <form action="" method="POST">
            <input class="form-control form-control-sm" type="search" name="searchpharmacy" id="searchpharmacy" placeholder="Search pharmacy" aria-label="Search">
            <!--button class="btn btn-success form-control p-2" type="submit" ><i class="bi bi-search"></i></button-->
            <div id="suggesstion-box" class="position-absolute" style="z-index:1000" ></div>
                
            <div class="d-flex justify-content-start">
                <label class="select">
                    <select name="city"  class="filter-box" id="city">
                        <option value="">Select City</option>
                        <?php
                            $cityQuery = mysqli_query($conn, "SELECT DISTINCT city FROM pharmacy");
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
         <div class="top-menu">
            
			<?php $pharmacy =mysqli_query($conn, "SELECT * FROM pharmacy INNER JOIN pharmacy_working_times wt ON wt.pharmacy_id = pharmacy.pharmacy_id WHERE priority > 0 ORDER BY priority LIMIT 5");
					$count = 0;
					$numrows = mysqli_num_rows($pharmacy);
                    date_default_timezone_set('Asia/Colombo');
                    $currentDay = strtolower(date('l')); 
                    $currentTime = date('H:i:s'); 
					while($row=mysqli_fetch_array($pharmacy)){
                        $openTime = $row[$currentDay . '_open'];
                        $closeTime = $row[$currentDay . '_close'];
                        $isOpen = ($currentTime >= $openTime && $currentTime <= $closeTime) ? '<span class="text-success text mr-1">Open</span>' : '<span class="text-danger text mr-1">Closed</span>';
                        
                        if (isset($row['main_id']) && !empty($row['main_id']) && $row['main_id'] != 0) {
                            $mainid = $row['main_id'];
                        
                            $name_query = "SELECT `name` FROM `hospital` WHERE `id` = '$mainid'";
                            $namequery = mysqli_query($conn, $name_query);
                        
                            if ($namequery) {
                                $row1 = mysqli_fetch_array($namequery);
                            }
                        }
                        if (!empty($row1['name']) && $row['main_id'] != 0) {
                            $type_name_head =  $row1['name'] . ' - ' . $row['name'];
                        } else {
                            $type_name_head =  $row['name'];;
                        };
					echo '<div class="row m-0 priority-list" style="border-bottom: 1px solid #f4f4f4 ;">
							<div class="col-md-3" style="margin:auto">
							<div>
								<img src="directory/pharmacy/'.$row['logo'].'" class="img-fluid" style="max-height:5rem">
							</div>
							</div>
							<div class="col-md-9 pl-0" style="margin:1rem 0">
							<div class="d-flex">
                            <p class="text"><p class="text-heading">&nbsp;'.$type_name_head.'</p>
                                <img src="assets/images/Paid.png" width="16" height="20" class="ml-auto mr-2" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">
                                <strong>' . $isOpen . '</strong>
                            </div>
							<div class="d-flex">
							<div class="ml-auto">';
							
							$ratingquery= mysqli_query($conn, "SELECT SUM(rating) AS total, COUNT(rating) as count from mp_comments WHERE mp_id= '$row[pharmacy_id]'");
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
                            
                                <form action="mpconnect/pharmacy/' . urlencode(str_replace(' ', '_', $row["name"])) . '" method="post" style="display:inline;">
                                <input type="hidden" name="pharmacy_id" value="' . $row["pharmacy_id"] . '">
                                <button type="submit" class="btn btn-success p-1" style="font-size:12px; height:28px">View&nbsp;Pharmacy</button>
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
						echo '<h1 style="text-align:center; color:red"> End of pharmacys </h1>';
					}
					?>						
			
         </div>
      </div>
   </div>
           <div class="col-md-3">
               <div class="right-cont-part">
                    <div class="MuiPaper-root MuiPaper-elevation MuiPaper-rounded MuiPaper-elevation3 css-vuzb25">
                        <img src="https://www.shutterstock.com/image-vector/megafon-bharti-airtel-limited-safaricom-600nw-2409713703.jpg" alt="Advertisement" style="width: 100%; object-fit: cover;">
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
            $('#btn_more').html("Loading...");
            $.ajax({
                url: "ajax/mpdatafetch",
                method: "POST",
                data: {
                    count: count,
                    type: "pharmacy"
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

        $('#searchpharmacy, #city').on('input change keyup', function() {
            var query = $('#searchpharmacy').val();
            var speciality = $('#speciality').val();
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
            $('#searchpharmacy').val('');
            $('#city').val('');

            $("#suggesstion-box").hide();
            $('#load_data').html(initialData);
            $('.priority-list').show();
        });

        function load_data(value,speciality, type, city) {
            $.ajax({
                url: "ajax/searchPharmacy",
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
                        result.data.forEach(function(pharmacy) {
                            var specialityArray = pharmacy.speciality?.split(" ///");
                            var speciality = specialityArray?.join(", ");
                            var rating = pharmacy.rating ? parseFloat(pharmacy.rating) : 0;
                            var encodedName = encodeURIComponent(pharmacy.name.replace(/\s+/g, '_'));
                            var pharmacyId = pharmacy.pharmacy_id;
                            var now = new Date().toLocaleString("en-US", {timeZone: "Asia/Colombo"});
                            var currentDate = new Date(now);
                            var currentDay = currentDate.toLocaleString("en-US", {weekday: "long"}).toLowerCase();
                            var currentTime = currentDate.toTimeString().split(" ")[0];

                            var openTime = pharmacy[currentDay + '_open'];
                            var closeTime = pharmacy[currentDay + '_close'];

                            var isOpen = (currentTime >= openTime && currentTime <= closeTime) ? '<span class="text-success text mr-1">Open</span>' : '<span class="text-danger text mr-1">Closed</span>';
                            
                            html += '<div class="row m-0" style="border-bottom: 1px solid #f4f4f4;">';
                            html += '<div class="col-md-3" style="margin:auto">';
                            html += '<a href="mpconnect/pharmacy/' + encodedName + '">';
                            html += '<img src="directory/pharmacy/' + pharmacy.logo + '" class="img-fluid" style="max-height:5rem"></a>';
                            html += '</div>';
                            html += '<div class="col-md-9 pl-0" style="margin:1rem 0">';
                            html += '<div class="d-flex">';
                            html += '<p class="text"><a href="mpconnect/pharmacy/' + encodedName + '" class="namehref">';
                           
                            if (pharmacy.priority > 0) {
								html += '<p class="text-heading">&nbsp;' + pharmacy.typeName + '</p></a>';
                                html += '<img src="assets/images/Paid.png" width="16" height="20" class="ml-auto mr-2" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">';
								html += '<strong>' + isOpen + '</strong>';
                            }
							else{
								html += '<p class="text-heading mr-auto">&nbsp;' + pharmacy.typeName + '</p></a>';
								html += '<strong>' + isOpen + '</strong><br>';
							}

                            html += '</div>';
                            html += '<div class="d-flex">';
                            if(speciality){ html+= '<p class="text">&nbsp;' + speciality + '</P>';}
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
                            html += '<p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;' + pharmacy.address +'</P>';                          
                            html += '<form action="mpconnect/pharmacy/'+ encodedName +'" method="post" style="display:inline;">';
                            html += '<input type="hidden" name="pharmacy_id" value="'+pharmacyId+'">';
                            html += '<button type="submit" class="btn btn-success p-1" style="font-size:12px; height:28px">View&nbsp;Pharmacy</button>';
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

    $('#searchpharmacy').on('search', function() {
        $('#suggesstion-box').hide()
    });
    $('#searchpharmacy').on('focus', function() {

    });
    $("#suggesstion-box li").mousedown(function() {
        jQuery('.title-list').click(function() {
            window.location.href = $(this).attr('href');
        });
    });

    $("#searchpharmacy").focus(function() {
        if ($('#searchpharmacy').val().length == 0) {
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