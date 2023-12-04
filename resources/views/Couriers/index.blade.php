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
  
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col">
            <div class="card radius-2 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Total Couriers</p>
                            <h5 class="mb-0">{{ $totalDrivers }}</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-group font-30 text-primary'></i>
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
                            <p class="mb-0">Couriers Active</p>
                            <h5 class="mb-0">1</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-user-check font-30 text-success'></i>
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
                            <p class="mb-0">Couriers Deleted/Banned</p>
                            <h5 class="mb-0">0</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-user-x font-30 text-danger'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Vehicle</th>
                        <th>Birth of Date</th>
                        <th>Adress</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userDrivers as $driversId => $drivers)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $drivers['name'] }}</td>
                            <td>{{ $drivers['email'] }}</td>
                            <td>{{ $drivers['phoneNumber'] }}</td>
                            <td>{{ $drivers['vehicleType'] }}</td>
                            <td>{{ $drivers['birthDate'] }}</td>
                            <td>{{ $drivers['address'] }}</td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{ route('delete.drivers', ['driversId' => $driversId]) }}" class="btn-danger" data-confirm-delete="true">
                                        <i class="bx bxs-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection