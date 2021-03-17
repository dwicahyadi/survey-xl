@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-soft">
        <div class="container">
            <div class="row justify-content-center text-center pt-4 mb-4">
                <div class="col-lg-8 col-xl-8">
                    <h1 class="display-2 mb-3">Profile</h1>
                    <p class="display-5">Manage your Profile Information</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section bg-soft">
        <div class="container">
            @livewire('profile',['user'=>Auth::user()])
        </div>
    </section>
@endsection
