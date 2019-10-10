<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Performer;
use GuzzleHttp\Client;

class PerformerController extends Controller
{
   public function index()
   {
      return Performer::all()->toArray();
      // write JSON to CSV here?
   }

   public function csv()
   {
      return Performer::all()->toArray();
   }

   public function show($id)
   {
      return Performer::find($id)->toArray();
   }

   public function store(Request $request)
   {
      return Performer::create($request->all());
   }
};
