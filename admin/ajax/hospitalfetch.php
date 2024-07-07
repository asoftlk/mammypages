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
  content: "\25BC";
  margin-left: 10px;
}

.up-arrow::after {
  content: "\25B2";
  margin-left: 10px;
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
SELECT * FROM hospital ";

if($_POST['query'] != '')
{
  $query .= '
 WHERE (email LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR mobile LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR hospital_id LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR speciality LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR address LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR city LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR status LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR website LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR about LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" OR priority LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" ) ';
}

$query .= " ORDER BY is_main DESC, main_id, id DESC ";
$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_data = $statement->rowCount();

$output = '
<label>Total Hospitals - '.$total_data.'</label>
<table class="table table-striped table-bordered">
  <tr>
    <th>Hospital Id</th>
    <th>Name</th>
    <th>Hospital Specialist In</th>
    <th>Hospital Address</th>
    <th>Contact Number</th>
    <th>Email</th>
    <th>Whatsapp Number</th>
    <th>Website</th>
    <th>Hospital type</th>
    <th>Hours of Operation</th>
    <th>Facebook Link</th>
    <th>Instagram Link</th>
    <th>Linkedin Link</th>
    <th>Status</th>
    <th>Priority</th>
    <th>logo Image</th>
    <th>Featured Image</th>
    <th>datetime</th>
    <th>View</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
';

$mainHospitals = [];
$branches = [];

foreach($result as $row) {
  if($row['is_main'] === 'Y' || empty($row['is_main'])) {
    $mainHospitals[] = $row;
  } else {
    $branches[$row['main_id']][] = $row;
  }
}

foreach($mainHospitals as $mainHospital) {
  $hasBranches = isset($branches[$mainHospital['id']]);
  $arrowClass = $hasBranches ? 'down-arrow' : '';
  $output .= '
  <tr class="branch-header '.$arrowClass.'" data-main-id="'.$mainHospital['id'].'">
    <td>'.$mainHospital['hospital_id'].'<span class="arrow-icon '.$arrowClass.'"></span></td>
    <td>'.$mainHospital['name'].'</td>
    <td>'.$mainHospital['speciality'].'</td>
    <td>'.$mainHospital['address']." ".$mainHospital['city'].'</td>
    <td>'.$mainHospital['mobile'].'</td>
    <td>'.$mainHospital['email'].'</td>
    <td>'.$mainHospital['whatsapp'].'</td>
    <td>'.$mainHospital['website'].'</td>
    <td>'.$mainHospital['type'].'</td>
    <td>'.$mainHospital['working_hours'].'</td>
    <td>'.$mainHospital['facebook'].'</td>
    <td>'.$mainHospital['instagram'].'</td>
    <td>'.$mainHospital['linkedin'].'</td>
    <td>'.$mainHospital['status'].'</td>
    <td>'.$mainHospital['priority'].'</td>
    <td><div class="zoom"><img src="../directory/hospital/'.$mainHospital['logo'].'" onerror="this.onerror=null; this.remove();" class="img-fluid" width="75" height="75"></div></td>
    <td><div class="zoom"><img src="../directory/hospital/'.$mainHospital['image'].'" onerror="this.onerror=null; this remove();" class="img-fluid" width="75" height="75"></div></td>
    <td>'.$mainHospital['datetime'].'</td>
    <td><a href="javascript:fetch_id('.$mainHospital['id'].', true)"><button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-lg fa-eye" aria-hidden="true" style="color:green;"></i></button></a></td>
    <td><a href="hospitaledit.php?id='.$mainHospital['id'].'"><i class="fa fa-lg fa-pencil" aria-hidden="true" style="color:black;"></i></a></td>
    <td align="center"><a href="javascript:del_id('.$mainHospital['id'].')"><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i></a></td>
  </tr>
  ';
  if($hasBranches) {
    foreach($branches[$mainHospital['id']] as $branch) {
      $output .= '
      <tr class="bg-success branch" data-main-id="'.$mainHospital['id'].'">
        <td>'.$branch['hospital_id'].'</td>
        <td>'.$branch['name'].'</td>
        <td>'.$branch['speciality'].'</td>
        <td>'.$branch['address']." ".$branch['city'].'</td>
        <td>'.$branch['mobile'].'</td>
        <td>'.$branch['email'].'</td>
        <td>'.$branch['whatsapp'].'</td>
        <td>'.$branch['website'].'</td>
        <td>'.$branch['type'].'</td>
        <td>'.$branch['working_hours'].'</td>
        <td>'.$branch['facebook'].'</td>
        <td>'.$branch['instagram'].'</td>
        <td>'.$branch['linkedin'].'</td>
        <td>'.$branch['status'].'</td>
        <td>'.$branch['priority'].'</td>
        <td><div class="zoom"><img src="../directory/hospital/'.$branch['logo'].'" onerror="this.onerror=null; this.remove();" class="img-fluid" width="75" height="75"></div></td>
        <td><div class="zoom"><img src="../directory/hospital/'.$branch['image'].'" onerror="this.onerror=null; this.remove();" class="img-fluid" width="75" height="75"></div></td>
        <td>'.$branch['datetime'].'</td>
        <td><a href="javascript:fetch_id('.$branch['id'].', true)"><button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-lg fa-eye" aria-hidden="true" style="color:green;"></i></button></a></td>
        <td><a href="hospitaledit.php?id='.$branch['id'].'"><i class="fa fa-lg fa-pencil" aria-hidden="true" style="color:black;"></i></a></td>
        <td align="center"><a href="javascript:del_id('.$branch['id'].')"><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i></a></td>
      </tr>
      ';
    }
  }
}
$output .= '</table>';

echo $output;
?>

<script type="text/javascript">
  function del_id(id) {
    if(confirm('Sure To Remove This Record ?')) {
      window.location.href='viewhospital.php?del_id='+id;
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
