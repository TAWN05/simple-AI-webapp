
<?php
require 'vendor/autoload.php'; // Ensure GeminiAPI SDK is installed

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $businessFocus = htmlspecialchars($_POST['businessFocus']);
    $demographic = htmlspecialchars($_POST['demographic']);
    $goals = htmlspecialchars($_POST['goals']);

    $prompt = "Act as a professional marketer and business adviser. " .
              "The main focus of this business is $businessFocus. " .
              "The current demographic for this business is $demographic. " .
              "Our main goals are $goals. " .
              "Create a detailed plan of how to reach our goals based on the three previous details, and create a small ad adhering to these goals and plans.";

    $client = new Client('xxxxxxxx'); // Replace 'GEMINI_API_KEY' with your actual API key

    try {
        $response = $client->geminiPro()->generateContent(new TextPart($prompt));
        echo nl2br(htmlspecialchars($response->text()));
    } catch (Exception $e) {
        echo "Error: " . htmlspecialchars($e->getMessage());
    }
}
?>
