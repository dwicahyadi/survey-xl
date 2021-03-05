@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary pb-5 overflow-hidden z-2">
        <div class="container z-2">
            <div class="row justify-content-center text-center pt-6">
                <div class="col-lg-8 col-xl-8">
                    <h1 class="display-2 mb-3">Import Outlet</h1>
                    <p class="lead px-md-6 mb-5">Make sure thefile you uploadislesser than 1MB in size and as file type ".xlsx"</p>
                    <div class="my-2 p-2 rounded shadow-inset text-center">
                        <span class="display-5"><i class="fas fa-cloud-download-alt mr-2"></i> Download Excel template file HERE</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center pt-6">
                <div class="col-lg-8 col-xl-8">
                    <h4>Upload File</h4>
                    @livewire('import.outlet')
                </div>
            </div>
        </div>
    </section>
@endsection
