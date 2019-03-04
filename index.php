<?php

$con=mysqli_connect("localhost","root","","test");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $text = $json->result->parameters->text;

    switch ($text) {
        case 'hi':
            $speech = mysqli_query($con,"SELECT * FROM test_table");
            break;

        case 'doei':
            $speech = "doei";
            break;

        case 'test':
            $speech = "ok";
            break;

        default:
            $speech = "default";
            break;
    }

    $response = new stdClass();
    $response->speech = $speech;
    $response->displayText = $speech;
    $response->source = "webhook";
    echo json_encode($response);
}
else
{
    echo "Method not allowed";
}

?>
