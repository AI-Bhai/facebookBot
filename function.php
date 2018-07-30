<?php
/**
 * Created by PhpStorm.
 * User: AI System
 * Date: 25-Jul-18
 * Time: 5:12 PM
 */
define('ACCESS_TOKEN','EAAM1FMH2el4BAOb3KNH607qYlNvwutLwlkCVSzFZAnvCWuJkJ01hj7ZBjjYVWapy2vsu8duXRNpltILrnz3dZC42WTWsJf9zBd5zVeBMMYTdFELskdOFXYtdZBbd8IF0FzaCOqzyZBDJua16JlpgOo4rNv5XGWNyE5Xb6CQxLZBsDJE8V2MZCpUcYTTAmrpNI0ZD',true);

function sendText($senderId,$answer){
    $response = [
        'recipient' => array(
            'id' => $senderId
        ),
        'message' => array(
            'text' => $answer
        )
    ];
    return $response;
}

function sendImage($senderId,$url){
    $response = [
        'recipient' => array(
            'id' => $senderId
        ),
        'message' => array(
            'attachment' => array(
                'type' => 'image',
                'payload' => array(
                    'url' => $url,
                    'is_reusable' => true
                )
            )
        )
    ];
    return $response;
}

function sendQuick($senderId,$message,$quick_message1,$quick_message2,$quick_message3  = FALSE,$quick_message4  = FALSE,$quick_message5  = FALSE){
    if($quick_message3 != FALSE && $quick_message4 == FALSE && $quick_message5 == FALSE){
        $response = [
            'recipient' => array(
                'id' => $senderId
            ),
            'message' => array(
                'text' => $message,
                'quick_replies' => array(
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message1,
                        'payload' => 'CALL1'
                    ),
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message2,
                        'payload' => 'CALL2'
                    ),
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message3,
                        'payload' => 'CALL3'
                    ),
                )
            )
        ];
    }
    elseif($quick_message3 != FALSE && $quick_message4 != FALSE && $quick_message5 == FALSE){
        $response = [
            'recipient' => array(
                'id' => $senderId
            ),
            'message' => array(
                'text' => $message,
                'quick_replies' => array(
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message1,
                        'payload' => 'CALL1'
                    ),
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message2,
                        'payload' => 'CALL2'
                    ),
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message3,
                        'payload' => 'CALL3'
                    ),
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message4,
                        'payload' => 'CALL4'
                    ),
                )
            )
        ];
    }elseif($quick_message3 != FALSE && $quick_message4 != FALSE && $quick_message5 != FALSE){
        $response = [
            'recipient' => array(
                'id' => $senderId
            ),
            'message' => array(
                'text' => $message,
                'quick_replies' => array(
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message1,
                        'payload' => 'CALL1'
                    ),
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message2,
                        'payload' => 'CALL2'
                    ),
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message3,
                        'payload' => 'CALL3'
                    ),
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message4,
                        'payload' => 'CALL4'
                    ),
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message5,
                        'payload' => 'CALL5'
                    ),
                )
            )
        ];
    }else{
        $response = [
            'recipient' => array(
                'id' => $senderId
            ),
            'message' => array(
                'text' => $message,
                'quick_replies' => array(
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message1,
                        'payload' => 'CALL1'
                    ),
                    array(
                        'content_type' => 'text',
                        'title' => $quick_message2,
                        'payload' => 'CALL2'
                    ),
                )
            )
        ];
    }

    return $response;
}

function postApi($response){
    $ch = curl_init('https://graph.facebook.com/v3.0/me/messages?access_token=' . ACCESS_TOKEN);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_exec($ch);
    curl_close($ch);
}


