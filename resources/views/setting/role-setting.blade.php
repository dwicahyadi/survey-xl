@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-soft">
        <div class="container">
            <div class="row justify-content-center text-center pt-4 mb-4">
                <div class="col-lg-8 col-xl-8">
                    <h1 class="display-2 mb-3">Manage Role and Permissions</h1>
                    <p class="display-5">Manage role and their permissions</p>
                </div>
            </div>

            <div class="row justify-content-center text-center pt-4 mb-4">
                <div class="col-lg-8 col-xl-8">
                    @livewire('setting.role-list')
                </div>
            </div>
        </div>
    </section>
@endsection

