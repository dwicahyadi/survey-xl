<div>
    <div class="row justify-content-center text-center">
        <div class="col-lg-8 col-xl-8">
            <h3 class="display-4 mb-3">General Information</h3>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-lg-3">
            <div class="card shadow-soft border-light">
                <div class="card-body d-flex">
                    <div class="p-4">
                        <h2 class="display-2 mb-2">{{ number_format($dealersCount) }}</h2>
                        <h3 class="h4 text-black">Dealers</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card shadow-soft border-light">
                <div class="card-body d-flex">
                    <div class="p-4">
                        <h2 class="display-2 mb-2">{{ number_format($clustersCount) }}</h2>
                        <h3 class="h4 text-black">Clusters</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card shadow-soft border-light">
                <div class="card-body d-flex">
                    <div class="p-4">
                        <h2 class="display-2 mb-2">{{ number_format($outletsCount) }}</h2>
                        <h3 class="h4 text-black">Outlets</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card shadow-soft border-light">
                <div class="card-body d-flex">
                    <div class="p-4">
                        <h2 class="display-2 mb-2">{{ number_format($usersCount) }}</h2>
                        <h3 class="h4 text-black">Users</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center text-center pt-4">
        <div class="col-lg-8 col-xl-8">
            <h3 class="display-4 mb-3">Survey Information</h3>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-lg-12 mb-4">
            <div class="card shadow-soft border-light">
                <div class="card-header">
                    <strong class="card-title">Section and Question</strong>
                </div>
                <div class="card-body row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="p-4">
                            <h2 class="display-2 mb-2">{{ number_format($sectionsCount) }}</h2>
                            <h3 class="h4 text-black">Sections</h3>
                        </div>
                        <div class="p-4">
                            <h2 class="display-2 mb-2">{{ number_format($questionsCount) }}</h2>
                            <h3 class="h4 text-black">Questions</h3>
                        </div>
                        <a href="{{ route( 'survey-question.index') }}" class="px-8 border-light btn btn-primary btn-lg">Manage</a>

                    </div>

                    <div class="p-4 col-lg-8 col-sm-12" >
                        @livewire('chart.pie',['elementId'=>'sections_pie_chart','itemName'=>'Total questions for this section', 'title'=> '', 'data'=>$pieChartSectionData])
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

        </div>



    </div>
</div>
