@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-soft">
        <div class="container">
            <div class="row justify-content-center text-center pt-4 mb-4">
                <div class="col-lg-8 col-xl-8">
                    <h1 class="display-2 mb-0">Dashboard Dealer</h1>
                    <h4 class="display-4 mb-3 text-facebook">{{ $dealer->name ?? 'dealer_name' }}</h4>
                </div>
            </div>

            @livewire('dashboard.admin',['dealer'=>$dealer])
        </div>
    </section>
@endsection
