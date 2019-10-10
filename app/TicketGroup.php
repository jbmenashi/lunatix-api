<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketGroup extends Model
{
   protected $table = 'ticket_groups';
   protected $fillable = array('ticket_group_api_id', 'ticket_group_section', 'ticket_group_quantity', 'ticket_group_wholesale', 'ticket_id');

}
