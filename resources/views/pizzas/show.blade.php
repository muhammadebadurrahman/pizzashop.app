@extends('layouts.app')

@section('content')
<ul>

    <li class="pizza-single">Order ID: {{ $pizza['id'] }}
        <ul>
            <li>Pizaa Base: {{ $pizza['base'] }} </li>
            <li>Pizaa Type: {{ $pizza['type'] }} </li>
            <li>Pizza For: {{ $pizza['name'] }} </li>
        </ul>
    </li>

</ul>

@endsection

