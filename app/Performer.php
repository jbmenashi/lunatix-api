<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;

class Performer extends Model
{
   protected $table = 'performers';
   protected $fillable = array('performer_api_id', 'performer_name');

   protected $with = array('tickets');

   public function tickets()
   {
      return $this->hasMany('App\Ticket');
   }
}
