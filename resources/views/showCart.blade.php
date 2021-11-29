<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="/public" />
		<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
		<meta name="description" content="" />
		<meta name="author" content="" />
		<link
			href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
			rel="stylesheet"
		/>
		<link
			href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
			rel="stylesheet"
		/>

		<title>Klassy Cafe</title>

		<!-- Additional CSS Files -->
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/css/bootstrap.min.css"
		/>

		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />

		<link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css" />

		<link rel="stylesheet" href="assets/css/owl-carousel.css" />

		<link rel="stylesheet" href="assets/css/lightbox.css" />
	</head>
	<style></style>
	<body>
		<!-- ***** Preloader Start ***** -->
		<div id="preloader">
			<div class="jumper">
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
		<!-- ***** Preloader End ***** -->

		<!-- ***** Header Area Start ***** -->
		<header class="header-area header-sticky">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<nav class="main-nav">
							<!-- ***** Logo Start ***** -->
							<a href="index.html" class="logo">
								<img
									src="assets/images/klassy-logo.png"
									align="klassy cafe html template"
								/>
							</a>
							<!-- ***** Logo End ***** -->
							<!-- ***** Menu Start ***** -->
							<ul class="nav">
								<li class="scroll-to-section">
									<a href="{{ url('/') }}" class="active">Home</a>
								</li>
								<li class="scroll-to-section"><a href="#about">About</a></li>

								<li class="scroll-to-section"><a href="#menu">Menu</a></li>
								<li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
								{{--
								<li class="submenu">
									<a href="javascript:;">Features</a>
									<ul>
										<li><a href="#">Features Page 1</a></li>
										<li><a href="#">Features Page 2</a></li>
										<li><a href="#">Features Page 3</a></li>
										<li><a href="#">Features Page 4</a></li>
									</ul>
								</li>
								--}}
								<!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
								<li class="scroll-to-section">
									<a href="#reservation">Contact Us</a>
								</li>

								<!-- *** Cart navbar starts*** -->
								<li class="scroll-to-section">
									<style>
										.cart-link {
											background: #fb5849;
											width: 90px;
											text-align: center;
											border-radius: 5px;
										}
										.scroll-to-section a:hover {
											color: #232323;
										}
									</style>
									@auth
									<a
										href="{{ url('/showCart',Auth::user()->id) }}"
										class="cart-link"
									>
										Cart[{{ $count }}]
									</a>
									@endauth @guest
									<a
										href="{{ url('/showCart',Auth::user()->id) }}"
										class="cart-link"
									>
										Cart[]
									</a>
									@endguest
								</li>
								<!-- *** Cart navbar ends*** -->

								<li>
									@if (Route::has('login'))
									<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
										@auth
										<li>
											<x-app-layout> </x-app-layout>
										</li>
										@else
										<li>
											<a
												href="{{ route('login') }}"
												class="
													text-sm text-gray-700
													dark:text-gray-500
													underline
												"
												>Log in</a
											>
										</li>

										@if (Route::has('register'))
										<li>
											<a
												href="{{ route('register') }}"
												class="
													ml-4
													text-sm text-gray-700
													dark:text-gray-500
													underline
												"
												>Register</a
											>
										</li>
										@endif @endauth
									</div>
									@endif
								</li>
							</ul>

							<!-- ***** Menu End ***** -->
						</nav>
					</div>
				</div>
			</div>
		</header>
		<!-- ***** Header Area End ***** -->

        <!-- ***** Form starts **** -->
		<form action="{{ url('/confirmOrder') }}" method="POST" enctype="multipart/form-data">
            @csrf
			<div class="container mt-3" id="top" class="table-div">
				<h2 class="h1 mt-3 mb-3 uppercase">Your Carts</h2>
				<table class="table table-responsive-l">
					<tr class="table-row text-lg">
						<th class="">Food Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Action</th>
					</tr>

					@foreach ($data as $data)
					<tr class="table-row text-md">
						<td>
                            <input
                                type="text"
                                name="food_name[]"
                                value="{{ $data->title }}"
                                hidden>
                            {{ $data->title }}
                        </td>
						<td>
                            <input
                                type="text"
                                name="price[]"
                                value="{{ $data->price }}"
                                hidden>
                            ${{ $data->price }}
                        </td>
						<td>
                            <input
                                type="text"
                                name="quantity[]"
                                value="{{ $data->quantity }}"
                                hidden>
                            {{ $data->quantity }}
                        </td>
					</tr>
					@endforeach @foreach ($data2 as $data2)
					<td class="mb-3">
						<a
							href="{{ url('/removeFromCart',$data->id) }}"
							class="btn btn-danger"
							>Remove</a
						>
					</td>
					@endforeach
				</table>

				<div class="m-auto text-center">
					<button id="order" type="button" class="btn btn-primary">Order Now</button>
				</div>

				<div id="appear" style="display: ">
					<div class="m-auto">
						<div class="form-group">
							<label for="name">Name</label>
							<input
								type="text"
								class="form-control"
								name="name"
								id="name"
								aria-describedby="helpId"
								placeholder="Name"
							/>
							<small id="helpId" class="form-text text-muted"
								>input your name</small
							>
						</div>

						<div class="form-group">
							<label for="number">Phone</label>
							<input
								type="number"
								class="form-control"
								name="phone"
								id="name"
								aria-describedby="helpId"
								placeholder="Phone Number"
							/>
							<small id="helpId" class="form-text text-muted"
								>input your Phone Number</small
							>
						</div>

						<div class="form-group">
							<label for="address">Address</label>
							<input
								type="text"
								class="form-control"
								name="address"
								id="address"
								aria-describedby="helpId"
								placeholder="Address"
							/>
							<small id="helpId" class="form-text text-muted"
								>input your Address</small
							>
						</div>

						<div class="form-group">
							<input
								type="submit"
								class="btn btn-success"
								value="Comfirm Order"
							/>

							<button type="button" id="close" class="btn btn-info">Cancel Order</button>
						</div>
					</div>
				</div>
				<br />
				<br />
				<br />
			</div>
		</form>
		<script>
			$("#order").click(function () {
				$("$appear").show();
			});

			$("#close").click(function () {
				$("$appear").hide();
			});
		</script>

		<!-- jQuery -->
		<script src="assets/js/jquery-2.1.0.min.js"></script>
		<script src="assets/js/jquery-min.js"></script>

		<!-- Bootstrap -->
		<script src="assets/js/popper.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- Plugins -->
		<script src="assets/js/owl-carousel.js"></script>
		<script src="assets/js/accordions.js"></script>
		<script src="assets/js/datepicker.js"></script>
		<script src="assets/js/scrollreveal.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/imgfix.min.js"></script>
		<script src="assets/js/slick.js"></script>
		<script src="assets/js/lightbox.js"></script>
		<script src="assets/js/isotope.js"></script>

		<!-- Global Init -->
		<script src="assets/js/custom.js"></script>
		<script>
			$(function () {
				var selectedClass = "";
				$("p").click(function () {
					selectedClass = $(this).attr("data-rel");
					$("#portfolio").fadeTo(50, 0.1);
					$("#portfolio div")
						.not("." + selectedClass)
						.fadeOut();
					setTimeout(function () {
						$("." + selectedClass).fadeIn();
						$("#portfolio").fadeTo(50, 1);
					}, 500);
				});
			});
		</script>
	</body>
</html>
