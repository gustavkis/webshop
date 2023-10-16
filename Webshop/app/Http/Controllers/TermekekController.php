<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Termek;
use App\Models\Kosar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TermekekController extends Controller
{
    



    public function showProduct(Request $request)
    {
    $termekek = Termek::all();
    $cartCount = $request->session()->get('cartCount', 0);
    $cartTotal = $request->session()->get('cartTotal', 0);

    return view('welcome', ['termekek' => $termekek, 'cartCount' => $cartCount, 'cartTotal' => $cartTotal]);
    }



    public function addToCart(Request $request, $productId)
    {
    $product = Termek::find($productId);

    if ($product) {
        $kosar = new Kosar();
        $kosar->name = $product->name;
        $kosar->termek_id = $product->id;
        $kosar->quantity = 1; 
        $kosar->price = $product->price;
        $kosar->save();

        $cartCount = DB::select('select SUM(quantity) as total_quantity from kosar')[0]->total_quantity;
        $cartTotal = DB::select('select SUM(price) as total_price from kosar')[0]->total_price;
        
        
        
        
    }

    return redirect()->back();
    }

    public function kepFeltoltes(Request $request)
{

    Log::info('kepFeltoltes metódus meghív');
    
    $id = $request->route('id');
    $termek = Termek::find($id);
    
    if (!$termek) {
        return redirect()->back()->with('hiba', 'A termék nem található');
    }

    
    if ($request->hasFile('kep')) {
        $file = $request->file('kep');
        
        
        $fileNev = time() . '_' . $file->getClientOriginalName();
        $eleresi_utvonal = $file->storeAs('kepek', $fileNev, 'public');
        
        
        $termek->picture = $eleresi_utvonal;
        $termek->save();

        return redirect()->back()->with('sikeres', 'Kép feltöltve!');
    } else {
        return redirect()->back()->with('hiba', 'Nem sikerült feltölteni a képet');
    }
}

    



}





  

    


