<?php
include "mp.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<style>
    .studiotype {
        border-left: 4px solid #68CF68;
        margin-bottom: 0;
    }

    .studiotype span {
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
            <input class="form-control form-control-sm" type="search" name="searchstudio" id="searchstudio" placeholder="Search studio" aria-label="Search">
            <!--button class="btn btn-success form-control p-2" type="submit" ><i class="bi bi-search"></i></button-->
            <div id="suggesstion-box" class="position-absolute" style="z-index:1000" ></div>
                
            <div class="d-flex justify-content-start">
                <!-- <label class="select">
                    <select name="speciality" class="filter-box form-select form-select-sm" id="speciality">
                        <option value="">Select Speciality</option>
                        <?php /*
                            $specialityQuery = mysqli_query($conn, "SELECT DISTINCT speciality FROM studio");
                            while ($specialityRow = mysqli_fetch_array($specialityQuery)) {
                                $specialityArray = explode(" ///", $specialityRow['speciality']);
                                foreach ($specialityArray as $spec) {
                                    echo '<option value="' . $spec . '">' . $spec . '</option>';
                                }
                            }
                            */ ?>
                    </select>
                </label> -->
                <!-- <label class="select">
                    <select name="type" class="filter-box form-select form-select-sm" id="type">
                        <option value="">Select type</option>
                        <?php
                            // $typeQuery = mysqli_query($conn, "SELECT DISTINCT type FROM studio");
                            // while ($typeRow = mysqli_fetch_array($typeQuery)) {
                            //     $typeArray = explode(" ///", $typeRow['type']);
                            //     foreach ($typeArray as $type) {
                            //         echo '<option value="' . $type . '">' . $type . '</option>';
                            //     }
                            // }
                            ?>
                    </select>
                </label> -->
                <label class="select">
                    <select name="city"  class="filter-box form-select form-select-sm" id="city">
                        <option value="">Select City</option>
                        <?php
                            $cityQuery = mysqli_query($conn, "SELECT DISTINCT city FROM studio");
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
			<?php $studio =mysqli_query($conn, "SELECT * FROM studio INNER JOIN studio_working_times wt ON wt.studio_id = studio.studio_id WHERE priority > 0 ORDER BY priority LIMIT 5");
					$count = 0;
					$numrows = mysqli_num_rows($studio);
                    date_default_timezone_set('Asia/Colombo');
                    $currentDay = strtolower(date('l')); 
                    $currentTime = date('H:i:s'); 
					while($row=mysqli_fetch_array($studio)){
						// $specialityarray = explode(" ///", $row['speciality']);
						// $speciality = "";
						// for($i=0; $i< count($specialityarray); $i++){
						// 	if($i == count($specialityarray)-1){
								
						// 		$speciality .= $specialityarray[$i];
						// 	}
						// 	else{
						// 		$speciality .= $specialityarray[$i].", ";
						// 	}
						// }
                        $openTime = $row[$currentDay . '_open'];
                        $closeTime = $row[$currentDay . '_close'];
                        // $isOpen = ($currentTime >= $openTime && $currentTime <= $closeTime) ? '<span class="text-success text mr-1 l-open">Open</span>' : '<span class="text-danger text mr-1 l-close">Closed</span>';
                        $isOpen24 = substr($currentDay, 0, 3).'24';
                        $extends = substr($currentDay, 0, 3).'extends';
                        $isOpen = null;

                        if($row[$isOpen24]==='Y'){
                            $isOpen = '<span class="text-success text mr-1" style="float:right">Open</span>';
                        }else if($row[$extends] === 'Y'){
                            $currentDate = date('Y-m-d'); 
                            $date = new DateTime($currentDate);
                            $date->modify('+1 day');
                            $nextDate= $date->format('Y-m-d');

                            $extOpenTime = $currentDate . ' ' . $openTime; 
                            $extCloseTime = $nextDate . ' ' . $closeTime; 
                            $openDateTime = new DateTime($extOpenTime); 
                            $closeDateTime = new DateTime($extCloseTime); 
                            $extCurrrentTime =  new DateTime();

                            $isOpen = ($extCurrrentTime >= $openDateTime && $extCurrrentTime <= $closeDateTime)? '<span class="text-success text mr-1" style="float:right">Open</span>' : '<span class="text-danger text mr-1" style="float:right">Closed</span>';
                        } else {
                            $isOpen = ($currentTime >= $openTime && $currentTime <= $closeTime) ? '<span class="text-success text mr-1" style="float:right">Open</span>' : '<span class="text-danger text mr-1" style="float:right">Closed</span>';

                        }
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
					echo '<div class="row m-0 priority-list sort-item">
							<div class="col-md-2" style="margin:auto">
							<div>
								<a href="mpconnect/studio/' . urlencode(str_replace(' ', '_', $row["name"])) . '"><img src="directory/studio/'.$row['logo'].'" class="img-fluid sort-item-img" style="max-height:5rem"></a>
							</div>
							</div>
							<div class="col-md-10 pl-0" style="margin:1rem 0">
							<div class="d-flex">
                                <a href="javascript:void(0)" onclick="location.href=\'mpconnect/studio/' . urlencode(str_replace(' ', '_', $row['name'])) . '\'" style="color: inherit; text-decoration: none;" class="text-heading text-capitalize">
                                    <p class="text"><p class="text-heading text-capitalize">&nbsp;'.$type_name_head.'</p>
                                </a>
                                <img src="assets/images/Paid.png" class="ml-auto mr-3 priority-img" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">
                                <span class="ml-auto"><strong>' . $isOpen . '</strong></span>
                            </div>
							<div class="d-flex">
							<div class="ml-auto star-bar">';
							
							$ratingquery= mysqli_query($conn, "SELECT SUM(rating) AS total, COUNT(rating) as count from mp_comments WHERE mp_id= '$row[studio_id]'");
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
                            
                                <form action="mpconnect/studio/' . urlencode(str_replace(' ', '_', $row["name"])) . '" method="post" style="display:inline;">
                                <input type="hidden" name="studio_id" value="' . $row["studio_id"] . '">
                                <button type="submit" class="btn btn-success p-1" style="font-size:12px; height:28px">View&nbsp;Studio</button>
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
						echo '<h1 style="text-align:center; color:red"> End of studios </h1>';
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
                    type: "studio"
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

        $('#searchstudio, #type, #city').on('input change keyup', function() {
            var query = $('#searchstudio').val();
            var type = $('#type').val();
            var city = $('#city').val();

            if (query.length >= 1  || type || city) {
                load_data(query, type, city);
                $('.priority-list').hide();
            } else {
                $("#suggesstion-box").hide();
                $('#load_data').html(initialData);
                $('.priority-list').show();
            }
        });

        $('#clearFilters').click(function() {
            $('#searchstudio').val('');
            $('#type').val('');
            $('#city').val('');

            $("#suggesstion-box").hide();
            $('#load_data').html(initialData);
            $('.priority-list').show();
        });

        function load_data(value, type, city) {
            $.ajax({
                url: "ajax/searchStudio",
                method: "POST",
                data: {
                    search: "search",
                    value: value,
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
                        result.data.forEach(function(studio) {
                            var rating = studio.rating ? parseFloat(studio.rating) : 0;
                            var encodedName = encodeURIComponent(studio.name.replace(/\s+/g, '_'));
                            var studioId = studio.studio_id;
                            var now = new Date().toLocaleString("en-US", {timeZone: "Asia/Colombo"});
                            var currentDate = new Date(now);
                            var currentDay = currentDate.toLocaleString("en-US", {weekday: "long"}).toLowerCase();
                            var currentTime = currentDate.toTimeString().split(" ")[0];

                            var openTime = studioId[currentDay + '_open'];
                            var closeTime = studioId[currentDay + '_close'];

                            const today = new Date();
           
                            const isOpen24Key = currentDay.substring(0, 3) + '24';
                            const extendsKey = currentDay.substring(0, 3) + 'extends';
                            let isOpen = null;

                            if (studio[isOpen24Key] === 'Y') {
                                isOpen = '<span class="text-success text mr-1" style="float:right">Open</span>';
                            } else if (studio[extendsKey] === 'Y') {
                                const newCurrentDate = today.toISOString().split('T')[0]; 
                                const nextDate = new Date(today);
                                nextDate.setDate(today.getDate() + 1);
                                const nextDateString = nextDate.toISOString().split('T')[0]; 

                                const extOpenTime = new Date(newCurrentDate + 'T' + openTime);
                                const extCloseTime = new Date(nextDateString + 'T' + closeTime);
                                const extCurrentTime = today;

                                isOpen = (extCurrentTime >= extOpenTime && extCurrentTime <= extCloseTime) ? 
                                    '<span class="text-success text mr-1" style="float:right">Open</span>' : 
                                    '<span class="text-danger text mr-1" style="float:right">Closed</span>';
                            } else {
                                const openDateTime = new Date(currentDate.toISOString().split('T')[0] + 'T' + openTime);
                                const closeDateTime = new Date(currentDate.toISOString().split('T')[0] + 'T' + closeTime);

                                isOpen = (today >= openDateTime && today <= closeDateTime) ? 
                                    '<span class="text-success text mr-1" style="float:right">Open</span>' : 
                                    '<span class="text-danger text mr-1" style="float:right">Closed</span>';
                            }

                            // var isOpen = (currentTime >= openTime && currentTime <= closeTime) ? '<span class="text-success text mr-1 l-open">Open</span>' : '<span class="text-danger text mr-1 l-close">Closed</span>';
                            
                            html += '<div class="row m-0 sort-item">';
                            html += '<div class="col-md-2" style="margin:auto">';
                            html += '<a href="mpconnect/studio/'+ encodedName +'"><img src="directory/studio/' + studio.logo + '" class="img-fluid sort-item-img" style="max-height:5rem"</a>';
                            html += '</div>';
                            html += '<div class="col-md-10 pl-0" style="margin:1rem 0">';
                            html += '<div class="d-flex">';
                           
                            if (studio.priority > 0) {
								html += '<a href="mpconnect/studio/'+ encodedName +'" class="text-heading text-decoration-none lci mr-auto"><p class="text-heading text-capitalize mr-auto">&nbsp;' + studio.typeName + '</p></a>';
                                html += '<img src="assets/images/Paid.png" class="ml-auto mr-3 priority-img" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">';
								html += '<strong>' + isOpen + '</strong>';
                            }
							else{
								html += '<a href="mpconnect/studio/'+ encodedName +'" class="text-heading text-decoration-none lci mr-auto"><p class="text-heading mr-auto">&nbsp;' + studio.typeName + '</p></a>';
								html += '<strong>' + isOpen + '</strong><br>';
							}
                            
                            html += '</div>';
                            html += '<div class="d-flex">';
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
                            html += '<p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;' + studio.address +'</P>';                          
                            html += '<form action="mpconnect/studio/'+ encodedName +'" method="post" style="display:inline;">';
                            html += '<input type="hidden" name="studio_id" value="'+studioId+'">';
                            html += '<button type="submit" class="btn btn-success p-1" style="font-size:12px; height:28px">View&nbsp;Studio</button>';
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

    $('#searchstudio').on('search', function() {
        $('#suggesstion-box').hide()
    });
    $('#searchstudio').on('focus', function() {

    });
    $("#suggesstion-box li").mousedown(function() {
        jQuery('.title-list').click(function() {
            window.location.href = $(this).attr('href');
        });
    });

    $("#searchstudio").focus(function() {
        if ($('#searchstudio').val().length == 0) {
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