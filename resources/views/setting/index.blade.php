@extends('layouts.neumorphism')

@section('content')
    <section class="section section bg-soft">
        <div class="container">
            <div class="row justify-content-center text-center pt-4 mb-4">
                <div class="col-lg-8 col-xl-8">
                    <h1 class="display-2 mb-3">All Settings</h1>
                    <p class="display-5">Manage user for dealers and principles</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4 class="h4">Clean Up</h4>
                    <p class="description">When the survey application feels slow, try cleaning data that is no longer used</p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="mb-4 border-light border-bottom p-2">
                        <strong>Uploaded Images</strong>
                        <p>{{ number_format($folder_size/1048576,2) }} MB</p>
                        <form action="{{ route('setting.delete.old-uploaded-image') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-primary text-danger mr-2 mb-4" onclick="return confirm('Are you sure want to delete? This action can\'t be undone.')"><i class="fas fa-trash"></i> Delete Images Older than 1 month</button>
                        </form>

                        <form action="{{ route('setting.delete.all-uploaded-image') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-primary text-danger mr-2 mb-4" onclick="return confirm('Are you sure want to delete? This action can\'t be undone.')"><i class="fas fa-trash"></i> Delete All Images</button>
                        </form>

                    </div>

                    <div class="mb-4 border-light border-bottom p-2">
                        <strong>Survey records</strong>
                        <p>{{ number_format($surveys_count) }} surveys with {{ number_format($survey_responses_count) }} responses </p>
                        <form action="{{ route('setting.delete.old-surveys') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-primary text-danger mr-2 mb-4" onclick="return confirm('Are you sure want to delete? This action can\'t be undone.')">
                                <i class="fas fa-trash"></i> Delete Surveys Older than 1 month
                            </button>
                        </form>

                        <form action="{{ route('setting.delete.all-surveys') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-primary text-danger mr-2 mb-4" onclick="return confirm('Are you sure want to delete? This action can\'t be undone.')">
                                <i class="fas fa-trash"></i> Delete All Surveys
                            </button>
                        </form>

                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4 class="h4">Reset Application</h4>
                    <p class="description">If you need to start a new application and existing data is no longer needed.</p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="mb-4 border-light border-bottom p-2">
                        <strong>Delete Questions</strong>
                        <p>Delete all questions and sections</p>
                        <form action="{{ route('setting.delete.all-questions') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-primary text-danger mr-2 mb-4" onclick="return confirm('Are you sure want to delete? This action can\'t be undone.')">
                                <i class="fas fa-trash"></i> Delete All Questions
                            </button>
                        </form>
                    </div>

                    <div class="mb-4 border-light border-bottom p-2">
                        <strong>Delete Dealers</strong>
                        <p>Delete all dealers include their users, outlets and related surveys</p>
                        <form action="{{ route('setting.delete.all-dealers') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-primary text-danger mr-2 mb-4" onclick="return confirm('Are you sure want to delete? This action can\'t be undone.')">
                                <i class="fas fa-trash"></i> Delete All Dealers
                            </button>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </section>
@endsection

