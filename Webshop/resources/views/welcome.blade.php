@extends('layouts.master')
@section('title','Főoldal')

@section('content')    


<div class="container-fluid">
    
    <div class="row justify-content-end">
    
        <div class="col-4">
            <h2>Kosár tartalma</h2>
<p>Mennyiség: {{ $cartCount }}</p>
<p>Összesen: {{ $cartTotal }} Ft</p>

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
                <img src="..." class="card-img-top" alt="{{ $termek->picture }}">
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

@endsection


    
