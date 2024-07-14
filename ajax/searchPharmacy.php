<?php
include '../connect.php';

if (isset($_POST["search"])) {
    $value = mysqli_real_escape_string($conn, $_POST["value"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);

    $conditions = array();

    if (!empty($value)) {
        $conditions[] = "(name LIKE '%".str_replace(" ", "%", $value)."%' OR city LIKE '%".str_replace(" ", "%", $value)."%')";
    }
    if (!empty($city)) {
        $conditions[] = "city = '$city'";
    }

    $sql = "SELECT * FROM pharmacy";
    $sql.=" INNER JOIN pharmacy_working_times wt ON wt.pharmacy_id = pharmacy.pharmacy_id "; 
    if (count($conditions) > 0) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
    $sql .= " ORDER BY CASE WHEN priority > 0 THEN 0 ELSE 1 END, priority DESC LIMIT 6";

    $query = mysqli_query($conn, $sql);

    $list = array();
    $html = '<ul id="title-list" class="pl-0 mb-0" style="list-style-type:none;">';

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $pharmacyId = $row['pharmacy_id'];
            $ratingQuery = mysqli_query($conn, "SELECT SUM(rating) AS total, COUNT(rating) as count FROM mp_comments WHERE mp_id= '$pharmacyId'");
            $ratingRow = mysqli_fetch_assoc($ratingQuery);
            $row['rating'] = $ratingRow['count'] != 0 ? $ratingRow['total'] / $ratingRow['count'] : 0;

            $type_name_head = $row['name'];
            if (isset($row['main_id']) && !empty($row['main_id']) && $row['main_id'] != 0) {
                $mainId = $row['main_id'];
                $nameQuery = mysqli_query($conn, "SELECT `name` FROM `pharmacy` WHERE `id` = '$mainId'");
                if ($nameQuery) {
                    $mainRow = mysqli_fetch_assoc($nameQuery);
                    $type_name_head = !empty($mainRow['name']) ? $mainRow['name'] . ' - ' . $row['name'] : $row['name'];
                }
            }
            $row['typeName'] = $type_name_head;
            
            $html .= '<li><div class="d-flex"><img src="directory/pharmacy/'.$row["image"].'" style="width:50px; height:40px; object-fit:cover; margin-right:5px; border-radius:5px"><p class="mb-0">'. $type_name_head.'</p></div></li>';
            $list[] = $row;
        }
    } else {
        $html .= '<li>No Pharmacy Found</li>';
    }

    $html .= '</ul>';
    $result = array(
        'html' => $html,
        'data' => $list
    );

    echo json_encode($result);
}
?>


