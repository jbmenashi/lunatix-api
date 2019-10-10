<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TicketGroup;

class TicketGroupController extends Controller
{
   public function index()
   {
      return TicketGroup::all()->toArray();
   }

   public function show($id)
   {
      return TicketGroup::find($id)->toArray();
   }
};
