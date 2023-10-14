<?php



namespace App\Http\Controllers;

use App\Models\Termek;
use App\Models\Kosar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;





class KosarController extends Controller
{
    public function showCart()
    {
        $cartItems = Kosar::with('termek')->get();
        $cartTotal = DB::select('select SUM(price) as total_price from kosar')[0]->total_price;
        return view('show', ['cartItems' => $cartItems, 'cartTotal' => $cartTotal]);
    }
    



    public function addToCart(Request $request, $productId)
{
    $product = Termek::find($productId);

    if ($product) {
        $kosar = new Kosar();
        $kosar->termek_id = $product->id;
        $kosar->quantity = 1; // Módosíthatod a kívánt mennyiségre.
        $kosar->price = $product->price;
        $kosar->save();

        $cartCount = DB::select('select SUM(quantity) as total_quantity from kosar')[0]->total_quantity;
        $cartTotal = DB::select('select SUM(price) as total_price from kosar')[0]->total_price;
        

       return redirect()->back()->with(compact('cartCount', 'cartTotal'));
    }

    return redirect()->back();

    }


    public function showCartView(Request $request, $cartCount, $cartTotal)
    {
        return view('welcome', compact('cartCount', 'cartTotal', 'cartTotal'));
    }
}

    


