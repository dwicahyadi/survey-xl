@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary pb-5 overflow-hidden z-2">
        <div class="container z-2">
            <div class="row justify-content-center text-center pt-6">
                <div class="col-lg-12 col-xl-12">
                    <h1 class="display-2 mb-3">Survey Questions</h1>
                    <p class="lead px-md-6 mb-5">Manage what user can do based their role</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <strong>Add New Section</strong>
                    @livewire('survey-question.section-form')
                    <hr>
                    <strong>Section List</strong>
                    @livewire('survey-question.section-list',['sections'=>$sections])
                </div>

                <div class="col-lg-8 col-xl-8">
                    <strong>Question List</strong>
                    @livewire('survey-question.question-list',['sections'=>$sections])
                </div>
            </div>
        </div>
    </section>
@endsection
