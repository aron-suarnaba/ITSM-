<div class="page-header d-print-none" aria-label="Page header">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="pre-title">
                    <ol class="breadcrumb" aria-label="breadcrumbs">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-1">
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Library</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="#">Data</a>
                        </li>
                    </ol>

                </h2>
                <h2 class="page-title">Ticket Review</h2>
            </div>

        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- <div class="row row-deck row-cards d-flex justify-content-center">
            <div class="col-sm-12 col-md-9">

            </div>
        </div> -->
        <div class="card">
            <div class="card-body p-0">
                <div id="table-default" class="table-responsive rounded">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><button class="table-sort" data-sort="sort-name">Name</button></th>
                                <th><button class="table-sort" data-sort="sort-city">City</button></th>
                                <th><button class="table-sort" data-sort="sort-type">Type</button></th>
                                <th><button class="table-sort" data-sort="sort-score">Score</button></th>
                                <th><button class="table-sort" data-sort="sort-date">Date</button></th>
                                <th><button class="table-sort" data-sort="sort-quantity">Quantity</button></th>
                                <th><button class="table-sort" data-sort="sort-progress">Progress</button></th>
                            </tr>
                        </thead>
                        <tbody class="table-tbody">
                            <tr>
                                <td class="sort-name">Steel Vengeance</td>
                                <td class="sort-city">Cedar Point, United States</td>
                                <td class="sort-type">RMC Hybrid</td>
                                <td class="sort-score">100,0%</td>
                                <td class="sort-date" data-date="1733619399">December 08, 2024</td>
                                <td class="sort-quantity">74</td>
                                <td class="sort-progress" data-progress="30">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-auto">30%</div>
                                        <div class="col">
                                            <div class="progress progress-2" style="width: 5rem">
                                                <div class="progress-bar" style="width: 30%" role="progressbar"
                                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                                                    aria-label="30% Complete">
                                                    <span class="visually-hidden">30% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
