@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-primary pb-5 overflow-hidden z-2">
        <div class="container z-2">
            <div class="row justify-content-center text-center pt-6">
                <div class="col-lg-12 col-xl-12">
                    <h1 class="display-2 mb-3">Role and Permission</h1>
                    <p class="lead px-md-6 mb-5">Manage what user can do based their role</p>
                </div>
            </div>
            <div class="row pt-6">
                <div class="col-lg-6 col-xl-6">
                    @livewire('role-permission.role-form')
                    <hr>
                    @livewire('role-permission.role-list')
                </div>

                <div class="col-lg-6 col-xl-6">
                    @livewire('role-permission.permission-form')
                    <hr>
                    @livewire('role-permission.permission-list')
                </div>
            </div>
        </div>
    </section>
@endsection
