<?php

use Illuminate\Database\Seeder;
use App\TicketGroup;
use App\Ticket;
use App\Performer;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {
      Schema::disableForeignKeyConstraints();
      TicketGroup::truncate();
      Ticket::truncate();
      Performer::truncate();
      Schema::enableForeignKeyConstraints();
      $this->call(PerformersTableSeeder::class);
      $this->call(TicketsTableSeeder::class);
      $this->call(TicketGroupsTableSeeder::class);


      $data = Performer::all()->toJson();
      $array = json_decode($data, true);
      $f = fopen('output.csv', 'w');

      foreach ($array as $line) {
         $line_array = array($line['id']);
         array_push($line_array, $line['performer_api_id']);
         array_push($line_array, $line['performer_name']);
         foreach ($line['tickets'] as $ticket_array) {
            array_push($line_array, $ticket_array['id']);
            array_push($line_array, $ticket_array['ticket_api_id']);
            array_push($line_array, $ticket_array['ticket_name']);
            array_push($line_array, $ticket_array['ticket_category']);
            array_push($line_array, $ticket_array['ticket_venue']);
            foreach ($ticket_array['ticket_groups'] as $group_array) {
               array_push($line_array, $group_array['id']);
               array_push($line_array, $group_array['ticket_group_api_id']);
               array_push($line_array, $group_array['ticket_group_section']);
               array_push($line_array, $group_array['ticket_group_quantity']);
               array_push($line_array, $group_array['ticket_group_wholesale']);
            }
         }
         
         fputcsv($f, $line_array);
      }
   }
}
