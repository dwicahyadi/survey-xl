@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary">
        <div class="container">
            <div class="row justify-content-center text-center pt-6">
                <div class="col-lg-8 col-xl-8 col-md-12">
                    @livewire('survey.outlet-search')
                </div>
            </div>
        </div>
    </section>
@endsection
