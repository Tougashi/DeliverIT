@extends('layouts.index')
@section('container')

<div class="page-content">
    {{-- <div class="row">
        <div class="mx-auto"> --}}
            <div class="card">
                <div class="card-body">
                    <div id="chart8"></div>
                </div>
            </div>
        {{-- </div>
    </div> --}}
<!--end page wrapper -->
    <div class="card radius-10">
        <div class="card-content">
            <div class="row row-group row-cols-1 row-cols-xl-5">
                <div class="col">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            @foreach($transactions as $trx)
                            <div>
                                <p class="mb-0">Total</p>
                                <p class="mb-0">Income</p>
                                <br>
                                <h4 class="mb-0">$ {{ $trx->totalCost }}</h4>
                            </div>
                            <div class="ms-auto"><i class="bx bx-wallet font-35 text-primary"></i>
                            </div>
                            @endforeach
                        </div>
                        <br>
                        <p class="mb-0 font-13">{{ $trx->month }} ({{ $trx->year }})</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Total</p>
                                <p class="mb-0">Services</p>
                                <br>
                                <h4 class="mb-0">{{ $services }}</h4>
                            </div>
                            <div class="ms-auto"><i class="bx bx-cog font-35 text-danger"></i>
                            </div>
                        </div>
                        <br>
                        <p class="mb-0 font-13">+1 form last week</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Frequently Used Service</p>
                              <br>
                                <h4 class="mb-0">{{ $mostUsedVehicle }}</h4>
                            </div>
                            <div class="ms-auto"><i class="bx bx-refresh font-35 text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Most Active User</p>
                              <br>
                                <h4 class="mb-0">{{ $mostActiveUserRoleId2->firstName }}</h4>
                            </div>
                            <div class="ms-auto"><i class="bx bx-group font-35 text-info"></i>
                            </div>
                        </div>
                        <br>
                        <p class="mb-0 font-13">{{ $mostActiveUserRoleId2TransactionCount }} Transaction in September</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Most Active Courier</p>
                             <br>
                                <h4 class="mb-0">{{ $mostActiveUserRoleId3->firstName }}</h4>
                            </div>
                            <div class="ms-auto"><i class="bx bx-user-check font-35 text-success"></i>
                            </div>
                        </div>
                        <br>
                        <p class="mb-0 font-13">{{ $mostActiveUserRoleId3TransactionCount }} Transaction in September</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-7 col-xl-6 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div>
                        <h6>Top 5 Most Active Couriers</h6>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table align-items-center">
                        <tr>
                            <th class="text-light">.</th>
                            <th>Name</th>
                            <th>Total Trasanction</th>
                        </tr>
                        <tr>
                            <td><img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar"></td>
                            <td>{{ $mostActiveUserRoleId3->firstName }}</td>
                            <td class="text-success">{{ $mostActiveUserRoleId3TransactionCount }}</td>
                            <td><span class="" id="chart8"></span></td>
                        </tr>
                      </table>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-12 col-lg-5 col-xl-6 d-flex">
        <div class="card w-100 radius-10">
        <div class="card-header bg-transparent">
            <div class="d-flex align-items-center">
                <div>
                    <h6>Top 5 Most Active Users</h6>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table align-items-center">
                    <tr>
                        <th class="text-light">.</th>
                        <th>Name</th>
                        <th>Total Transaction</th>
                    </tr>
                    <tr>
                        <td><img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar"></td>
                        <td>{{ $mostActiveUserRoleId2->firstName }}</td>
                        <td class="text-success">{{ $mostActiveUserRoleId2TransactionCount }}</td>
                        <td><span class="" id="chart8"></span></td>
                    </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection