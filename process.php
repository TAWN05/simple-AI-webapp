<?php
// Include Composer's autoloader for loading dependencies
require 'vendor/autoload.php';

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

// Replace with your Gemini API key
$apiKey = 'I-cought-you-xxx';

// Instantiate the Gemini client
$client = new Client($apiKey);

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userInput = $_POST['userInput'];
    $response = $client->geminiPro()->generateContent(new TextPart($userInput));
    $output = htmlspecialchars($response->text()); // Safely handle special characters
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemini AI Response</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f7;
            color: #333;
        }
        .container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            width: 100%;
            max-width: 600px;
        }
        button {
            background-color: #007aff;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        button:hover {
            background-color: #005bb5;
        }
        h2 {
            margin-bottom: 20px;
        }
        pre {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 6px;
            overflow-x: auto;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Response from Gemini AI</h2>
        <pre><?php echo $output; ?></pre>
        <form action="index.html" method="get">
            <button type="submit">Ask Another Query</button>
        </form>
    </div>
</body>
</html>
