<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	{{-- <link rel="icon" href="{{ asset('/assets/images/logo/logo3.png') }}" type="image/png" /> --}}
	<!--plugins-->
	<link href="{{ asset('/assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
	<link href="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<link href="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css')}}" rel="stylesheet">
	<!-- loader-->
	<link href="{{ asset('/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ ('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap') }}" rel="stylesheet">
	<link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('/assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('/assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('/assets/css/header-colors.css') }}" />
	<title>{{ $title }} </title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		@include('Layouts.partials.index')
		<div class="page-wrapper">
				<div class="container">
					@yield('container')
					@include('sweetalert::alert')
				</div>
		</div>
	</div>
	<!--end wrapper-->
	
	<!--end switcher-->
	<script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
	<!--notification js -->
	<script src="{{ asset('/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
	<script src="{{ asset('/assets/plugins/notifications/js/notifications.min.js') }}"></script>
	<script src="{{ asset('/assets/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('/assets/js/app.js') }}"></script>
	<script src="{{ asset('/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	{{-- IMAGE UOLOADER --}}
	<script src="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
	</script>
	<!-- highcharts js -->
	<script src="{{ asset('assets/plugins/highcharts/js/highcharts.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/highcharts-more.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/variable-pie.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/solid-gauge.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/highcharts-3d.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/cylinder.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/funnel3d.js') }}"></script> 
	<script src="{{ asset('assets/plugins/highcharts/js/exporting.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/export-data.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/accessibility.js') }}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/highcharts-custom.script.js') }}"></script>

	{{-- SWEET ALERT --}}
	<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const deleteButtons = document.querySelectorAll('.btn-danger[data-confirm-delete]');
			
			deleteButtons.forEach(button => {
				button.addEventListener('click', function(event) {
					event.preventDefault();
					
					const targetUrl = this.getAttribute('href');
					
					Swal.fire({
						title: 'Konfirmasi',
						text: 'Anda yakin ingin menghapus?',
						icon: 'warning',
						showCancelButton: true,
						confirmButtonText: 'Ya, hapus',
						cancelButtonText: 'Batal',
					}).then((result) => {
						if (result.isConfirmed) {
							window.location.href = targetUrl;
						}
					});
				});
			});
		});
	</script>


</body>
</html>