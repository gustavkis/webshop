<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Termek;
use App\Models\Kosar;
use Illuminate\Support\DB;

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
        $kosar->termek_id = $product->id;
        $kosar->quantity = 1; 
        $kosar->price = $product->price;
        $kosar->save();
    }

    return redirect()->back();
    }


}  
  

    


