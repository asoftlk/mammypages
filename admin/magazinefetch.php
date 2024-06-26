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
SELECT * FROM magazine
";



if($_POST['query'] != '')
{
  $query .= '
 WHERE (language LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR magazinetitle LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" ) ';
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
<label>Total Items - '.$total_data.'</label>
<table class="table table-striped table-bordered">
  <tr>
    <th>Language</th>
	<th>Title</th>
	<th>Featured Image</th>
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
		<td>'.$row['language'].'</td>
		<td>'.$row['magazinetitle'].'</td>
		<td><div class="zoom"><img src=mummy/../../magazineimages/'.$row["featured_image"].' class="img-fluid" width="75" height="75"><div></td>
		<td><a href="edit.php?id='.$row["id"].'"><i class="fa fa-lg fa-pencil" aria-hidden="true" style="color:green;"></i></a></td>
		 <td align="center"><a href="javascript:del_id('.$row[0].')"><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i></a> </td>
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
		function del_id(id)
		{
		 if(confirm('Sure To Remove This Record ?'))
		 {
		  window.location.href='magazinelist.php?del_id='+id;
		 }
		}
   </script>