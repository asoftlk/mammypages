<?php
include "mp.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<style>
    .saloontype {
        border-left: 4px solid #68CF68;
        margin-bottom: 0;
    }

    .saloontype span {
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
            <input class="form-control form-control-sm" type="search" name="searchsaloon" id="searchsaloon" placeholder="Search saloon" aria-label="Search">
            <!--button class="btn btn-success form-control p-2" type="submit" ><i class="bi bi-search"></i></button-->
            <div id="suggesstion-box" class="position-absolute" style="z-index:1000" ></div>
                
            <div class="d-flex justify-content-start">
                <label class="select">
                    <select name="speciality" class="filter-box"  id="speciality">
                        <option value="">Select Speciality</option>
                        <?php
                            $specialityQuery = mysqli_query($conn, "SELECT DISTINCT speciality FROM saloon");
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
                    <select name="type" class="filter-box" id="type">
                        <option value="">Select type</option>
                        <?php
                            $typeQuery = mysqli_query($conn, "SELECT DISTINCT type FROM saloon");
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
                            $cityQuery = mysqli_query($conn, "SELECT DISTINCT city FROM saloon");
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
            
			<?php $saloon =mysqli_query($conn, "SELECT * FROM saloon WHERE priority > 0 ORDER BY priority LIMIT 5");
					$count = 0;
					$numrows = mysqli_num_rows($saloon);
					while($row=mysqli_fetch_array($saloon)){
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
					echo '<div class="row m-0 priority-list" style="border-bottom: 1px solid #f4f4f4 ;">
							<div class="col-md-3" style="margin:auto">
							<div>
								<a href="mpconnect/saloon/' .urlencode(str_replace(' ', '_', $row["name"])). '"><img src="directory/saloon/'.$row['logo'].'" class="img-fluid" style="max-height:5rem"></a>
							</div>
							</div>
							<div class="col-md-9 pl-0" style="margin:1rem 0">
							<div class="d-flex">
                            <p class="text"><a href="mpconnect/saloon/' .urlencode(str_replace(' ', '_', $row["name"])). '" class="namehref"><p class="text-heading">&nbsp;'.$row["name"].'</p></a>
                                <img src="assets/images/Paid.png" width="16" height="20" class="ml-auto" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">
                            </div>
							<div class="d-flex">
							<p class="text">&nbsp;'.$speciality.'</P>
							<div class="ml-auto">';
							
							$ratingquery= mysqli_query($conn, "SELECT SUM(rating) AS total, COUNT(rating) as count from mp_comments WHERE mp_id= '$row[saloon_id]'");
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
							<div class="d-flex">
                            <p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["address"].'</P>                           
                            
                                <a href="mpconnect/saloon/' .urlencode(str_replace(' ', '_', $row["name"])). '" type="button" class="btn btn-success p-1 ml-auto" style="font-size:12px; height:28px">View&nbsp;saloon</a>
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
						echo '<h1 style="text-align:center; color:red"> End of saloons </h1>';
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
                    type: "saloon"
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
                console.log("ff");
                $('#load_data').append(initialData);
            }
        });

        $('#searchsaloon, #speciality, #type, #city').on('input change keyup', function() {
            var query = $('#searchsaloon').val();
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
            $('#searchsaloon').val('');
            $('#speciality').val('');
            $('#type').val('');
            $('#city').val('');

            $("#suggesstion-box").hide();
            $('#load_data').html(initialData);
            $('.priority-list').show();
        });

        function load_data(value,speciality, type, city) {
            $.ajax({
                url: "ajax/searchSaloon",
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
                        result.data.forEach(function(saloon) {
                            var specialityArray = saloon.speciality.split(" ///");
                            var speciality = specialityArray.join(", ");
                            var rating = saloon.rating ? parseFloat(saloon.rating) : 0;
                            var encodedName = encodeURIComponent(saloon.name.replace(/\s+/g, '_'));
                            
                            html += '<div class="row m-0" style="border-bottom: 1px solid #f4f4f4;">';
                            html += '<div class="col-md-3" style="margin:auto">';
                            html += '<a href="mpconnect/saloon/' + encodedName + '">';
                            html += '<img src="directory/saloon/' + saloon.logo + '" class="img-fluid" style="max-height:5rem"></a>';
                            html += '</div>';
                            html += '<div class="col-md-9 pl-0" style="margin:1rem 0">';
                            html += '<div class="d-flex">';
                            html += '<p class="text"><a href="mpconnect/saloon/' + encodedName + '" class="namehref">';
                            html += '<p class="text-heading">&nbsp;' + saloon.name + '</p></a>';
                            if (saloon.priority > 0) {
                                html += '<img src="assets/images/Paid.png" width="16" height="20" class="ml-auto" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">';
                                
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
                            html += '<div class="d-flex">';
                            html += '<p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;' + saloon.address + '</P>';                          
                            html += '<a href="mpconnect/saloon/' + encodedName + '" type="button" class="btn btn-success p-1 ml-auto" style="font-size:12px; height:28px">View&nbsp;saloon</a>';
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

    $('#searchsaloon').on('search', function() {
        $('#suggesstion-box').hide()
    });
    $('#searchsaloon').on('focus', function() {

    });
    $("#suggesstion-box li").mousedown(function() {
        jQuery('.title-list').click(function() {
            window.location.href = $(this).attr('href');
        });
    });

    $("#searchsaloon").focus(function() {
        if ($('#searchsaloon').val().length == 0) {
            $('#suggesstion-box').hide()
        }
    });

</script>
</body>