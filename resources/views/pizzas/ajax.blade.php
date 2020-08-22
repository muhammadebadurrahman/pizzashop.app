

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="rwo">
        <div class="content-wrapper"></div>
    </div>
    <div class="row">
<form id="loadpost" action="/load" method="POST">
@csrf
        <button id="load-more" class="btn btn-primary">Load More</button>

</form>


    </div>
</div>


@endsection
