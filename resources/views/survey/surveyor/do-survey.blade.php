@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    @livewire('survey.do-survey',['outlet_id'=>$outlet->id,'dealer_id'=>$outlet->dealer_id,'cluster_id'=>$outlet->cluster_id, ])
                </div>
            </div>
        </div>
    </section>
@endsection

