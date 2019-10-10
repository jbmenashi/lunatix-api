<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
   protected $table = 'tickets';
   protected $fillable = array('ticket_api_id', 'ticket_name', 'ticket_category', 'ticket_venue', 'performer_id');

   protected $with = array('ticket_groups');

   public function ticket_groups()
   {
      return $this->hasMany('App\TicketGroup');
   }

}
