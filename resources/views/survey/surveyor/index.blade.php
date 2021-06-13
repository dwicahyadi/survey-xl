@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary pb-5 overflow-hidden z-2">
        <div class="container">
            @livewire('clock')
        </div>
        <div class="container z-2">
            <div class="row justify-content-center text-center pt-6">
                <div class="col-lg-6 col-xl-6">
                    <a href="{{ route('surveyor.new-survey') }}" class="mt-4">
                        <div class="card my-4 btn">
                            <div class="card-body row">
                                <div class="col-4">
                                    <img src="{{ asset('assets/img/illustrations/new_survey.svg') }}" alt="New Survey" class="img-fluid">
                                </div>
                                <div class="col-8 d-flex justify-content-center align-items-center">
                                    <h4 class="display-4">New Survey</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-xl-6">
                    <a href="{{ route('surveyor.list') }}" class="mt-4">
                        <div class="card my-4 btn">
                            <div class="card-body row">
                                <div class="col-4">
                                    <img src="{{ asset('assets/img/illustrations/new_survey.svg') }}" alt="New Survey" class="img-fluid">
                                </div>
                                <div class="col-8 d-flex justify-content-center align-items-center">
                                    <h4 class="display-4">Survey List</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
