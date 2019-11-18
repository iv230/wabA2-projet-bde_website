@extends('template_welcome')


@section('search_bar')
<div class="md-form mt-0">
    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
</div>
@endsection

@section('basket')
    <a href="#" class="m-link"><i class="fa fa-shopping-basket"></i> Panier</a>
@endsection



@yield('article')

@yield('shop')
