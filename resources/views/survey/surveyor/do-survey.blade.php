@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    @livewire('survey.do-survey',['outlet'=> $outlet ])
                </div>
            </div>
        </div>
    </section>
@endsection

