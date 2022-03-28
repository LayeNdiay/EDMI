<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Novena- Health & Care Medical template</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('welcome/images/favicon.ico')}}" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('welcome/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{asset('welcome/plugins/icofont/icofont.min.css')}}">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{asset('welcome/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('welcome/plugins/slick-carousel/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('welcome/css/style.css')}}">

</head>

<body id="top">

<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container" >
			<span style="font-size: 20; font-weight: bold; margin-left:-50px;">UCAD</span>
		 	 <a class="navbar-brand" href="index.html">
			  	<img src="images/logo1.png" alt="" class="img-fluid" style="margin-left:10px;">
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="#">Home</a>
			  </li>
			   <li class="nav-item"><a class="nav-link" href="#">About</a></li>
			    <li class="nav-item"><a class="nav-link" href=" {{route('etudiant.showAllOffre')}} ">Voir les Appels d'offres</a></li>

			    <li class="nav-item dropdown">
					<a class="nav-link " href="department.html" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Liste<i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown02">
						<li><a class="dropdown-item" href=" {{route('enseignant.voirListAuto')}} ">Etudiant autoriser à s'inscrire</a></li>
						<li><a class="dropdown-item" href=" {{route('enseignant.listInscrit')}} ">Etudiants inscrits</a></li>
					</ul>
			  	</li>

			   <li class="nav-item">
					<a class="nav-link " href="{{ route('login') }}" >Se connecter <i class="icofont-thin-down"></i></a>
	
			  	</li>
			   <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">S'inscrire</a></li>
			</ul>
		  </div>
		</div>
	</nav>
</header>
	



<!-- Slider Start -->
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">Educational solution</span>
					<h1 class="mb-3 mt-3">Ecole Doctorale Mathématiques Informatique</h1>
					
					<p class="mb-4 pr-5">L'Ecole doctorale mathématiques Informatique est une entité de Luniversité Cheikh Anta Diop de Dakar.....</p>
					<div class="btn-container ">
						<a href="appoinment.html" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">Admission <i class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
						<span>UCAD</span>
						<h4 class="mb-3">Présentation</h4>
						<p class="mb-4">L'Ecole doctorale mathématiques Informatique est une entité de l'Université cheikh Anta Diop de Dakar.</p>
						<a href="appoinment.html" class="btn btn-main btn-round-full">A propos...</a>
					</div>
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>EDMI</span>
						<h4 class="mb-3">Doctorats</h4>
						<p class="mb-4">L'Ecole doctorale mathématiques Informatique proprose des des thèses en cotutelles en partenariat avec L'Université.</p>
						<a href="appoinment.html" class="btn btn-main btn-round-full">Voir plus</a>
					</div>
				
					
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>Instituts</span>
						<h4 class="mb-3">Laboratoires</h4>
						<p>L'Ecole doctorale mathématiques Informatique dispose de laboratoires d'acceuil à ses doctorants.</p>
						<a href="appoinment.html" class="btn btn-main btn-round-full">Voir plus</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="section about">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4 col-sm-6">
				<div class="about-img">
					<img src="images/ucad.jpeg" alt="" class="img-fluid" >
					<img src="images/ucad2.jpeg" alt="" class="img-fluid mt-4">
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="about-img mt-4 mt-lg-0">
					<img src="images/ucad3.jpeg" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="about-content pl-4 mt-4 mt-lg-0">
					<h2 class="title-color">Université Cheikh Anta  <br>& Diop de Dakar</h2>
					<p class="mt-4 mb-5">L'Ecole doctorale mathématiques Informatique est une entité de Luniversité Cheikh Anta Diop de Dakar....</p>

					<a href="service.html" class="btn btn-main-2 btn-round-full btn-icon"> A propos<i class="icofont-simple-right ml-3"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="section testimonial-2 gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>En partenariat avec plus de 50 Universités</h2>
					<div class="divider mx-auto my-4"></div>
					<p>L'Ecole doctorale mathématiques Informatique propose des doctorats délivrés par plus de 50 pays.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 testimonial-wrap-2">
				<div class="testimonial-block style-2  gray-bg">
					<i class="icofont-quote-right"></i>

					<div class="testimonial-thumb">
						<img src="images/team/test-thumb1.jpg" alt="" class="img-fluid">
					</div>

					<div class="client-info ">
						<h4>Télécommunication & réseaux</h4>
						<span>Idy Diop</span>
						<p>
							Professeur titulaire à L'Ecole supérieure Polytechnique, spécialiste en Télécommunication réseaux, en IA, .....
						</p>
					</div>
				</div>

				<div class="testimonial-block style-2  gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/test-thumb2.jpg" alt="" class="img-fluid">
					</div>

					<div class="client-info">
						<h4>UML expert </h4>
						<span>Alhassane BA</span>
						<p>
							Professeur titulaire à L'Ecole Supérieure Polytechnique 
						</p>
					</div>
					
					<i class="icofont-quote-right"></i>
				</div>

				<div class="testimonial-block style-2  gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/test-thumb3.jpg" alt="" class="img-fluid">
					</div>

					<div class="client-info ">
						<h4>Télécommunication & réseaux</h4>
						<span>Idy Diop</span>
						<p>
							Professeur titulaire à L'Ecole supérieure Polytechnique, spécialiste en Télécommunication réseaux, en IA, .....
						</p>
					</div>
					
					<i class="icofont-quote-right"></i>
				</div>

				<div class="testimonial-block style-2  gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/test-thumb4.jpg" alt="" class="img-fluid">
					</div>

					<div class="client-info">
						<h4>UML expert </h4>
						<span>Alhassane BA</span>
						<p>
							Professeur titulaire à L'Ecole Supérieure Polytechnique 
						</p>
					</div>
					<i class="icofont-quote-right"></i>
				</div>

				<div class="testimonial-block style-2  gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/test-thumb1.jpg" alt="" class="img-fluid">
					</div>

					<div class="client-info ">
						<h4>Télécommunication & réseaux</h4>
						<span>Idy Diop</span>
						<p>
							Professeur titulaire à L'Ecole supérieure Polytechnique, spécialiste en Télécommunication réseaux, en IA, .....
						</p>
					</div>
					
					
					<i class="icofont-quote-right"></i>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- footer Start -->
<footer class="footer section gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<div class="logo mb-4">
						<img src="images/logo1.png" alt="" class="img-fluid">
					</div>
					<p>Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad eos obcaecati tenetur veritatis eveniet distinctio possimus.</p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item"><a href="https://www.facebook.com/themefisher"><i class="icofont-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://twitter.com/themefisher"><i class="icofont-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.pinterest.com/themefisher/"><i class="icofont-linkedin"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Instituts</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="#">ESP</a></li>
						<li><a href="#">ESMT</a></li>
						<li><a href="#">Falcuté des sciences et techniques</a></li>
						<li><a href="#">LITA</a></li>
						<li><a href="#">IRD</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Support</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="#">Terms & Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Company Support </a></li>
						<li><a href="#">FAQuestions</a></li>
						<li><a href="#">Company Licence</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget widget-contact mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Contact</h4>
					<div class="divider mb-4"></div>

					<div class="footer-contact-block mb-4">
						<div class="icon d-flex align-items-center">
							<i class="icofont-email mr-3"></i>
							<span class="h6 mb-0">Disponibilité for 24/7</span>
						</div>
						<h4 class="mt-2"><a href="tel:+23-345-67890">edmi@ucad.edu.sn</a></h4>
					</div>

					<div class="footer-contact-block">
						<div class="icon d-flex align-items-center">
							<i class="icofont-support mr-3"></i>
							<span class="h6 mb-0">Lundi to Vendredi : 08:30 - 18:00</span>
						</div>
						<h4 class="mt-2"><a href="tel:+23-345-67890">+33-456-65-88</a></h4>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-btm py-4 mt-5">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="copyright">
						&copy; Copyright Reserved to <span class="text-color">DIC 1 INFO</span> by <a href="" target="_blank">Raki Diallo</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="subscribe-form text-lg-right mt-5 mt-lg-0">
						<form action="#" class="subscribe">
							<input type="text" class="form-control" placeholder="Your Email adrress">
							<a href="#" class="btn btn-main-2 btn-round-full">S'abonner au newsletter</a>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<a class="backtop js-scroll-trigger" href="#top">
						<i class="icofont-long-arrow-up"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>

   

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="{{asset('welcome/plugins/jquery/jquery.js')}}"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="{{asset('welcome/plugins/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('welcome/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('welcome/plugins/counterup/jquery.easing.js')}}"></script>
    <!-- Slick Slider -->
    <script src="{{asset('welcome/plugins/slick-carousel/slick/slick.min.js')}}"></script>
    <!-- Counterup -->
    <script src="{{asset('welcome/plugins/counterup/jquery.waypoints.min.js')}}"></script>
    
    <script src="{{asset('welcome/plugins/shuffle/shuffle.min.js')}}"></script>
    <script src="{{asset('welcome/plugins/counterup/jquery.counterup.min.js')}}"></script>
    <!-- Google Map -->
    <script src="{{asset('welcome/plugins/google-map/map.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="{{asset('welcome/js/script.js')}}"></script>
    <script src="{{asset('welcome/js/contact.js')}}"></script>

  </body>
  </html>
   