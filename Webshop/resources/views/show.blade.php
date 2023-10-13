@extends('layouts.master')
@section('title', 'Kosár')

@section('content')
    <h2>Kosár tartalma</h2>
    @if ($cartItems->isEmpty())
        <p>A kosár üres.</p>
    @else
        <ul>
            @foreach ($cartItems as $item)
                <li>
                    Termék neve: {{ $item->termek->name }}
                    Mennyiség: {{ $item->quantity }}
                    Ár: {{ $item->price }}
                </li>
            @endforeach
        </ul>
    @endif
@endsection
