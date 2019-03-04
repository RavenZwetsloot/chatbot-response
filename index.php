<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $text = $json->result->parameters->text;

    if ($text == $text){
        $speech = "het werkt";
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
