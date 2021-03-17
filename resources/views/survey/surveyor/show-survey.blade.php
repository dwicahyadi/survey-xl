@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary pb-5 overflow-hidden z-2">
        <div class="container ">
            <div class="row pt-6">
                <div class="col-lg-8 col-xl-8">
                    <h2 class="display-2">Show Survey</h2>
                    <h4>General</h4>
                    <div class="card shadow-soft mb-4">
                        <div class="card-body">
                            <div class="d-flex border-light border-bottom mb-2">
                                <div class="mr-2">
                                    <img src="https://ui-avatars.com/api/?background=random&name={{ $survey->outlet->name }}" class="rounded-circle" alt="{{ $survey->outlet->name }}" width="48">
                                </div>
                                <div class="flex-fill">
                                    <small>{{ $survey->outlet->msisdn }}</small>
                                    <h5>{{ $survey->outlet->name }}</h5>
                                    <h6>
                                        {{ $survey->outlet->type }}
                                        / {{ $survey->cluster->name }}
                                        / {{ $survey->outlet->micro_cluster }}
                                        / {{ $survey->outlet->city }}
                                    </h6>
                                </div>
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
                        <div class="card-footer d-flex">
                            <div class="mr-4">
                                <i class="fas fa-clock mr-2"></i>
                                <span title="survey time">{{ $survey->created_at }}</span>
                            </div>

                            <div class="mr-4">
                                <i class="fas fa-user mr-2"></i>
                                <span title="surveyor">{{ $survey->user->name }}</span>
                                <a href="{{ route('report.list.from-user',['user'=> $survey->user]) }}" title="related survey to this outlet">({{ $survey->user->surveys()->count() }})</a>
                            </div>

                            <div class="mr-2">
                                <i class="fas fa-book mr-2"></i>
                                <span title="other surveys">other surveys</span>
                                <a href="{{ route('report.list.from-outlet',['outlet'=> $survey->outlet]) }}" title="related survey to this outlet">({{ $survey->outlet->surveys()->count() }})</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-8 col-xl-8">
                    <h3>Responses</h3>
                    @forelse($survey_details as $section => $responses)
                        <h4>{{ $section }}</h4>
                        @forelse($responses as $response)
                            <div class="card my-4 shadow-soft">
                                <div class="card-header border-light border-bottom">
                                    <h4>{{ $response->question }}</h4>
                                </div>
                                <div class="card-body">
                                    @if($response->question_type == 'file')
                                        <img src="{{ asset('storage/survey/'.$response->response) }}" alt="">
                                    @else
                                        <div class="d-flex justify-content-between align-content-between">
                                            <span>{{ $response->response }}</span>
                                            @if($response->status == 'better')
                                                <span class="text-success p-2">
                                                <i class="fas fa-chevron-circle-up"></i> better
                                            </span>
                                            @elseif($response->status == 'worse')
                                                <span class="text-danger p-2">
                                                <i class="fas fa-chevron-circle-down"></i> worst
                                            </span>
                                            @else
                                                <span class="text-info p-2">
                                                <i class="fas fa-chevron-circle-right"></i> state
                                            </span>
                                            @endif

                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <span>No responses</span>
                        @endforelse
                    @empty
                        <div>
                            <h4 class="display-4">No question have been created in this section. Please add new one.</h4>
                        </div>
                    @endforelse
                    <hr>

                    <h4>Related to this Outlet</h4>
                    @if($prev)
                        <a href="{{ route('surveyor.show',['id'=>$prev->id]) }}" class="btn btn-primary btn-block mb-2"><< {{ $prev->created_at }} by {{ $prev->user->name }}</a>
                    @endif

                    @if($next)
                        <a href="{{ route('surveyor.show',['id'=>$next->id]) }}" class="btn btn-primary btn-block mb-2">{{ $next->created_at }} by {{ $next->user->name }} >></a>
                    @endif

                    <hr>

                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-block"><i class="fas fa-chevron-circle-left"></i> Back to list</a>
                </div>
            </div>
        </div>
    </section>
@endsection
