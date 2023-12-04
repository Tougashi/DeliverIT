@extends('Layouts.index')
@section('container')

<div class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">{{ $title }}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
            </nav>
        </div>
        <div class="ms-auto"><a href="/users" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bx-arrow-back"></i>Batal</a></div>
    </div>
    <!--end breadcrumb-->
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="p-4 border rounded">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Name</label>
                        <input type="text" class="form-control" id="validationTooltip01" value="Jhon Doe" required>
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip04" class="form-label">Status</label>
                        <select class="form-select" id="validationTooltip04" required>
                            <option selected disabled value="">Choose...</option>
                            <option class="text-success" value="">Active</option>
                            <option class="text-danger" value="">Banned</option>
                        </select>
                        <div class="invalid-tooltip">Please select a valid state.</div>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">Update Date</label>
                        <input type="date" class="form-control" id="validationTooltip02"required>
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection