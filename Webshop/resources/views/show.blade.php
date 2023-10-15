@extends('layouts.master')
@section('title', 'Kosár')

@section('content')
   


<div class="container">
    <div class="row justify-content-center">
   
      <table class="table table-info table-striped table-hover">
        <thead>
           <tr>
              <th>Termék neve:</th>
              <th>Mennyiség</th>
              <th>Ár/darab</th>
              <th>Összérték</th>
              <th></th>
           </tr>
         </thead>
         
         <tbody>

          @php
          $products = [];
      @endphp
      @foreach ($cartItems as $item)
          @php
              $productKey = $item->termek->id;
              if (!array_key_exists($productKey, $products)) {
                  $products[$productKey] = [
                      'name' => $item->termek->name,
                      'quantity' => $item->quantity,
                      'price' => $item->termek->price,
                  ];
              } else {
                  $products[$productKey]['quantity'] += $item->quantity;
              }
          @endphp
      @endforeach
      
      @foreach ($products as $product)
          <tr>
              <td>{{ $product['name'] }}</td>
              <td>{{ $product['quantity'] }}</td>
              <td>{{ $product['price'] }}</td>
              <td>{{ $product['quantity'] * $product['price'] }}</td>
              <td>
                  <a href="" class="btn btn-sm btn-danger">Töröl</a>
              </td>
          </tr>
      @endforeach
         </tbody>

         <tfoot>
          <tr>
            <th colspan="2"></th>
            <th>Összesen:</th>
            <th > {{ $cartTotal }} </th>
            <th>Ft</th>
          </tr>
        </tfoot>





      </table>





 

    
    
    
    



      
        
    </div> 
   
   <div class="row justify-content-end">
      <div class="col-4">

        
  
        <p>  <a href={{ url()->previous() }} class="btn btn-success m-4">Vissza</a> <a href="" class="btn btn-success">Tovább</a> 
          </p>  
     
     
      </div>
  </div>
</div>

                    
@endsection
