<?php
include "mp.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<style>
    .medicaltype {
        border-left: 4px solid #68CF68;
        margin-bottom: 0;
    }

    .medicaltype span {
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
          <div class="d-flex justify-content-end">
    		<div class="position-relative">
    		<form class="form-inline" action="" method="POST">
    			<input class="form-control" type="search" name="searchmedical" id="searchmedical" placeholder="Search medical" aria-label="Search">
    			<!--button class="btn btn-success form-control p-2" type="submit" ><i class="bi bi-search"></i></button-->
    		</form>
    		<div id="suggesstion-box" class="position-absolute" style="z-index:1000" ></div>
    		</div>
    	  </div>  
         <div class="top-menu">
            
			<?php $medical =mysqli_query($conn, "SELECT * FROM medical WHERE priority > 0 ORDER BY priority LIMIT 5");
					$count = 0;
					$numrows = mysqli_num_rows($medical);
					while($row=mysqli_fetch_array($medical)){
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
					echo '<div class="row m-0" style="border-bottom: 1px solid #f4f4f4 ;">
							<div class="col-md-3" style="margin:auto">
							<div>
								<a href="mpmedical_details.php?type=medical&id='.$row["medical_id"].'"><img src="directory/medical/'.$row['logo'].'" class="img-fluid" style="max-height:5rem"></a>
							</div>
							</div>
							<div class="col-md-9 pl-0" style="margin:1rem 0">
							<div class="d-flex">
                            <p class="text"><a href="mpmedical_details.php?type=medical&id='.$row["medical_id"].'" class="namehref"><p class="text-heading">&nbsp;'.$row["name"].'</p></a>
                                <img src="assets/images/Paid.png" width="16" height="20" class="ml-auto" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">
                            </div>
							<div class="d-flex">
							<p class="text">&nbsp;'.$speciality.'</P>
							<div class="ml-auto">';
							
							$ratingquery= mysqli_query($conn, "SELECT SUM(rating) AS total, COUNT(rating) as count from mp_comments WHERE mp_id= '$row[medical_id]'");
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
                            
                                <a href="mpmedical_details.php?type=medical&id='.$row["medical_id"].'" type="button" class="btn btn-success p-1 ml-auto" style="font-size:12px; height:28px">View&nbsp;medical</a>
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
						echo '<h1 style="text-align:center; color:red"> End of medicals </h1>';
					}
					?>						
			
         </div>
      </div>
   </div>
           <div class="col-md-3">
               <div class="right-cont-part">
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
                url: "ajax/mpmedicaldatafetch",
                method: "POST",
                data: {
                    count: count,
                    type: "medical"
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

    $('#searchmedical').keyup(function() {
        var query = $('#searchmedical').val();
        if (query.length >= 1) {
            load_data(($('#searchmedical').val()));
        }
        if (query.length == 0) {
            $("#suggesstion-box").hide();
            $('#load_data').html(initialData);
        }

        function load_data(value) {
            $.ajax({
                url: "ajax/searchmedical",
                method: "POST",
                data: {
                    search: "search",
                    value: value
                },
                success: function(data) {
                    var result = JSON.parse(data);
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(result.html);
                    if (result.data.length > 0) {
                        var html = '';
                        result.data.forEach(function(medical) {
                            var specialityArray = medical.speciality.split(" ///");
                            var speciality = specialityArray.join(", ");
                            var rating = medical.rating ? parseFloat(medical.rating) : 0;
                            
                            html += '<div class="row m-0" style="border-bottom: 1px solid #f4f4f4;">';
                            html += '<div class="col-md-3" style="margin:auto">';
                            html += '<a href="mpmedical_details.php?type=medical&id=' + medical.medical_id + '">';
                            html += '<img src="directory/medical/' + medical.logo + '" class="img-fluid" style="max-height:5rem"></a>';
                            html += '</div>';
                            html += '<div class="col-md-9 pl-0" style="margin:1rem 0">';
                            html += '<div class="d-flex">';
                            html += '<p class="text"><a href="mpmedical_details.php?type=medical&id=' + medical.medical_id + '" class="namehref">';
                            html += '<p class="text-heading">&nbsp;' + medical.name + '</p></a>';
                            if (medical.priority > 0) {
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
                            html += '<p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;' + medical.address + '</P>';                          
                            html += '<a href="mpmedical_details.php?type=medical&id=' + medical.medical_id + '" type="button" class="btn btn-success p-1 ml-auto" style="font-size:12px; height:28px">View&nbsp;medical</a>';
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
    $('#searchmedical').on('search', function() {
        $('#suggesstion-box').hide()
    });
    $('#searchmedical').on('focus', function() {

    });
    $("#suggesstion-box li").mousedown(function() {
        jQuery('.title-list').click(function() {
            window.location.href = $(this).attr('href');
        });
    });

    $("#searchmedical").focus(function() {
        if ($('#searchmedical').val().length == 0) {
            $('#suggesstion-box').hide()
        }
    });

</script>
</body>