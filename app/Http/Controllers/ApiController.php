<?php

namespace App\Http\Controllers;

use App\Performer;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
   public function performers()
   {
      $client = new Client();
      $response = $client->request('GET', 'api.sandbox.ticketevolution.com/v9/performers?category_id=20', [
         'headers' => [
            'X-Token' => '5b3b82e7f7615ea7ec74894727641719'
         ]  
      ]);
      $statusCode = $response->getStatusCode();
      $body = $response->getBody()->getContents();
      $json = json_decode($body, true);

      // for ($i = 0; $i < count($json['performers']); $i++) {
      //    Performer::create([
      //       'performer_api_id' => $json['performers'][$i]['id'],
      //       'performer_name' => $json['performers'][$i]['name']
      //    ]);
      // };
      return $json;
   }
   
   public function tickets()
   {
      $client = new Client();
      $response = $client->request('GET', 'api.sandbox.ticketevolution.com/v9/events?category_id=20', [
         'headers' => [
            'X-Token' => '5b3b82e7f7615ea7ec74894727641719'
         ]  
      ]);
      $statusCode = $response->getStatusCode();
      $body = $response->getBody()->getContents();
      $json = json_decode($body, true);
      return $json;
   }

   // public function ticket_groups()
   // {
   //    $client = new Client();
   //    $response = $client->request('GET', 'api.sandbox.ticketevolution.com/v9/performers?category_id=3', [
   //       'headers' => [
   //          'X-Token' => '5b3b82e7f7615ea7ec74894727641719'
   //       ]  
   //    ]);
   //    $statusCode = $response->getStatusCode();
   //    $body = $response->getBody()->getContents();
   //    $json = json_decode($body, true);
   //    return $json;
   // }
}
