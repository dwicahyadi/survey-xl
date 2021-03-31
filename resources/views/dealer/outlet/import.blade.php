@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary pb-5 overflow-hidden z-2">
        <div class="container z-2">
            <div class="row justify-content-center text-center pt-6">
                <div class="col-lg-8 col-xl-8">
                    <h1 class="display-2 mb-3">Import Outlets</h1>
                    <p class="display-5">Manage outlet for <strong>{{ $dealer->name }}</strong></p>
                    <div class="my-2 p-2 rounded shadow-inset text-center">
                        <a href="{{ asset('formats/importoutlet_template.xlsx') }}" class="display-5"><i class="fas fa-cloud-download-alt mr-2"></i> Download Excel template file HERE</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center  pt-6">
                <div class="col-lg-8 col-xl-8">
                    <label>Upload File</label>
                    @livewire('dealer.import-outlet',['dealer_id'=>$dealer->id])
                </div>
            </div>
        </div>
    </section>
@endsection
