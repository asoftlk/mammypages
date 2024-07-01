<?php
include '../connect.php';

if (isset($_POST["search"])) {
    $value = mysqli_real_escape_string($conn, $_POST["value"]);

    $query = mysqli_query($conn, "SELECT * FROM hospital WHERE (name LIKE '%".str_replace(" ", "%", $value)."%' OR speciality LIKE '%".str_replace(" ", "%", $value)."%' OR city LIKE '%".str_replace(" ", "%", $value)."%' OR type LIKE '%".str_replace(" ", "%", $value)."%') ORDER BY CASE 
            WHEN priority > 0 THEN 0 ELSE 1 END, priority DESC LIMIT 6");

    $list = array();
    $html = '<ul id="title-list" class="pl-0 mb-0" style="list-style-type:none;">';

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $hospitalId = $row['hospital_id'];
            $ratingQuery = mysqli_query($conn, "SELECT SUM(rating) AS total, COUNT(rating) as count FROM mp_comments WHERE mp_id= '$hospitalId'");
            $ratingRow = mysqli_fetch_assoc($ratingQuery);
            if ($ratingRow['count'] != 0) {
                $row['rating'] = $ratingRow['total'] / $ratingRow['count'];
            } else {
                $row['rating'] = 0;
            }

            $html .= '<li><a class="title-list" href="mpdetails?type=Hospital&id='.$row["hospital_id"].'" style="text-decoration:none; color:black"><div class="d-flex"><img src="directory/hospital/'.$row["image"].'" style="width:50px; height:40px; object-fit:cover; margin-right:5px; border-radius:5px"><p class="mb-0">'.$row["name"].'</p></div></a></li>';
            $list[] = $row;
        }
    } else {
        $html .= '<li>No Hospital Found</li>';
    }

    $html .= '</ul>';
    $result = array(
        'html' => $html,
        'data' => $list
    );

    echo json_encode($result);
}
?>

