<?php
/**
 * Created by PhpStorm.
 * User: AI System
 * Date: 25-Jul-18
 * Time: 2:38 PM
 */
    require_once 'function.php';

    if(isset($_GET['hub_mode']) && isset($_GET['hub_challenge']) &&  isset($_GET['hub_verify_token'])){
        if($_GET['hub_verify_token'] == 'pokemon'){
            echo $_GET['hub_challenge'];
            exit();
        }
    }
    $input = json_decode(file_get_contents('php://input'), true);
    $senderId = $input['entry'][0]['messaging'][0]['sender']['id'];
    $message = trim(strtolower($input['entry'][0]['messaging'][0]['message']['text']));
    $answer = "...";
    # ---- REPLY to user ----
    if($message ==  'hello'){
        $response = sendText($senderId,'Bhaiya');
    }
    if($message == 'image'){
        $response = sendImage($senderId,'https://www.gstatic.com/webp/gallery3/1.png');
    }
    if($message == 'how are you'){
        $response = sendQuick($senderId,'How are you','I am fine','I am ok','I am not ok','I have a pen');
    }
    
    postApi($response);

    http_response_code(200);

    /*
     * ---------------------------------------
     *
     *  Template for response
     *
     *  ---------------------------------------
     *
     *  1. Button URL
     *  2. Reply Post
     *  3. Share
     *  4. Buy
     *  5. Call
     *  6. Login
     *  7. Logout
     *  8. Play game
     *
     *  *In the docs, it said SDK can do it*
     *
    */