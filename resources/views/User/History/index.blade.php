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
                            <p class="mb-0">Orders Done</p>
                            <h5 class="mb-0">867</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-message-square-check font-30 text-primary'></i>
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
                            <p class="mb-0">Orders Ongoing</p>
                            <h5 class="mb-0">867</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-message-square-error font-30 text-success'></i>
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
                            <p class="mb-0">Orders Cancel</p>
                            <h5 class="mb-0">867</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-message-square-x font-30 text-danger'></i>
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
                        <th>Orders Code</th>
                        <th>Name</th>
                        <th>Status</th> 
                        <th>Service Used</th>
                        <th>Adress</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                          <h6 class="mb-0 font-14">PCKP21</h6>
                        </td>
                        <td>Jhon Doe</td>
                        <td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>Ongoing</div></td>
                        <td>Pick Up</td>
                        <td>Luxemburg</td>
                        <td>21 August, 2023</td>                   
                        <td>
                            <div class="d-flex order-actions">
                                <a href="/edit-order" class="btn-primary"><i class='bx bxs-edit'></i></a>
                                <a href="" class="btn-danger" data-confirm-delete="true"><i class='bx bxs-trash'></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection