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
            <th colspan="3"></th>
            <th>Összesen:</th>
            <th >1000  Ft</th>
            
         </tfoot>
    </table>
   </div>   
</div>

                    
@endsection
