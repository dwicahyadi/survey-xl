@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary pb-5 overflow-hidden z-2">
        <div class="container ">
            <div class="row pt-6">
                <div class="col-lg-8 col-xl-8">


                    <h2 class="display-2">Show Survey</h2>
                    <h3>General</h3>
                    <div class="card card-body shadow-soft my-2">
                        <div class="form-group">
                            <label>Surveyor</label><br>
                            <strong>{{ $survey->user->name }}</strong>
                        </div>
                        <div class="form-group">
                            <label>Survey Date</label><br>
                            <strong><strong>{{ $survey->created_at }}</strong></strong>
                        </div>
                        <div class="form-group">
                            <label>PIC Name</label><br>
                            <strong>{{ $survey->pic_name }}</strong>
                        </div>
                        <div class="form-group">
                            <label>PIC Contact</label><br>
                            <strong>{{ $survey->pic_contact }}</strong>
                        </div>
                        <div class="form-group">
                            <label>Note</label><br>
                            <strong>{{ $survey->note }}</strong>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="col-lg-8 col-xl-8">
                    <h3>Responses</h3>
                    @forelse($survey->details as $response)
                        <div class="card my-4 shadow-soft" wire:key="response-{{ $response->id }}">
                            <div class="card-header border-light border-bottom">
                                <h4>{{ $response->question->text }}</h4>
                            </div>
                            <div class="card-body">
                                @if($response->question->type == 'file')
                                    <img src="{{ asset('storage/survey/'.$response->response) }}" alt="">
                                @else
                                    {{ $response->response }}
                                @endif
                            </div>
                        </div>
                    @empty
                        <div>
                            <h4 class="display-4">No question have been created in this section. Please add new one.</h4>
                        </div>
                    @endforelse
                    <hr>
                    <a href="{{ url()->previous() }}"><i class="fas fa-chevron-circle-left"></i> Back to list</a>
                </div>
            </div>
        </div>
    </section>
@endsection
