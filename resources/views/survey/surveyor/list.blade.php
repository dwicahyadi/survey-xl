@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary pb-5 overflow-hidden z-2">
        <div class="container ">
            <div class="row pt-6">
                <div class="col-lg-12 col-xl-12">
                    <h3 class="my-2 display-3">List Surveys</h3>
                    @livewire('survey.survey-list',['surveyor'=>1])
            </div>
        </div>
    </section>
@endsection
