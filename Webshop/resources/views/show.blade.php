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
               <th>Összesen</th>
               <th></th>
            </tr>
           </thead>
           <tbody>
           @foreach ($cartItems as $item)
           <tr>
           <td>{{ $item->termek->name }}</td>
           <td>{{ $item->quantity }}</td>
           <td>{{ $item->termek->price }}</td>
           <td> {{ $item->price }}</td>
           <td>
            <a href="" class="btn btn-sm btn-danger">Töröl</a>
           </td>
          
           </tr>
          @endforeach
          </tbody>
          <tfoot>
            <th colspan="2"></th>
            <th>Összesen:</th>
            <th > {{ $cartTotal }} </th>
            <th>Ft</th>
            
         </tfoot>
    </table>
   </div> 
   
   <div class="row justify-content-end">
      <div class="col-4">
  
        <p>  <a href={{ url()->previous() }} class="btn btn-success m-4">Vissza</a>
         <a href="" class="btn btn-success">Tovább</a>  </p>  
     
     
      </div>
  </div>
</div>

                    
@endsection
