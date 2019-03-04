<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $text = $json->result->parameters->text;

    $con=mysqli_connect("localhost","root","","test");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if ($text == $text){
        $speech = "het werkt";
        $speech = mysqli_query($con,"SELECT desciption FROM address_table WHERE address = '$text' ");
    }
    else{
        $speech = "het werkt niet";
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
