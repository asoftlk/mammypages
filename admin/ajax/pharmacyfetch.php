<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
<style>
.zoom:hover {
  -ms-transform: scale(2.5); /* IE 9 */
  -webkit-transform: scale(2.5); /* Safari 3-8 */
  transform: scale(2.5); 
}

.branch {
  display: none;
}

.branch-header {
  cursor: pointer;
}

.down-arrow::after {
  content: "\F231";
  font-family: bootstrap-icons !important;
  margin-left: 10px;
  position: absolute;
  left: 26px;
  margin-top: 0.85rem;
}

.up-arrow::after {
  content: "\F229";
  font-family: bootstrap-icons !important;
  margin-left: 10px;
  position: absolute;
  left: 28px;
  margin-top: 0.85rem;
}
.table th{
  text-wrap: nowrap;
}
.bg-tbl{
  background-color: #b7ccdd !important;
  color: #000 !important;
}
.color-box {
    width: 15px;
    height: 15px;
    background-color: #b7ccdd;
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
}

.color-label {
    font-size: 16px;
    vertical-align: middle;
    font-weight: 700;
    color: #5f46c6;
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

$query = " SELECT * FROM pharmacy";

if($_POST['query'] != '') {
    $query .= '
    WHERE (email LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR mobile LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR pharmacy_id LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR speciality LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR address LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR city LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR status LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR website LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR about LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR priority LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" ) ';
}


$query .= " ORDER BY is_main DESC, main_id, id DESC ";
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
<label>Total Pharmacy - '.$total_data.'</label>  
  <div class="color-box ml-5"></div>
    <span class="color-label">branches</span>
<table class="table table-striped table-bordered">
  <tr>
    <th>Pharmacy Id</th>
	<th>Name</th>
	<th>Pharmacy Established</th>
   	<th>Pharmacy Address</th>
    <th>Contact Number</th>
	<th>Email</th>
    <th>Whatsapp Number</th>
     <th>Website</th>
    <th>Hours of Operation</th>
    <th>Facebook Link</th>
    <th>Instagram Link</th>
    <th>TikTok Link</th>
    <th>Youtube Link</th>
    <th>Status</th>
    <!--th>About</th-->
    <th>Priority</th>
    <th>logo Image</th>
    <th>Featured Image</th>
	<th>Date Time</th>
    <th>View</th>
    <th>Edit</th>
	<th>Delete</th>
  </tr>
';

$mainData = [];
$branches = [];

foreach($result as $row) {
  if($row['is_main'] === 'Y' || empty($row['is_main'])) {
    $mainData[] = $row;
  } else {
    $branches[$row['main_id']][] = $row;
  }
}

if($total_data > 0)
{
    foreach($mainData as $main) {
        $hasBranches = isset($branches[$main['id']]);
        $arrowClass = $hasBranches ? 'down-arrow' : '';
        $output .= '
        <tr class="branch-header '.$arrowClass.'" data-main-id="'.$main['id'].'">
            <td>'.$main['pharmacy_id'].'</td>
            <td>'.$main['name'].'</td>
            <td>'.$main['established'].'</td>
            <td>'.$main['address']."  ".$main['city'].'</td>
            <td>'.$main['mobile'].'</td>
            <td>'.$main['email'].'</td>
            <td>'.$main['whatsapp'].'</td>
            <td>'.$main['website'].'</td>
            <td>'.$main['working_hours'].'</td>
            <td>'.$main['facebook'].'</td>
            <td>'.$main['instagram'].'</td>
            <td>'.$main['linkedin'].'</td>
            <td>'.$main['youtube'].'</td>
            <td>'.$main['status'].'</td>
            <!--td>'.$main['about'].'</td>
            <td>'.$main['priority'].'</td-->
            <td><select name="dropdown" id="prioritystatus" onchange="javascript:chg_status(this);">
            <option value="" selected disabled>'.$main["priority"].'</option>
            <option value="viewpharmacy.php?value=0&id='.$main["id"].'">0</option>
            <option value="viewpharmacy.php?value=1&id='.$main["id"].'">1</option>
            <option value="viewpharmacy.php?value=2&id='.$main["id"].'">2</option>
            <option value="viewpharmacy.php?value=3&id='.$main["id"].'">3</option>
            <option value="viewpharmacy.php?value=4&id='.$main["id"].'">4</option>
            <option value="viewpharmacy.php?value=5&id='.$main["id"].'">5</option>
            </select>
            </td>
            <td><div class="zoom"><img src="../directory/pharmacy/'.$main["logo"].'"  onerror="this.onerror=null; this.remove();" class="img-fluid" width="75" height="75"><div></td>
            <td><div class="zoom"><img src="../directory/pharmacy/'.$main["image"].'"  onerror="this.onerror=null; this.remove();" class="img-fluid" width="75" height="75"><div></td>
            <td>'.$main['datetime'].'</td>
            
        </select>
        </td>
        <td><a href="javascript:fetch_id('.$main[0].', true)"><button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-lg fa-eye" aria-hidden="true" style="color:green;"></i></button></a></td>
            
            <td><a href="pharmacyedit.php?id='.$main["id"].'"><i class="fa fa-lg fa-pencil" aria-hidden="true" style="color:black;"></i></a></td>
            
            <td align="center"><a href="javascript:del_id('.$main[0].')"><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i></a> </td>
            
        
        </tr>';
        
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
  function del_id(id) {
    if(confirm('Sure To Remove This Record ?')) {
      window.location.href='viewpharmacy.php?del_id='+id;
    }
  }

  function chg_status(id) {
    window.location = id.value;
  }

  document.querySelectorAll('.branch-header.down-arrow').forEach(header => {
        header.addEventListener('click', function() {
            const mainId = this.getAttribute('data-main-id');
            const branches = document.querySelectorAll('.branch[data-main-id="'+mainId+'"]');
            const isHidden = branches[0].style.display === 'none';

            branches.forEach(branch => {
                branch.style.display = isHidden ? 'table-row' : 'none';
            });

            this.classList.toggle('down-arrow', !isHidden);
            this.classList.toggle('up-arrow', isHidden);
        });
  });
</script>