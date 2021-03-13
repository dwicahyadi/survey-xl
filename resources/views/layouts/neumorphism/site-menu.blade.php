<ul class="navbar-nav navbar-nav-hover align-items-lg-center">
    <li>
        <a href="{{ route('dashboard') }}" class="nav-link" >
            <span class="nav-link-inner-text">Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link" data-toggle="dropdown" >
            <span class="nav-link-inner-text">Manage</span>
            <span class="fas fa-angle-down nav-link-arrow ml-2"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg">
            <div class="col-auto px-0" data-dropdown-content>
                <div class="list-group list-group-flush">
                    @can('manage all dealers')
                        <a href="{{ route('dealer.index') }}" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                            <span class="icon icon-sm icon-secondary"><span class="fas fa-file-alt"></span></span>
                            <div class="ml-4">
                                <span class="text-dark d-block">Dealer</span>
                                <span class="small">Manage dealers include their outlets and users</span>
                            </div>
                        </a>

                        <a href="{{ route('cluster.index') }}" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                            <span class="icon icon-sm icon-secondary"><span class="fas fa-map"></span></span>
                            <div class="ml-4">
                                <span class="text-dark d-block">Cluster</span>
                                <span class="small">Manage clusters</span>
                            </div>
                        </a>
                    @endcan

                    @can('manage questions')
                            <a href="{{ route('survey-question.index') }}" target="" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                                <span class="icon icon-sm icon-secondary"><span class="fas fa-comment-alt"></span></span>
                                <div class="ml-4">
                                    <span class="text-dark d-block">Question</span>
                                    <span class="small">Manage questions for surveys</span>
                                </div>
                            </a>
                        @endcan

                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link" data-toggle="dropdown" >
            <span class="nav-link-inner-text">Report</span>
            <span class="fas fa-angle-down nav-link-arrow ml-2"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg">
            <div class="col-auto px-0" data-dropdown-content>
                <div class="list-group list-group-flush">
                    <a href="{{ route('report.summary') }}" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                        <span class="icon icon-sm icon-secondary"><span class="fas fa-chart-pie"></span></span>
                        <div class="ml-4">
                            <span class="text-dark d-block">Summary</span>
                            <span class="small">Show summary from all surveys</span>
                        </div>
                    </a>
                    <a href="{{ route('report.list') }}" target="" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                        <span class="icon icon-sm icon-secondary"><span class="fas fa-comment-alt"></span></span>
                        <div class="ml-4">
                            <span class="text-dark d-block">History</span>
                            <span class="small">Show all survey history</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </li>


    <li class="nav-item dropdown">
        <a href="#" class="nav-link" data-toggle="dropdown" >
            <span class="nav-link-inner-text">Setting</span>
            <span class="fas fa-angle-down nav-link-arrow ml-2"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg">
            <div class="col-auto px-0" data-dropdown-content>
                <div class="list-group list-group-flush">
                    <a href="{{ route('setting.index') }}" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                        <span class="icon icon-sm icon-secondary"><span class="fas fa-cogs"></span></span>
                        <div class="ml-4">
                            <span class="text-dark d-block">Settings</span>
                            <span class="small">Clean up storage, reset application</span>
                        </div>
                    </a>
                    <a href="{{ route('setting.role') }}" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                        <span class="icon icon-sm icon-secondary"><span class="fas fa-user-lock"></span></span>
                        <div class="ml-4">
                            <span class="text-dark d-block">Roles</span>
                            <span class="small">Manage roles and <per></per>missions</span>
                        </div>
                    </a>
                    <a href="{{ route('setting.user') }}" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                        <span class="icon icon-sm icon-secondary"><span class="fas fa-users-cog"></span></span>
                        <div class="ml-4">
                            <span class="text-dark d-block">Users</span>
                            <span class="small">Manage all users</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>


    </li>
</ul>
