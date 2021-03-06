@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary pb-5 overflow-hidden z-2">
        <div class="container z-2">
            <div class="row justify-content-center text-center pt-6">
                <div class="col-lg-12 col-xl-12">
                    <h1 class="display-2 mb-3">Survey Summary</h1>
                    <p class="lead px-md-6 mb-2">Here result summary from all surveys</p>
                    <div class="shadow-inset p-4 rounded mb-4">
                        <a href="{{ route('report.export', request()->all()) }}">
                            <i class="fas fa-file-excel text-success mr-2"></i>
                            Download Survey Details as Excel File
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4">
                        @livewire('report.filter')
                    </div>
                </div>
            </div>

            @forelse($sections as $section)
                <h4 class="display-4">{{ $section->name }}</h4>
                <div class="row">
                    @foreach($section->questions as $question)
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow-soft">
                                <div class="card-body p-2 text-center">
                                    <h5 class="mt-4">{{ $question->text }}</h5>
                                    <small>Question type : {{ $question->type }}</small>
                                    @if($question->type == 'radio_button')
                                        @livewire('chart.pie-chart-form-question',['question_id'=>$question->id])
                                    @endif

                                    @if($question->type == 'input_number')
                                        @livewire('chart.stat-form-question',['question_id'=>$question->id])
                                    @endif

                                    @if($question->type == 'input_text')
                                        @livewire('chart.table-from-question',['question_id'=>$question->id])
                                    @endif

                                    @if($question->type == 'file')
                                        @livewire('chart.image-from-question',['question_id'=>$question->id])
                                    @endif

                                    <a href="{{ route('report.pivot', http_build_query(array_merge(request()->all(),['question_id'=>$question->id]))) }}">
                                        Show In PivotTable Mode
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @empty
                <h4>-</h4>
            @endforelse
        </div>
    </section>
@endsection
