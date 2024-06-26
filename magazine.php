<?php
include "header.php";
?>
<style>
body{
    background-color: #f4f4f4 !important;
}
/* Style buttons */
.btn1 {
  background-color: green; /* Blue background */
  border: none; /* Remove borders */
  color: white; /* White text */
  margin:5px 5px;
  padding: 0px 6px 8px 6px; /* Some padding */
  cursor: pointer; /* Mouse pointer on hover */
  outline: none !important;
}

/* Darker background on mouse-over */
.btn1:hover {
  background-color: RoyalBlue;
}
/* Style buttons */
.buttons {
  background-color: white; /* Blue background */
  border: none; /* Remove borders */
  color: white; /* White text */
  margin:5px 5px;
  padding: 0px 6px 0px 6px; /* Some padding */
  cursor: pointer; /* Mouse pointer on hover */
  outline: none !important;
}

/* Darker background on mouse-over */
.buttons:hover {
  color: black;
}

.card-img-top {
    width: 100%;
    height: 15rem;
    object-fit: fill;
}
.heading {
  position: relative;
  line-height: 1.2em;
  padding:1rem 0 0 1rem; 
  color:#464444;
  font-weight:bold;
}
.heading:before {
    position: absolute;
    left: 16px;
    top: 1.8em;
    height: 0;
    width: 50px;
    content: '';
    border-top: 7px solid #0AD69E;
    border-radius: 1em;
}
</style>
<div class="container-fluid" style="background-color:white">
<div class="container">
<h4 class="heading">Digital Magazine</h4>
<div class="row">
<?php 
$magazines=mysqli_query($conn, "SELECT * FROM magazine ORDER BY Date DESC");
while($row=mysqli_fetch_array($magazines)){
echo '<div class="col-lg-3 col-md-4 col-sm-6"><div class="card p-0" style="min-width:13rem; max-width: 15rem;  margin:0.5rem 1rem">
  <img class="card-img-top" src="magazineimages/'.$row["featured_image"].'" class="img-fluid" alt="Card image cap">
  <div class="card-body p-2">
    <h6 class="card-title font-weight-bold" >'.$row["magazinetitle"].'</h6>
	<div class="card-text">
	<a href="https://www.facebook.com"><img src="assets/images/Facebook.png" class="img-fluid" style="max-width:25px"></a>
	<a href="https://www.twitter.com"><img src="assets/images/Twitter.png" class="img-fluid" style="max-width:25px"></a>
	<a href="https://www.twitter.com"><img src="assets/images/Insta.png" class="img-fluid" style="max-width:25px"></a>
	<button class="buttons float-right"><i class="fa fa-download" style="font-size:1.6rem; color:green"></i></button>
	<button class="btn1 float-right"><i class="bi bi-bookmark-fill" style="font-size:1rem; color:white"></i></button>
	</div>
  </div>
</div>
</div>';
}?>

</div>
</div>
</div>

<?php include "footer.php";?>
