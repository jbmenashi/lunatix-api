<?php

use App\TicketGroup;
use App\Ticket;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;

class TicketGroupsTableSeeder extends Seeder
{
   public function run()
      {
         $tickets = Ticket::all()->pluck('ticket_api_id')->toArray();
         $client = new Client();
         foreach($tickets as $id) {
            $response = $client->request('GET', "api.sandbox.ticketevolution.com/v9/ticket_groups?event_id=$id", [
               'headers' => [
               'X-Token' => '5b3b82e7f7615ea7ec74894727641719'
               ]
            ]);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
            $json = json_decode($body, true);

            foreach($json['ticket_groups'] as $group) {
               $conn = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
               $sql = "SELECT id FROM tickets WHERE ticket_api_id=$id";
               $result = mysqli_query($conn, $sql);
               $row = mysqli_fetch_assoc($result);

               TicketGroup::create([
                  'ticket_group_api_id' => $group['id'],
                  'ticket_group_section' => $group['section'],
                  'ticket_group_quantity' => $group['quantity'],
                  'ticket_group_wholesale' => $group['wholesale_price'],
                  'ticket_id' => $row['id']
               ]);
            };

         }
      }
}
