@extends('layouts.master')
@section('title','Főoldal')

@section('content')    


<div class="container-fluid">
    
    <div class="row justify-content-end">
    
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <h2>A kosár tartalma</h2>
<p>Mennyiség: {{ $cartCount }} | Összesen: {{ $cartTotal }} Ft | <a href="{{ route('showCart') }}" class="btn btn-primary">
    <img src = "./IMG/cart-963.svg" alt="Basket" style='font-size:24px' > </a>
</p>

        </div>
    </div>    
</div>





<div class="container-fluid">
    @foreach ($termekek as $key => $termek)
        @if ($key % 3 === 0)
            <div class="row">
        @endif
        <div class="col-md-3 m-4">
            <div class="card">
                

                <img class="card-img-top" src="{{ asset(asset($termek->kep)) }}" alt="Termék képe">
               
                <div class="card-body">
                    <h6 class="card-title fw-bold text-primary">{{ $termek->name }}</h6>
                    <p class="card-text">{{ $termek->description }}</p>
                    <h3>Ár: {{ $termek->price }} Ft</h3>
                    <a href="{{ route('addToCart', ['productId' => $termek->id]) }}" class="btn btn-success">Kosárba</a>
                </div>
            </div>
        </div>
        @if (($key + 1) % 3 === 0 || $loop->last)
            </div>
        @endif
    @endforeach
</div>

<div>

    <form action="{{ route('kepFeltoltes', ['id' => $termek->id]) }}" method="POST" enctype="multipart/form-data">

        @csrf
       
        <input type="file" name="kep">
        
        <button type="submit">Feltöltés</button>
    </form>
    
    
    
    
</div>

@endsection


    
