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
        $kosar->quantity = 1; 
        $kosar->price = $product->price;
        $kosar->save();

        $cartCount = DB::select('select SUM(quantity) as total_quantity from kosar')[0]->total_quantity;
        $cartTotal = DB::select('select SUM(price) as total_price from kosar')[0]->total_price;
        $productCount = DB::select('SELECT SUM(quantity) as total_quantity FROM kosar WHERE termek_id = ?', [$product->id]);
        
        
        $productTotalPrice = DB::select('SELECT SUM(price) as total_price FROM kosar WHERE termek_id = ?', [$product->id]);
        return redirect()->back()->with(compact('cartCount', 'cartTotal', 'productCount', 'productTotalPrice'));
       
    }

    return redirect()->back();

    }


    public function showCartView(Request $request, $cartCount, $cartTotal)
    {
        return view('welcome', compact('cartCount', 'cartTotal', 'cartTotal'));
    }
}

    


