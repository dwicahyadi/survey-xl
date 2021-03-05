@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-soft">
        <div class="container">
            <div class="row justify-content-center text-center pt-4 mb-4">
                <div class="col-lg-8 col-xl-8">
                    <h1 class="display-2 mb-3">Dashboard</h1>
                    <p class="display-5"></p>
                </div>
            </div>

            @livewire('dashboard.index')
        </div>
    </section>
@endsection
