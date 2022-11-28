<?php

header("Content-Type:application/json");
if (isset($_GET['id']) && $_GET['id'] != "") {
    include('db.php');
    $id = $_GET['id'];
    $result = mysqli_query(
            $conn,
            "SELECT * FROM customers WHERE id=$id");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $custName = $row['custName'];
        $custEmail = $row['custEmail'];
        $custPhone = $row['custPhone'];
        $custAddress = $row['custAddress'];
        response($id, $custName, $custEmail, $custPhone, $custAddress);
        mysqli_close($conn);
    } else {
        response(NULL, NULL, 200, "No Record Found");
    }
} else {
    response(NULL, NULL, 400, "Invalid Request");
}

function response($id, $custName, $custEmail, $custPhone, $custAddress) {
    $response['id'] = $id;
    $response['custName'] = $custName;
    $response['custEmail'] = $custEmail;
    $response['custPhone'] = $custPhone;
    $response['custAddress'] = $custAddress;

    $json_response = json_encode($response);
    echo $json_response;
}

?>
