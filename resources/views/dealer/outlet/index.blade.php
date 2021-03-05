@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-soft">
        <div class="container">
            <div class="row justify-content-center text-center pt-4 mb-4">
                <div class="col-lg-8 col-xl-8">
                    <h1 class="display-2 mb-3">Manage Dealer</h1>
                    <p class="display-5">Manage user for <strong>{{ $dealer->name }}</strong></p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <strong>Add New</strong>
                    @livewire('dealer.outlet-form',['dealerId'=>$dealer])
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <strong>Outlet List</strong>
                    @livewire('dealer.outlet-list',['dealerId'=>$dealer->id])
                </div>


            </div>
        </div>
    </section>
@endsection

