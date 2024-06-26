<?php 
ob_start(); 
include "header.php"; 
if(!isset($_SESSION['name'])){
	header('Location: login');
	ob_end_flush();
	exit;
}
?>
<style>

.sidebar a {
  padding: 5px 0px;
  text-decoration: none;
  font-size: 15px;
  color: #6f6c6c;
  display: block;
}

.sidebar a:hover {
  color: #68cf68;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 15px;}
}
    
    .art-btn{
        background: #68cf68;
        color: #fff;
        font-weight: bold;
        border-radius: 2rem;
		padding: 0.5rem 0.5rem; 
		margin-top:1rem;
    }
    .art-btn:hover{
        color: #fff;
    }

.icofont{
	font-size:1.5rem;
}
</style>
<?php 
$query= mysqli_query($conn, "SELECT * FROM users_reg WHERE email='$_SESSION[userid]'");
$row = mysqli_fetch_array($query);
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 " style="border-right:1px solid #dddddd; margin:0;">
		<div id="left-bar" style="position:sticky">
        <div class="contianer-fluid">
			<div class="row justify-content-center" style="margin-top:5px;">
			<?php if($row['status']=='1'){
			echo '<p style="text-align: right;font-size: 11px; margin-bottom:0">PROFILE ID&nbsp;<span style="color:white;background-color:#6cce6d; padding:3px; font-size:13px">'.$row["profileid"].'</span></p>';
			}
			?>
            <div class="col-lg-4 col-md-12 p-0">
			<img class="img-fluid" src="images/<?= $row['profile_image']?>" onerror="this.src='assets/images/child-img-1.jpg'" style="border-radius:50%; width:5rem; height:5rem;">
            </div>
			<div class="col-lg-8 col-md-12 p-0 m-0" style="color:#6f6c6c">
			<p style="margin-left:0.1rem; padding-top:0.3rem; font-weight:bold; font-size:0.9rem; margin-bottom:0.1rem">
                <?php echo $row['first_name']." ".$row['last_name']. " " ;
				if($row['status']=='1'){
				echo '<img src="assets/images/badge-check.svg" data-toggle="tooltip" title="Verified" style="height:0.9rem; margin-top:-0.2rem"></p>';
				}
				else{
					echo '<i class="fa fa-info-circle" data-toggle="tooltip" title="Profile In-review" aria-hidden="true" style="color:red;margin:auto"></i>';
				}
				
               echo '<p style="margin-left:0.1rem; padding-top:0.2rem; font-weight:bold; font-size:0.9rem; margin-bottom:0.1rem">Age: '.str_replace("ago", "", time_elapsed_string($row["dob"], $full=false)) .'<br>
                <span style="font-size:0.9rem;">'.$row["city"].' | '.$row["country"].'</span>';
				?>
            </p>
			</div>
			</div>
        </div>
        
        <div class="sidebar" style="font-weight:600"><br>
          <a href="dashboard" class="user"><i class="icofont icofont-home"></i> Home</a>
          <a href="profile"><i class="icofont icofont-ui-user"></i> Profile</a>
          <a href="#"><i class="icofont icofont-alarm"></i> Notifications</a>
          <a href="#"><i class="icofont icofont-wechat"></i> Messages</a>
          <a href="#"><i class="icofont icofont-users-alt-4"></i> Connections</a>
          <a href="#"><i class="icofont icofont-star"></i> Favorites</a>
          <a href="#"><i class="icofont icofont-heart-alt"></i> Favorite Category</a>
          <a href="#"><i class="icofont icofont-gift-box"></i> Birthday Box</a>
          <a href="myarticles"><i class="icofont icofont-ui-note"></i> Articles List</a>
        </div>
    
        <div>
            <a href="articlepost"><button type="button" class="btn art-btn" >WRITE ARTICLE</button></a>
        </div>
       </div> 
    </div>
<script>
var height=$("#h2").height()+$("#cathome").height()+60;
$("#left-bar, #right-bar").css({'top':height, 'position':'sticky'});
$(window).on('resize', function(){
	var height=$("#h2").height()+$("#cathome").height();
	$("#left-bar, #right-bar").css({'top':height, 'position':'sticky'});

    });
</script>