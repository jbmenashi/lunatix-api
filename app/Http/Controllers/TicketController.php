<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
   public function index()
   {
      return Ticket::all()->toArray();
   }

   public function show($id)
   {
      return Ticket::find($id)->toArray();
   }
};
