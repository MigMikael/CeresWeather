<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;
//use GuzzleHttp\Client;
use App\Weather;

class BotController extends Controller
{
    public function testBot()
    {
        $access_token = 'QPsc4ilD6NPkDhWDvusiLj0qPgif+cC4a9t6OA/lA6N8fp5MnZS3NCIyoNhu6KrhADFj4wOET3ibdPUpZjAis5J6r6Jg1WqNj7aNyZG8EEziEZ6xectP6jGHAodORS4PhpN3GgVE8LNM6n9uShQnZwdB04t89/1O/w1cDnyilFU=';

        $url = 'https://api.line.me/v1/oauth/verify';

        $headers = array('Authorization: Bearer ' . $access_token);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        echo $result;
    }

    public function handleMessage(Request $request)
    {
        $events = $request->all();

        if (!is_null($events['events'])) {
            // Loop through each event
            foreach ($events['events'] as $event) {
                // Reply only when message sent is in 'text' format
                if ($event['type'] == 'message' && $event['message']['type'] == 'text') {

                    $text = $event['message']['text'];
                    $replyToken = $event['replyToken'];

                    if (strpos($text, 'อากาศ') !== false) {
                        $weather = Weather::all()->last();

                        $messages1 = [
                            'type' => 'text',
                            'text' => 'สวัสดี วันนี้อุณหภูมิสูงสุด ' . $weather->temp_max . ' C / ต่ำสุด ' . $weather->temp_min . ' C'
                        ];

                        $messages2 = [
                            'type' => 'text',
                            'text' => 'ความชื้น ' . $weather->humidity . ' % /ความชื้นจากเซนเซอร์ ' . $weather->humidity_sensor
                        ];

                        $messages3 = [
                            'type' => 'text',
                            'text' => 'เมฆ ' . $weather->clouds . '% /ความเร็วลมอยู่ที่ ' . $weather->wind_speed
                        ];

                        /*$messages4 = [
                            'type' => 'text',
                            'text' => $event['message']['type']
                        ];*/


                        $data = [
                            'replyToken' => $replyToken,
                            'messages' => [
                                $messages1,
                                $messages2,
                                $messages3,
                                //$messages4
                            ],
                        ];
                    }
                    elseif (strpos($text, 'รูป') !== false){
                        $plant = Plant::all()->last();

                        $messages1 = [
                            'type' => 'image',
                            'originalContentUrl' => 'https://ceresweather.herokuapp.com/bot/medium_original_image/'.$plant->id,
                            //'previewImageUrl' => 'https://ceresweather.herokuapp.com/bot/small_original_image/'.$plant->id
                            'previewImageUrl' => 'https://www.formfonts.com/files/1/9633/archicad-object-library-part-garden-tree-deciduous_small_FF_Model_ID9633_TreeDeciduous0611.jpg'

                        ];

                        $data = [
                            'replyToken' => $replyToken,
                            'messages' => [
                                $messages1
                            ],
                        ];
                    }
                    else {
                        $messages1 = [
                            'type' => 'text',
                            'text' => 'พูดอะไรเนี่ย เราฟังไม่รู้เรื่องเลย'
                        ];

                        $data = [
                            'replyToken' => $replyToken,
                            'messages' => [
                                $messages1
                            ],
                        ];
                    }

                    $url = 'https://api.line.me/v2/bot/message/reply';
                    $post = json_encode($data);

                    self::sendPostRequest($url, $post);
                }
            }
        }
        //echo 'OK';
    }

    public function sendPostRequest($url, $data)
    {
        $access_token = 'QPsc4ilD6NPkDhWDvusiLj0qPgif+cC4a9t6OA/lA6N8fp5MnZS3NCIyoNhu6KrhADFj4wOET3ibdPUpZjAis5J6r6Jg1WqNj7aNyZG8EEziEZ6xectP6jGHAodORS4PhpN3GgVE8LNM6n9uShQnZwdB04t89/1O/w1cDnyilFU=';
        $header = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_FOLLOWLOCATION => 1,
        ));

        $response = curl_exec($curl);
        //$data = json_decode($response, true);
        curl_close($curl);
    }

    public function testUrl()
    {
        $plant = Plant::all()->last();
        return url('api/bot/medium_original_image/'.$plant->id);
    }
}
