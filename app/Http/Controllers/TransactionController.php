<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Muolaja;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
public function service(Request $request){
    $request->validate([
        'client_id' => 'required',
        'muolaja_id' => 'required',
        'count' => 'required',
        'price' => 'required',
    ]);

    $client = Client::find($request->client_id);
    $muolaja = Muolaja::find($request->muolaja_id);

    if (!$muolaja) {
        return response()->json([
            'message' => 'Muolaja not found',
        ], 404);
    }
 
    $transaction = Transaction::create([
        'client_id' => $client->id,
        'muolaja_id' => $muolaja->id,
        'count' => $request->count,
        'price' => $muolaja->price
    ]);
    if($muolaja->name == 'ukol'){      
    $muolaja->update([
        'price' => $muolaja->price =+ 5000,
    ]);
}

    $korsatilgan_Xizmatlar = Transaction::where('client_id',$client->id)->count();
    $umumiy_summa = Transaction::where('client_id', $client->id )->sum('price');

    $countServices = Transaction::where('client_id', $client->id)
        ->groupBy('muolaja_id')
        ->selectRaw('muolaja_id, count(*) as count')
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
