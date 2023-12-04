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
                            <p class="mb-0">Complain Done</p>
                            <h5 class="mb-0">867</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-task font-30 text-primary'></i>
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
                            <p class="mb-0">Need To Be Processed</p>
                            <h5 class="mb-0">867</h5>		
                        </div>
                        <div class="ms-auto"><i class='bx bx-error-circle font-30 text-info'></i>
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
                            <p class="mb-0">Complain Ongoing</p>
                            <h5 class="mb-0">867</h5>		
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
                            <p class="mb-0">Complain Cancel</p>
                            <h5 class="mb-0">867</h5>		
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
                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Order#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Complain</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                              <h6 class="mb-0 font-14">#OS-000354</h6>
                            </td>
                            <td>Gaspur Antunes</td>
                            <td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>Ongoing</div></td>
                            <td>June 10, 2020</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm radius-30 px-4" id="viewDetailsBtn">View Details</button>
                            </td>
                            
                            <!-- Modal -->
                            <div class="complain" id="termscomplain">
                                <div class="complain-content">
                                    <span class="close" id="closecomplain">&times;</span>
                                    <div class="terms-content">
                                        <div class="terms-card">
                                            <h2>Complain Detail</h2>
                                            <p>aksdkasdkkwdkaskd</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="/edit-complain" class="btn-primary"><i class='bx bxs-edit'></i></a>
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

<script>
    const complain = document.getElementById("termscomplain");
const viewDetailsButton = document.getElementById("viewDetailsBtn");
const closecomplainButton = document.getElementById("closecomplain");

viewDetailsButton.addEventListener("click", () => {
    complain.style.display = "block";
    document.body.style.overflow = "hidden"; // Prevent scrolling behind the complain
});

closecomplainButton.addEventListener("click", () => {
    complain.style.display = "none";
    document.body.style.overflow = "auto"; // Restore scrolling
});

window.addEventListener("click", (event) => {
    if (event.target === complain) {
        complain.style.display = "none";
        document.body.style.overflow = "auto"; // Restore scrolling
    }
});

</script>
@endsection