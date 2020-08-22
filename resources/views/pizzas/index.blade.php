@extends('layouts.app')

@section('content')
<div class="container">

    @if( session('msg') )
    <div class="row justify-content-center p-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session('msg') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif


    
    <div class="row justify-content-center py-3">

        @foreach( $pizzas as $pizza )
        <div class="col-md-12 mt-5">
            <div class="border border-dark rounded p-2 bg-warning">

                <h5 class="bg-dark p-3 text-warning rounded">Order ID: {{ $pizza['id'] }}</h5>
                <ul class="list-group">
                    <li class="list-group-item bg-dark text-light">Pizza For: {{ $pizza['name'] }} </li>
                    <li class="list-group-item">Pizaa Type: {{ $pizza['type'] }} </li>
                    <li class="list-group-item">Pizaa Base: {{ $pizza['base'] }} </li>
                    @if( $pizza['toppings'] )
                        <li class="list-group-item">Extra Toppings:
                            <ul>
                                @foreach( $pizza['toppings'] as $topping )
                                    <li>{{ $topping }}</li>
                                @endforeach
                            </ul>
                        </li>    
                    @endif
                    
                </ul>

            </div>
        </div>
        @endforeach

    </div>

    <div class="row justify-content-center py-3">
        {{ $pizzas->links() }}
    </div>




</div>
@endsection
