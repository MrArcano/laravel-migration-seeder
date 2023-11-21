<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $trains = Train::all();

        // $departing_trains = Train::whereRaw('DATEDIFF(date,current_date) > 0 AND !cancellato')->get();

        $departing_trains = Train::where('date','>=',date("Y-m-d"))
                                ->where('cancellato',0)
                                ->get();

        return view("home", compact("trains","departing_trains"));
    }
}
