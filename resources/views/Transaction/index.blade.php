@extends('Layouts.index')
@section('container')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ $title }}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-2 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Total</p>
                            <h5 class="mb-0">0</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-notepad font-30 text-info'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-2 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Transaction Done</p>
                            <h5 class="mb-0">0</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-task font-30 text-primary'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Transaction Ongoing</p>
                            <h5 class="mb-0">2</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-timer font-30 text-success'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Transaction Cancel</p>
                            <h5 class="mb-0">0</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-task-x font-30 text-danger'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered" >
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Courier</th>
                            <th>Customer</th>
                            <th>Items</th>
                            <th>Weight</th>
                            <th>Distance</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>  
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->orderCode }}</td>
                            <td>{{ $transaction->user->getFirstNameByRoleId(1) }}</td> 
                            <td>{{ $transaction->user->getFirstNameByRoleId(2) }}</td> 
                            <td>{{ $transaction->items }}</td>
                            <td>{{ $transaction->weight }} Kg</td>
                            <td>{{ $transaction->distance }} Km</td>
                            <td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>Ongoing</div></td>
                            <td>{{ $transaction->created_at->format('d F Y') }}</td>
                            <td>${{ $transaction->cost }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection