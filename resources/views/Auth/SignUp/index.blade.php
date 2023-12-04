<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>{{ $title }}</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<img src="assets/images/logo/logo-text.png" width="" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign Up</h3>
										<p>Already have an account? <a href="/">Sign in here</a>
										</p>
									</div>
									<div class="form-body">
										<form action="api/user" method="POST" class="row g-3">
											@csrf
											@if (session('success'))
											<div class="alert alert-success">
												{{ session('success') }}
											</div>
											@endif
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">First Name</label>
												<input name="firstName" type="text" class="form-control" id="inputFirstName" placeholder="Jhon" required>
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Last Name</label>
												<input name="lastName" type="text" class="form-control" id="inputLastName" placeholder="Deo" required>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Date of Birth</label>
												<input name="birthDate" type="date" class="form-control" id="inputdateAddress" placeholder="example@user.com" required>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Adress</label>
												<input name="adress" type="text" class="form-control" id="inputdateAddress" required>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input name="email" type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" required>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input name="password" type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" required>
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to
                                                        <a href="#" id="openModal">Terms & Conditions</a>
                                                    </label>
												</div>
                                                <!-- Modal -->
                                                <div class="modal" id="termsModal">
                                                    <div class="modal-content">
                                                        <span class="close" id="closeModal">&times;</span>
                                                        <div class="terms-content">
                                                            <h2>Terms & Conditions</h2>
                                                            <div class="scroll-box">
                                                                <!-- Isi dari Terms & Conditions -->
                                                                <p>DeliverIt Web App - Terms & Conditions</p>
                                                                <h6>By using DeliverIt's web application ("Application"), you agree to these Terms & Conditions. If you disagree, please do not use the Application.</h6>
                                                                <h6>1. Usage</h6>
                                                                <p>1.1 Only authorized DeliverIt admins can access the Application.</p>
                                                                <p>1.2 Keep your account info accurate and confidential.</p>
                                                                <h6>2. Content & Ownership</h6>
                                                                <p>2.1 All Application content (text, graphics, etc.) is DeliverIt's intellectual property.</p>   
                                                                <p>2.2 No modifying or reproducing content without written consent.</p>  
                                                                <h6>3. Data Privacy & Security</h6>
                                                                <p>3.1 Your use follows our Privacy Policy.</p>  
                                                                <p>3.2 Secure your account to prevent unauthorized access.</p>   
                                                                <h6>4. Usage Restrictions</h6>
                                                                <p>4.1 No illegal use.</p>
                                                                <p>4.2 No disrupting Application's functioning.</p>  
                                                                <h6>5. Termination</h6>
                                                                <p>5.1 We can suspend/terminate access without notice.</p>   
                                                                <p>5.2 Terminated accounts may lose data.</p>  
                                                                <h6>6. Warranty Disclaimer</h6>
                                                                <p>6.1 Application is "as is" without warranties.</p>                                                             
                                                                <h6>7. Liability Limits</h6>
                                                                <p>7.1 We're not liable for indirect, incidental damages.</p>                                                             
                                                                <h6>8. Governing Law</h6>
                                                                <p>8.1 These Terms follow Jurisdiction's laws.</p>   
                                                                <p>8.2 Disputes go to Jurisdiction's courts.</p>                                                        
                                                                <h5>You accept these Terms by using the Application.</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS--> 
	<script src="assets/js/app.js"></script>

    <script>
        const modal = document.getElementById("termsModal");
const openModalButton = document.getElementById("openModal");
const closeModalButton = document.getElementById("closeModal");

openModalButton.addEventListener("click", () => {
    modal.style.display = "block";
    document.body.style.overflow = "hidden"; // Prevent scrolling behind the modal
});

closeModalButton.addEventListener("click", () => {
    modal.style.display = "none";
    document.body.style.overflow = "auto"; // Restore scrolling
});

window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
        document.body.style.overflow = "auto"; // Restore scrolling
    }
});


    </script>


</body>

</html>