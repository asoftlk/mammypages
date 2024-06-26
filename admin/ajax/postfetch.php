<style>
.zoom:hover {
  -ms-transform: scale(2.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(2.5); 
}
</style>
<?php
include "connect.php";
$limit = $_POST['value'];
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT * FROM posts WHERE posted_by= '' 
";



if($_POST['query'] != '')
{
  $query .= '
  AND (posting_id LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR language LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR category LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR article_title LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR tags LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR keywords LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR datetime LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR pub_datetime LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"  ) ';
}

$query .= 'ORDER BY id DESC ';
$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();
//print_r($query);
if($total_filter_data==0){
	echo '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output = '
<label>Total Posts - '.$total_data.'</label>
<table class="table table-striped table-bordered">
  <tr>
    <th>Post ID</th>
	<th>Language</th>
	<th>Category</th>
   	<th>Article Title</th>
    <th>Published Date</th>
    <th>Tags</th>
    <th>Keywords</th>
    <th>Featured Image</th>
    <th>Product1</th>
    <th>Product2</th>
    <th>Product3</th>
    <th>Product4</th>
    <th>View</th>
    <th>Edit</th>
	<th>Delete</th>
  </tr>
';
if($total_data > 0)
{
  foreach($result as $row)
  {
    $output .= '
    <tr>
		<td>'.$row['posting_id'].'</td>
		<td>'.$row['language'].'</td>
        <td>'.$row['category'].'</td>
        <td>'.$row['article_title'].'</td>
        <td>'.$row['pub_datetime'].'</td>
        <td>'.$row['tags'].'</td>
        <td>'.$row['keywords'].'</td>
		<td><div class="zoom"><img src="../admin/posts/'.$row["featured_image"].'"  onerror="this.onerror=null; this.remove();" class="img-fluid" width="75" height="75"><div></td>
        <td>'.$row['product1'].'</td>
        <td>'.$row['product2'].'</td>
        <td>'.$row['product3'].'</td>
        <td>'.$row['product4'].'</td>
        <td><a href="../article?id='.$row["posting_id"].'" target = "_blank"><i class="fa fa-lg fa-eye" aria-hidden="true" style="color:green;"></i></a></td>
        
        <td><form method="POST" action="editarticle">
		<button type="submit" name="id" value="'.$row["posting_id"].'" style="text-decoration:none;color:#68cf68; border:none; background-color:transparent"><i class="fa fa-lg fa-pencil" aria-hidden="true" style="color:black;"></i></button>
		</form></td>
        
		 <td align="center"><a id="deleteart" name="id" value="'.$row[0].'" style="cursor:pointer"><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i></a> </td>
    </tr>
    ';
  }
  $output .= '</table>';
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;

?>
<script type="text/javascript">
		
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
