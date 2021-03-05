@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-soft">
        <div class="container">
            <div class="row justify-content-center text-center pt-4 mb-4">
                <div class="col-lg-8 col-xl-8">
                    <h1 class="display-2 mb-3">Dealer</h1>
                    <p class="display-5">Manage Dealers</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    @livewire('dealer.form')
                </div>
                @livewire('dealer.grid')
            </div>
        </div>
    </section>
@endsection
