<?php

use App\Ticket;
use App\Performer;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;

class TicketsTableSeeder extends Seeder
{
    public function run()
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

         for ($i = 0; $i < count($json['events']); $i++) {
            $performers = Performer::all()->pluck('performer_api_id')->toArray();
            
            for ($j = 0; $j < count($json['events'][$i]['performances']); $j++) {
               
               if (in_array($json['events'][$i]['performances'][$j]['performer']['id'], $performers)) {
         
                  $id = $json['events'][$i]['performances'][$j]['performer']['id'];
                  $conn = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
                  $sql = "SELECT id FROM performers WHERE performer_api_id=$id";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($result);
    
                  Ticket::create([
                     'ticket_api_id' => $json['events'][$i]['id'],
                     'ticket_name' => $json['events'][$i]['name'],
                     'ticket_category' => $json['events'][$i]['category']['name'],
                     'ticket_venue' => $json['events'][$i]['venue']['name'],
                     'performer_id' => $row['id']
                  ]);
               }
            }
            

         };
      }
}
