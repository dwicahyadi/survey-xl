@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-soft">
        <div class="container">
            <div class="row justify-content-center text-center pt-4 mb-4">
                <div class="col-lg-8 col-xl-8">
                    <h1 class="display-2 mb-3">Manage All User</h1>
                    <p class="display-5">Manage user for dealers and principles</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <strong>Add New</strong>
                    @livewire('setting.user-form')
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <strong>User List</strong>
                    @livewire('setting.user-list')
                </div>
            </div>
        </div>
    </section>
@endsection

