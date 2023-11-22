<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $trains = Train::all();

        // $trains_ora = Train::select('Orario_di_partenza')->get();
        // dump($trains_ora);
        // dd(date('H:i:s'));
        // ->where('Orario_di_partenza','>=',date('H:i:s'))
        // ->where('date','>=',date("Y-m-d"))

        // $departing_trains = Train::whereRaw('DATEDIFF(date,current_date) > 0 AND !cancellato')->get();

        // dd(Train::select(Train::raw("CONCAT(date,' ',Orario_di_partenza) AS full_date"))->get());

        $departing_trains = Train::where('date','>=',date("Y-m-d"))
                                ->where('deleted',0)
                                ->get();

        return view("home", compact("trains","departing_trains"));
    }
}
