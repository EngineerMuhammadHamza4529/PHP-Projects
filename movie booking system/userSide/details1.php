 
<!-- card details k liye detail 1 ki file -->


<?php
require "config/config.php"
?>


<?php
require "header/nav.php"
?>;



<!-- card ka kam hai ye -->

<?php
$id = $_GET["id"];

// Single product query
$single_product_query = "SELECT * FROM `add_product` WHERE prod_id = :id";
$single_product_prepare = $connection->prepare($single_product_query);
$single_product_prepare->bindParam(':id', $id);
$single_product_prepare->execute();
$single_product = $single_product_prepare->fetch(PDO::FETCH_ASSOC);
// print_r($single_product);

// Related product query
// $related_products_query = "SELECT * FROM `add_product` WHERE Theater = :TheaterType AND prod_id != :id";
// $related_products_prepare = $connection->prepare($related_products_query);
// $related_products_prepare->bindParam(':TheaterType', $single_product['Theater']);
// $related_products_prepare->bindParam(':id', $id);
// $related_products_prepare->execute();
// $related_products = $related_products_prepare->fetchAll(PDO::FETCH_ASSOC);
// print_r($related_products);

// Cart




$theater_query = "SELECT
s.`show_id`,
s.`theater_id`,
s.`seats`,
s.`date`,
s.`timeslot`,
s.`movie_id`,
t.`theatre_id`,
t.`theatre_name`
FROM
`shows` s
INNER JOIN
`theatre` t ON s.`theater_id` = t.`theatre_id` WHERE s.`movie_id`= :movie_id";

$theater_prepare = $connection->prepare($theater_query);
$theater_prepare->bindParam(":movie_id", $id);
$theater_prepare->execute();

$theaters = $theater_prepare->fetchAll(PDO::FETCH_ASSOC);

print_r($theaters);







?>

<!-- card ka kam end -->
<style>
		.seatBtn {
			background-image: linear-gradient(0deg, #ff55a5 0%, #ff5860 100%);
			color: #fff;
			margin: 8px;
			border-radius: 10px 10px 0px 0px;
			/* width: 40px; */
			height: 40px;
			/* display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center; */

		}

		.disable {
			background-image: linear-gradient(0deg, #2f3542 0%, #222f3e 100%);
		}
	</style>

	<!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title"><?php echo $single_product['Title'] ?></h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="img/covers/<?php echo $single_product['prod_image']?>" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-star"></i><?php echo $single_product['rating']?></span>

										<!-- yaha pr cinema -->
									</div>

									<ul class="card__meta">
										<li><span>Genre:</span><?php echo $single_product['category']?></li>
										<li><span>Release year:</span><?php echo $single_product['Release_year']?></li>
										<li><span>Running time:</span><?php echo $single_product['duration']?></li>
										<li><span>Country:</span><?php echo $single_product ['industry'] ?> </li>
									<!-- </ul>

yaha pr descriptiom -->

									<div class="card__description card__description--details">
										<?php echo $single_product['description'] ?>
									</div>
								</div>
							</div>
							<!-- end card content -->
							
						</div>
					</div>
				</div>

				
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
					<!-- <video controls crossorigin playsinline poster="../../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player"> -->
						<!-- Video files -->
						<iframe width="560" height="315" src="<?php echo $single_product['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					

						<!-- Caption files -->
						<!-- <track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
						    default>
						<track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"> -->

						<!-- Fallback for browsers that don't support the <video> element -->
						<!-- <a href="" download>Download</a> -->
					<!-- </video> -->
				</div>
				<!-- end player -->



			</div>
		</div>
	</div>
	<!-- end pricing -->





				<div class="col-12">
					<div class="details__wrap">
						<!-- availables -->
						<div class="details__devices">
							<span class="details__devices-title">Available on devices:</span>
							<ul class="details__devices-list">
								<li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
								<li><i class="icon ion-logo-android"></i><span>Android</span></li>
								<li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
								<li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
							</ul>
						</div>
						<!-- end availables -->

						<!-- share -->
						<!-- <div class="details__share">
							<span class="details__share-title">Share with friends:</span>

							<ul class="details__share-list">
								<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
								<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
								<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
								<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
							</ul>
						</div> -->
						<!-- end share -->
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Discover</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Book Tickets</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a>
							</li>

							<!-- <li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a>
							</li> -->
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="Comments">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Book Tickets</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a></li>

									<!-- <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a></li> -->
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-12 col-xl-12">
					<!-- content tabs -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
							<div class="row">
								<!-- comments -->
								<div class="col-8">
									<h1 style="color:#fff;">Book Your Movie</h1>

										<form action="#" class="form">
										<input type="text" class="form__input" id="username"
												placeholder="Enter your Name">
												<select class="form__input" name="theater" id="theater">
												<option selected disabled>Select your Theater</option>
												<?php foreach ($theaters as $theater) { ?>
													<option value="<?= $theater['theatre_id'] ?>">
														<?= $theater['theatre_name'] ?>
													</option>
												<?php } ?>
											</select>
											<input type="hidden" id='movieId' value='<?php echo $id; ?>'>
											<select class="form__input" name="agelimit" id="agelimit">
												<option value="child">Select your age limit</option>
												<option value="child">Child (3 years to 12 years)</option>
												<option value="adult">Adult (13 years to onwards)</option>
											</select>
											<select class="form__input" name="date" id="date">
												<option value="">Select your Theater First</option>
												<!-- <option value="03-10-2023">03-10-2023</option>
												<option value="04-12-2023">04-12-2023</option> -->
											</select>
											<select class="form__input" name="time" id="time">
												<option value="">Select your Date First</option>
												<!-- <option value="03:00-05:00">03:00-05:00</option>
												<option value="07:00-10:00">07:00-10:00</option> -->
											</select>
											<input type="hidden" value="<?php echo $_SESSION['userId'] ?>"
												class="form__input" id="userId">
											<!-- <input type="text" class="form__input" placeholder="">
											<input type="text" class="form__input" placeholder="">
											<textarea id="text" name="text" class="form__textarea" placeholder="Add comment"></textarea> -->
											<button type="button" class="form__btn" id='bookBtn'>Book Movie</button>
										</form>
								
								</div>
								<div class="col-4" id='seatsContainer'>
									<h3 style="color:#fff;">Select Theater and Date to see available seats:</h3>
						
								</div>
								<!-- end comments -->
							</div>
						</div>

						<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
							<div class="row">
								<!-- reviews -->
								<div class="col-12">
									<div class="reviews">
										<ul class="reviews__list">
											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="img/user.png" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>8.4</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>

											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="img/user.png" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>9.0</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>

											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="img/user.png" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>7.5</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>
										</ul>

										<form action="#" class="form">
											<input type="text" class="form__input" placeholder="Title">
											<textarea class="form__textarea" placeholder="Review"></textarea>
											<div class="form__slider">
												<div class="form__slider-rating" id="slider__rating"></div>
												<div class="form__slider-value" id="form__slider-value"></div>
											</div>
											<button type="button" class="form__btn">Send</button>
										</form>
									</div>
								</div>
								<!-- end reviews -->
							</div>
						</div>

						<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
							<!-- project gallery -->
							<div class="gallery" itemscope>
								<div class="row">
									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-1.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-1.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 1</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-2.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-2.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 2</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-3.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-3.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 3</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-4.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-4.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 4</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-5.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-5.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 5</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-6.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-6.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 6</figcaption>
									</figure>
									<!-- end gallery item -->
								</div>
							</div>
							<!-- end project gallery -->
						</div>
					</div>
					<!-- end content tabs -->
				</div>

				<!-- sidebar -->
				
				<!-- end sidebar -->
			</div>
		</div>
	</section>
	<!-- end content -->

	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<!-- footer list -->
				<div class="col-12 col-md-3">
					<h6 class="footer__title">Download Our App</h6>
					<ul class="footer__app">
						<li><a href="path/to/your/file.zip" download="YourFile.zip"><img src="img/Download_on_the_App_Store_Badge.svg" alt=""></a></li>
						<li><a href="path/to/your/file.zip" download="YourFile.zip"><img src="img/google-play-badge.png" alt=""></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Resources</h6>
					<ul class="footer__list">
						<li><a href="about.php">About Us</a></li>
						<!-- <li><a href="#">Pricing Plan</a></li> -->
						<li><a href="faq.php">Help</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Legal</h6>
					<ul class="footer__list">
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Security</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-12 col-sm-4 col-md-3">
					<h6 class="footer__title">Contact</h6>
					<ul class="footer__list">
						<li><a href="tel:+18002345678">+1 (800) 234-5678</a></li>
						<li><a href="mailto:support@moviego.com">support@flixgo.com</a></li>
					</ul>
					<ul class="footer__social">
						<li class="facebook"><a href="https://www.facebook.com/FlixGo-Online-Movies-09" target="_blank" rel="noopener noreferrer"><i class="icon ion-logo-facebook"></i></a></li>
						
						<li class="instagram"><a href="https://www.instagram.com/FlixGo-Online-Movies-09" target="_blank" rel="noopener noreferrer"><i class="icon ion-logo-instagram"></i></a></li>
						<li class="twitter"><a href="https://www.twitter.com/FlixGo-Online-Movies-09" target="_blank" rel="noopener noreferrer"><i class="icon ion-logo-twitter"></i></a></li>
						<li class="vk"><a href="https://www.vk.com/FlixGo-Online-Movies-09" target="_blank" rel="noopener noreferrer"><i class="icon ion-logo-vk"></i></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer copyright -->
				<div class="col-12">
					<div class="footer__copyright">
						<!-- <small><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></small> -->

						<ul>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
				<!-- end footer copyright -->
			</div>
		</div>
	</footer>
	<!-- end footer -->



	<!-- Root element of PhotoSwipe. Must have class pswp. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

		<!-- Background of PhotoSwipe. 
		It's a separate element, as animating opacity is faster than rgba(). -->
		<div class="pswp__bg"></div>

		<!-- Slides wrapper with overflow:hidden. -->
		<div class="pswp__scroll-wrap">

			<!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
			<!-- don't modify these 3 pswp__item elements, data is added later on. -->
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
			<div class="pswp__ui pswp__ui--hidden">

				<div class="pswp__top-bar">

					<!--  Controls are self-explanatory. Order can be changed. -->

					<div class="pswp__counter"></div>

					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

					<!-- Preloader -->
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>

				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>

				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/jquery.morelines.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		$(document).ready(function () {



			// Theater Dropdown variables
			let theaterDropdown = document.getElementById('theater');
			console.log(theaterDropdown)
			let theaterValue;
			theaterDropdown.addEventListener('change', () => {
				let dateDropdown = document.getElementById('date');
				let movieId = '<?php echo $id; ?>';
				theaterValue = theaterDropdown.value;

				console.log(theaterValue, movieId)

				$.ajax({
					url: 'bookingQuery/theaterDateQuery.php',
					type: 'post',
					data: {
						theaterValue: theaterValue,
						movieId: movieId
					},
					success: function (data) {
						dateDropdown.innerHTML = data;
						console.log(data);
					}

				})

			});

			// Date Dropdown variables
			let DateDropdown = document.getElementById('date');
			let DateValue;

			DateDropdown.addEventListener('change', () => {
				let timeDropdown = document.getElementById('time');
				// let seatsContainer = document.getElementById('seatsContainer');
				DateValue = DateDropdown.value;

				console.log(DateDropdown)

				// for time
				$.ajax({
					url: 'bookingQuery/theaterTimeQuery.php',
					type: 'post',
					data: {
						theaterValue: theaterValue,
						DateValue: DateValue
					},
					success: function (timeData) {
						timeDropdown.innerHTML = timeData;
						console.log(timeData);
					}

				})

				

			})




			// Time Dropdown variables
			let timeDropdown = document.getElementById('time');
			let currentSeatsData;
			let seatArray = [];

			timeDropdown.addEventListener('change', () => {
				let timeDropdown = document.getElementById('time');
				let seatsContainer = document.getElementById('seatsContainer');
				let timeValue = timeDropdown.value;

				console.log(timeValue)

				// for seats
				$.ajax({
					url: 'bookingQuery/theaterSeatsQuery.php',
					type: 'post',
					data: {
						theaterValue: theaterValue,
						DateValue: DateValue,
						timeValue: timeValue
					},
					success: function (seatsData) {
						currentSeatsData = seatsData;
						seatsContainer.innerHTML = seatsData;
						console.log(seatsData);

						$('.seatBtn').click(function () {
							const buttonValue = this.innerHTML;

							console.log([...this.classList].includes('disable'));
							// Check if the button is already disabled
							if ([...this.classList].includes('disable')) {
								// Remove the button value from the array
								seatArray = seatArray.filter(value => value !== buttonValue);

								// Remove the disabled attribute from the button
								$(this).removeClass('disable');
							} else {
								// Add the button value to the array
								seatArray.push(buttonValue);

								// Disable the button
								$(this).addClass('disable');
							}

							console.log(seatArray);
							return seatArray;
						});
					}

				})

				

			})





			




				let bookBtn = document.getElementById('bookBtn');

				bookBtn.addEventListener('click', function () {

					// input variables of booking form
					let username = document.getElementById('username').value;
					// let movieName = document.getElementById('movieName').value;
					// let movieId = document.getElementById('movieId').value;
					let theater = document.getElementById('theater').value;
					let agelimit = document.getElementById('agelimit').value;
					let date = document.getElementById('date').value;
					let time = document.getElementById('time').value;
					// let userId = document.getElementById('userId').value;
					// let bookingForm = document.getElementById('bookingForm');

					console.log(theater)


					if (seatArray.length == 0) {
						alert('Please select your seat');
					} else {
						$.ajax({
							url: 'bookingQuery/bookingQuery.php',
							type: 'post',
							data: {
								username: username,
								movieName: '<?php echo $single_product['Title'] ?>',
								movieId: '<?php echo $id ?>',
								seatArray: seatArray,
								theater: theater,
								agelimit: agelimit,
								date: date,
								time: time,
								userId: 19,
							},
							success: function (data) {
								// $('#result').html(data);
								console.log(data);
								// document.getElementById('bookingMessage').innerHTML = 'Your booking has been successfully processed';
								// username.value = '';
								// bookingForm.reset();
							}

						})
					}

			


					// e.target.reset();
				})


				















		});

	</script>
</body>

</html>