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
SELECT * FROM doctor
";



if($_POST['query'] != '')
{
  $query .= '
 WHERE (email LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR mobile LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR doctor_id LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR speciality LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR address LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR city LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR status LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR website LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR about LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR priority LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" ) ';
}

$query .= " ORDER BY  id DESC ";
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
	/*echo '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';*/
}

$output = '
<label>Total Hospitals - '.$total_data.'</label>
<table class="table table-striped table-bordered">
  <tr>
    <th>doctor Id</th>
	<th>Name</th>
	<th>doctor Specialist In</th>
  <th>doctor qualification</th>
   	<th>doctor Address</th>
    <th>Contact Number</th>
	<th>Email</th>
       <th>Website</th>
    <th>doctor type</th>
    <th>Hours of Operation</th>
    <th>Facebook Link</th>
    <th>Instagram Link</th>
    <th>Linkedin Link</th>
    <th>Status</th>
    <!--th>About</th-->
    <th>Priority</th>
    <th>logo Image</th>
    <th>Featured Image</th>
	<th>datetime</th>
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
		<td>'.$row['doctor_id'].'</td>
		<td>'.$row['name'].'</td>
        <td>'.$row['speciality'].'</td>
        <td>'.$row['qualification'].'</td>
        <td>'.$row['address']."  ".$row['city'].'</td>
        <td>'.$row['mobile'].'</td>
        <td>'.$row['email'].'</td>
		
		<td>'.$row['website'].'</td>
		<td>'.$row['working_hours'].'</td>
		
		<td>'.$row['facebook'].'</td>
		<td>'.$row['instagram'].'</td>
		<td>'.$row['linkedin'].'</td>
	    <td>'.$row['status'].'</td>
		<!--td>'.$row['about'].'</td>
		<td>'.$row['priority'].'</td-->
		<td><select name="dropdown" id="prioritystatus" onchange="javascript:chg_status(this);">
        <option value="" selected disabled>'.$row["priority"].'</option>
        <option value="viewdoctors.php?value=0&id='.$row["id"].'">0</option>
        <option value="viewdoctors.php?value=1&id='.$row["id"].'">1</option>
        <option value="viewdoctors.php?value=2&id='.$row["id"].'">2</option>
        <option value="viewdoctors.php?value=3&id='.$row["id"].'">3</option>
        <option value="viewdoctors.php?value=4&id='.$row["id"].'">4</option>
        <option value="viewdoctors.php?value=5&id='.$row["id"].'">5</option>
		</select>
		</td>
		<td><div class="zoom"><img src="../directory/doctor/'.$row["logo"].'"  onerror="this.onerror=null; this.remove();" class="img-fluid" width="75" height="75"><div></td>
		<td><div class="zoom"><img src="../directory/doctor/'.$row["image"].'"  onerror="this.onerror=null; this.remove();" class="img-fluid" width="75" height="75"><div></td>
		<td>'.$row['datetime'].'</td>
        
      </select>
      </td>
      <td><a href="javascript:fetch_id('.$row[0].', true)"><button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-lg fa-eye" aria-hidden="true" style="color:green;"></i></button></a></td>
        
        <td><a href="doctoredit.php?id='.$row["id"].'"><i class="fa fa-lg fa-pencil" aria-hidden="true" style="color:black;"></i></a></td>
        
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
  for($count = 0; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 1; $count < count($page_array); $count++)
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
		  window.location.href='viewdoctors.php?del_id='+id;
		 }
		}
function chg_status(id)
		{
		  window.location=id.value;
		}

</script>