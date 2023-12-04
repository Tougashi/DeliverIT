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
        <div class="ms-auto"><a href="/service" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bx-arrow-back"></i>Cancel</a></div>
    </div>
    <!--end breadcrumb-->
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="p-4 border rounded">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="validationTooltip01"  required>
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Vehicle</label>
                        <input type="text" class="form-control" id="validationTooltip01"required>
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Max Weight</label>
                        <input type="text" class="form-control" id="validationTooltip01"required>
                        <div class="valid-tooltip">Looks good!</div>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip01" class="form-label">Max Size</label>
                        <input type="text" class="form-control" id="validationTooltip01"required>
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