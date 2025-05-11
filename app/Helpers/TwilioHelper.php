<?php

namespace App\Helpers;

use Twilio\Rest\Client;

class TwilioHelper
{
  public static function sendWhatsAppMessage($phone, $message)
  {
    $sid = env('TWILIO_SID');
    $token = env('TWILIO_AUTH_TOKEN');
    $twilio = new Client($sid, $token);

    $twilio->messages->create(
      $phone,
      [
        'from' => env('TWILIO_WHATSAPP_FROM'),
        'body' => $message
      ]
    );
  }
}
