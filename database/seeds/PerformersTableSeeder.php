<?php

use App\Performer;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;

class PerformersTableSeeder extends Seeder
{
    public function run()
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

      for ($i = 0; $i < count($json['performers']); $i++) {
         
         Performer::create([
            'performer_api_id' => $json['performers'][$i]['id'],
            'performer_name' => $json['performers'][$i]['name']
         ]);
      };
    }
}
