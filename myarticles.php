<?php 
include "db.php";
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.8/dist/sweetalert2.all.min.js"></script>
<div class="col-md-6" style="border-right:1px solid #dddddd; padding:0">

<?php
$query ="SELECT * FROM posts WHERE posted_by='$_SESSION[userid]' AND pub_datetime < NOW() ORDER BY pub_datetime DESC";
mysqli_set_charset($conn, 'utf8');
$article =mysqli_query($conn, $query);
echo mysqli_error($conn);
echo '<div style="display:flex; justify-content:space-between; background-color:white; color: #6f6c6c; border-bottom:2px solid #f4f4f4; padding:10px">
	<h6><strong>MANAGE ARTICLE(S)</strong></h6>
	<p style="color:#504e4e; font-size:13px; font-weight:600">Published: <span>'.mysqli_num_rows($article).'</span></p>
	</div>';
	$output ="";	
	if(mysqli_num_rows($article)>0){
	while($row=mysqli_fetch_array($article)){
		$lang = $row['language'];
		$style= ($lang == 'tam')? 'font-family: \'Mukta Malar\', sans-serif;' : 'font-family: \'Montserrat\', sans-serif;';

	     $description =strip_tags($row["description"]);
			$output .= '<div class="row" style="margin:0;border-bottom: 4px solid #f4f4f4 ;">
					<div class="col-md-2" style="padding:0.8rem 0.8rem; text-align:center">
					<a href="article?id='.$row["posting_id"].'"><img src="admin/posts/'.$row["featured_image"].'" class="img-fluid feaimg" style="border-radius:1rem; width:100px; height:80px; object-fit:cover; margin-left:0.8rem"></a>
				</div>
				<div class="col-md-10" style="padding:0.8rem 1.5rem; ">
					<div class="row"><div class="col-md-7" style="display:flex; justify-content: space-between;"><a href="article?id='.$row["posting_id"].'" style="text-decoration:none; color:#504e4e; font-weight:bold;max-height:1.5rem;overflow:hidden;text-overflow:ellipsis; white-space:nowrap;'.$style.'">'.$row["article_title"].'</a></div>
					<div class="col-md-5 d-flex" style="justify-content:flex-end;font-size:smaller"><a href="article?id='.$row["posting_id"].'" style="text-decoration:none;color:#68cf68">VIEW&nbsp;</a><form method="POST" action="editarticle"><button type="submit" name="id" value="'.$row["posting_id"].'" style="text-decoration:none;color:#68cf68; border:none; background-color:transparent">&nbsp;|&nbsp;EDIT</button></form><a href="#" id="deleteart" value="'.$row["posting_id"].'" style="text-decoration:none;color:#68cf68">&nbsp;|&nbsp;DELETE</a></div></div>
					<div class="descript" style="color:#b1afaf; height:2.8rem;margin-bottom:0.8rem;"><a href="article?id='.$row["posting_id"].'" style="text-decoration:none"><p style=" height:2.8rem;  color:#888686; overflow: hidden; text-overflow: ellipsis;'.$style.' ">'.mb_substr($description,0,300).'</p></a></div>
					<div class="d-flex" style="justify-content:flex-end;flex-wrap: wrap;">
					<input type="hidden" id="articleid" value="'.$row["posting_id"].'">';
				$likes= mysqli_query($conn, "SELECT count(*) as totallikes FROM visitors WHERE articleid='$row[posting_id]' AND liked='1'");
				$likesrow=mysqli_fetch_array($likes);
				if(!isset($_SESSION['name'])){
				$output .=	'<i class="bi bi-heart"  value="'.$row["posting_id"].'" style="color:#68cf68"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
				}
				else{
					$liked =mysqli_query($conn, "SELECT liked FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$row[posting_id]'");
					if(mysqli_num_rows($liked)>0){
						$likedrow=mysqli_fetch_array($liked);
						if($likedrow['liked']==0){
							$output .=	'<i class="bi bi-heart" value="'.$row["posting_id"].'" style="color:#68cf68"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
						}
						else{
							$output .=	'<i class="bi bi-heart-fill" value="'.$row["posting_id"].'"  style="color:#68cf68"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
						}
					}
					else{
						$output .=	'<i class="bi bi-heart" value="'.$row["posting_id"].'" style="color:#68cf68"></i><span id="count" class="align-middle" style="margin:  -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
					}
				}
				$commentquery = mysqli_query($conn, "SELECT count(articleid) as comments FROM comments WHERE articleid = '$row[posting_id]'");
				$numcomments = mysqli_fetch_assoc($commentquery);
				$output .=	'<div class="d-flex header-settings">
						<p id="count" class="align-middle" style="margin:  -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">comments '.$numcomments["comments"].'</p>
						<p id="count" class="align-middle" style="margin:  -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">Views '.$row["view_count"].'</p>
					</div>';
									
					
					
				$output .=	'</div></div></div>';
	}
			echo $output;
	}
	else{
		echo '<h5>No Posts Available</h6>';
	}
?>
<script>
function removeReg(data, status) {
  Swal.fire({
      text: data,
      icon: status,
      dangerMode: false,
    })
    .then(function(value) {
		if(status == 'success'){
		window.location.reload();
		}
		if(data == 'Please login to Comment to this post'){
			$('#exampleModal').modal('show');
		}
      //console.log('returned value:', value);
    });
}
$(document).on('click', '#deleteart', function () { 
		var id=$(this).attr('value');
	Swal.fire({
	  title: 'Are you sure?',
	  text: "You want to Delete Article",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	  if (result.isConfirmed) {
		$.ajax({
			type:'post',
			url: 'ajax/delarticle',
			mimeType: "multipart/form-data",
			data:{id : id, deleteid:"delete"},
			
			success:function(data){
				//debugger
				console.log(data);
				if(data=='Deleted'){
				Swal.fire(
				  'Deleted!',
				  'Your Article has been deleted.',
				  'success'
				).then((result) => {
			  if (result.isConfirmed) {
				window.location.reload();
			  }
			  else{
				  window.location.reload();
			  }
				});
				
				}
				else{
					removeReg(data, 'error');
				}
			},
			error: function(data){
				console.log(data);
				removeReg(data, 'error');
			}
		});
	  }
	});
	

});
</script>
</script>
</div>