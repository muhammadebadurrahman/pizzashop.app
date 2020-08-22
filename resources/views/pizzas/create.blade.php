@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="form">

            <form class="needs-validation" novalidate method="POST" action="/pizzas">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="type">Type</label>
                        <select id="type" name="type" class="form-control" required>
                            <option selected>Choose Pizza Type</option>
                            <option>Huwiine</option>
                            <option>Italian</option>
                            <option>Ameriac</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="base">Base</label>
                        <select  name="base" id="base" class="form-control" required>
                            <option selected>Choose Pizza Base</option>
                            <option>Thin</option>
                            <option>Normal</option>
                            <option>Thik</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label><strong>Extra Toppings</strong></label>
                        <div class="custom-control custom-checkbox">
                            <input name="toppings[]" type="checkbox" class="custom-control-input" value="mashrooms" id="mashrooms">
                            <label class="custom-control-label" for="mashrooms">Mashrooms</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input name="toppings[]" type="checkbox" class="custom-control-input" value="onions" id="onions">
                            <label class="custom-control-label" for="onions">Onions</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input name="toppings[]" type="checkbox" class="custom-control-input" value="letus" id="letus">
                            <label class="custom-control-label" for="letus">Letus</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input name="toppings[]" type="checkbox" class="custom-control-input" value="hollopino" id="hollopino">
                            <label class="custom-control-label" for="hollopino">Hollopino</label>
                        </div>
                    </div>
                </div>

   
                <button type="submit" class="btn btn-primary">Order Now</button>

            </form>


        </div>

    </div>
</div>

@endsection
