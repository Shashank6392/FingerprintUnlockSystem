<?php
require_once __DIR__ . '/dbconn.php';

function getCustomerList() {
    global $conn;

    $query = "SELECT * FROM activity";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        while ($res = mysqli_fetch_assoc($query_run)) {
            $data[] = $res;
        }

        return json_encode($data);
    }
}
?>
