@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary pb-5 overflow-hidden z-2">
        <div class="container ">
            <div class="row pt-6">
                <div class="col-lg-12 col-xl-12">
                    <h3 class="my-2 display-3">List Surveys</h3>
                    @forelse($surveys as $survey)
                        <a href="{{ route('surveyor.show',['id'=>$survey->id]) }}" class="mt-4">
                            <div class="card my-4 shadow-soft">
                                <div class="card-body border-bottom border-light">
                                    <small>{{ $survey->outlet->msisdn }}</small>
                                    <h5>{{ $survey->outlet->name }}</h5>
                                    <h6>
                                        {{ $survey->outlet->type }}
                                        / {{ $survey->cluster->name }}
                                        / {{ $survey->outlet->micro_cluster }}
                                        / {{ $survey->outlet->city }}
                                    </h6>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <span><i class="fas fa-clock mr-2"></i> {{ $survey->created_at }}</span>
                                    <span><i class="fas fa-user mr-2"></i> {{ $survey->user->name }}</span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <a href="">Create New</a>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
