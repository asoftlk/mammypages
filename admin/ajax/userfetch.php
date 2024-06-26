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
SELECT * FROM users_reg
";



if($_POST['query'] != '')
{
  $query .= '
 WHERE (email LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR mobile LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR partner_occupation LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR partner_dob LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR anniversary_date LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR partner_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR children LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR pregnant_week LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR pregnant LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR fav_article LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR occupation LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR province LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR country LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR city LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR address2 LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR address1 LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR last_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR middle_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR planguage LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR first_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" ) ';
}

$query .= 'ORDER BY status, id DESC ';
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
    <th>Name</th>
	<th>DOB</th>
	<th>Address</th>
   	<th>Occupation</th>
    <th>Language</th>
    <th>Favourite Article</th>
    <th>Marital Status</th>
    <th>Pregnant</th>
    <th>Pregnant_week</th>
    <th>Children</th>
    <th>Partner Name</th>
    <th>Anniversary Date</th>
    <th>Partner DOB</th>
    <th>Partner Occupation</th>
    <th>Mobile</th>
    <th>Email</th>
    <th>Mobile Verified</th>
    <th>Email Verified</th>
    <th>Status</th>
    <th>Profile Image</th>
    <th>View</th>
    <th>Edit</th>
	<th>Delete</th>
  </tr>
';
if($total_data > 0)
{
  foreach($result as $row)
  {
      if($row["mobile_verified"]==1){
          $mobile='<i class="fa fa-2x fa-user-check" style="color:green; "></i>';
      }
      else{
          $mobile='<i class="fa fa-2x fa-user-times" style="color:red; "></i>';
      }
      if($row["email_verified"]==1){
          $email='<i class="fa fa-2x fa-user-check" style="color:green; "></i>';
      }
      else{
          $email='<i class="fa fa-2x fa-user-times" style="color:red; "></i>';
      }
      if($row["status"]==1){
          $status="Verified";
      }
      else{
          $status="Not verified";
      }
      $pregnant = $row["pregnant"]=="false" ? "No": "Yes";
      $children = $row["children"]=="false" ? "No" : "Yes";
      $output .= '
    <tr>
		<td>'.$row['first_name']." ".$row['middle_name']." ".$row['last_name'].'</td>
		<td>'.$row['dob'].'</td>
        <td>'.$row['address1'].", ".$row['address2'].", ".$row['city'].", ".$row['province'].", ".$row['country'].'</td>
        <td>'.$row['occupation'].'</td>
        <td>'.$row['planguage'].'</td>
        <td>'.$row['fav_article'].'</td>
        <td>'.$row['marital_status'].'</td>
        <td>'.$pregnant.'</td>
        <td>'.$row['pregnant_week'].'</td>
        <td>'.$children.'</td>
        <td>'.$row['partner_name'].'</td>
        <td>'.$row['anniversary_date'].'</td>
        <td>'.$row['partner_dob'].'</td>
        <td>'.$row['partner_occupation'].'</td>
        <td>'.$row['mobile'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$mobile.'</td>
        <td>'.$email.'</td>
        <td><select name="dropdown" id="sta" onchange="javascript:chg_status(this);">
        <option value="" selected disabled>'.$status.'</option>
        <option value="users.php?value=1&id='.$row["id"].'">Verified</option>
        <option value="users.php?value=0&id='.$row["id"].'">Not Verified</option>
      </select>
      </td>
      <!--  <td>'.$status.'</td> -->
        
		<td><div class="zoom"><img src=mummy/../../images/'.$row["profile_image"].' onerror="this.onerror=null; this.remove();" class="img-fluid" width="75" height="75"><div></td>
        <td><a href="javascript:fetch_id('.$row[0].', true)"><button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-lg fa-eye" aria-hidden="true" style="color:green;"></i></button></a></td>
        
        <td><a href="javascript:fetch_id('.$row[0].', false)"><button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-lg fa-pencil" aria-hidden="true" style="color:black;"></i></button></a></td>
        
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
		  window.location.href='users.php?del_id='+id;
		 }
		}
   </script>
<script>
function chg_status(id)
		{
		  window.location=id.value;
		}

</script>