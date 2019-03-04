<html>
<head>
    <title>Funnelbot</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<iframe
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/863f070f-d89a-46ee-b346-cf42658337ca">
</iframe>
</body>

<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $text = $json->result->parameters->text;

    switch ($text) {
        case 'hi':
            $speech = "Hi, Nice to meet you";
            break;

        case 'bye':
            $speech = "Bye, good night";
            break;

        case 'anything':
            $speech = "Yes, you can type anything here.";
            break;

        default:
            $speech = "Sorry, I didnt get that. Please ask me something else.";
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
</html>