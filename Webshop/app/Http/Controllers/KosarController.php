<?php



namespace App\Http\Controllers;

use App\Models\Termek;
use App\Models\Kosar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;





class KosarController extends Controller
{
   public function showCart()
    {
        $cartItems = Kosar::with('termek')->get();
        return view('show', ['cartItems' => $cartItems]);
    }

    public function addToCart(Request $request, $productId)
    {
    Log::info('addToCart meghívva');
    
    $product = Termek::find($productId);
    Log::info('addToCart meghívva');

    if ($product) {
        $kosar = new Kosar();
        $kosar->termek_id = $product->id;
        $kosar->quantity = 1; 
        $kosar->price = $product->price;
        $kosar->save();

        
        if ($request->session()->has('cartCount')) {
            $cartCount = $request->session()->get('cartCount');
        } else {
            $cartCount = 0;
        }
        $cartCount++;
        $request->session()->put('cartCount', $cartCount);

        if ($request->session()->has('cartTotal')) {
            $cartTotal = $request->session()->get('cartTotal');
        } else {
            $cartTotal = 0;
        }
        $cartTotal += $product->price;
        $request->session()->put('cartTotal', $cartTotal);
        }
        return redirect()->back();
    }

    public function showCartView(Request $request)
    {
       Log::info('showCartView most');
    
       $cartCount = $request->session()->get('cartCount', 0);
       $cartTotal = $request->session()->get('cartTotal', 0);
       return view('welcome', compact('cartCount', 'cartTotal'));
    }


}

    


