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
                            <p class="mb-0">Total Users</p>
                            <h5 class="mb-0">{{ $totalUsers }}</h5>		
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
                            <p class="mb-0">Users Active</p>
                            <h5 class="mb-0">2</h5>		
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
                            <p class="mb-0">Users Deleted/Banned</p>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userData as $userId => $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['phoneNumber'] }}</td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{ route('delete.user', ['userId' => $userId]) }}" class="btn-danger" data-confirm-delete="true">
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
{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        var deleteButtons = document.querySelectorAll('[data-confirm-delete="true"]');

        deleteButtons.forEach(function (button) {
            button.addEventListener("click", function (event) {
                event.preventDefault();
                var userId = this.getAttribute("data-user-id");

                // Tampilkan SweetAlert2 untuk konfirmasi
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus pengguna ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Kirim permintaan DELETE dengan JavaScript atau jQuery
                        // Misalnya, dengan menggunakan fetch API:
                        fetch('/delete-user/' + userId, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ganti dengan token CSRF yang sesuai
                            }
                        })
                        .then(function (response) {
                            if (response.ok) {
                                Swal.fire('Sukses', 'Pengguna berhasil dihapus.', 'success');
                                // Hapus elemen dari tabel
                                button.closest('tr').remove(); // Hapus baris dari tabel
                            } else {
                                Swal.fire('Gagal', 'Gagal menghapus pengguna.', 'error');
                            }
                        })
                        .catch(function (error) {
                            console.error('Error:', error);
                            Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus pengguna.', 'error');
                        });
                    }
                });
            });
        });
    });
</script> --}}


@endsection