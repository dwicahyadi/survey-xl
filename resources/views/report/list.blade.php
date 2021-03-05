@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary pb-5 overflow-hidden z-2">
        <div class="container z-2">
            <div class="row justify-content-center text-center pt-6">
                <div class="col-lg-12 col-xl-12">
                    <h1 class="display-2 mb-3">Survey List</h1>
                    <p class="lead px-md-6 mb-5">Here result summary from all surveys</p>
                </div>
            </div>

            @livewire('survey.survey-list')
        </div>
    </section>
@endsection
