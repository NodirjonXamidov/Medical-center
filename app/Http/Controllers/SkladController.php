<?php

namespace App\Http\Controllers;

use App\Models\apteka;
use App\Models\Client;
use App\Models\sklad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkladController extends Controller
{
    public function indexSklad(){
       return $sklad = sklad::all();
    }

public function buyApteka(Request $request){
    $request->validate([
        'client_id' => 'required',
        'apteka_id' => 'required',
        'count' => 'required',
        'amount' => 'required',
    ]);

    $client = Client::findOrFail($request->client_id);
    $apteka = Apteka::find($request->apteka_id);

    if (!$apteka) {
        return response()->json(['error' => "Apteka not found"],
         404);
    }

    if ($request->count > $apteka->count) {
        return response()->json(['error' => "Dori yetarli emas"], 
        400);
    }

    if ($apteka->count > 0) {
        $apteka->decrement('count', $request->count);
    } else {
        return response()->json([
            'message' => "Maxsulotimiz qolmagan, iltimos kuting!!!"
        ]);
    }

    sklad::create([
        'client_id' => $client->id,
        'apteka_id' => $apteka->id,
        'count' => $request->count,
        'amount' => $apteka->price * $request->count,  
    ]);


    $korsatilgan_Xizmatlar = sklad::where('client_id',$client->id)->count();
    $umumiy_summa = sklad::where('client_id', $client->id )->sum('amount');

    $countServices = sklad::where('client_id', $client->id)
        ->groupBy('apteka_id')
        ->selectRaw('apteka_id, count(*) as count')
        ->get();

    return response()->json([
        'message' => 'Xizmat korsatildi',
        'client'=>$client,
        'countServices'=>$countServices,
       'korsatilgan_Xizmatlar'=>$korsatilgan_Xizmatlar, 
        'umumiy_summa' => $umumiy_summa,
    ]);



}


}
