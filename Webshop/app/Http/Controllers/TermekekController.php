<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Termek;

class TermekekController extends Controller
{
    

    public function showProduct()
    {
        $termekek = Termek::all(); 
        return view('welcome', ['termekek' => $termekek]);
     }


     

     public function addToCart(Request $request, $productId)
{
    $termek = Termek::find($productId);
    
    if ($termek) {
        // Növeld a kosárban lévő termékek számát
        if ($request->session()->has('cartCount')) {
            $cartCount = $request->session()->get('cartCount');
        } else {
            $cartCount = 0;
        }
        $cartCount++;
        $request->session()->put('cartCount', $cartCount);

        // Ellenőrizd, hogy van-e már kosár a session-ben
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        } else {
            $cart = [];
        }

        // Adj hozzá egy új terméket a kosárhoz
        $cart[] = $termek;

        // Mentsd el a kosarat és a kosárban lévő termékek számát a session-be
        $request->session()->put('cart', $cart);
        $request->session()->put('cartCount', $cartCount);
    }

    return redirect()->back();
}


     
     
     

     







}
