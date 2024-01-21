

$(function () {
    $('.dropdown ul li').on('click', function () {
      var label = $(this).parent().parent().children('label');
      label.attr('data-value', $(this).attr('data-value'));
      label.html($(this).html());

      $(this).parent().children('.selected').removeClass('selected');
      $(this).addClass('selected');
    });




	
document.getElementById('SA').onmouseover  = ()=> {
	document.querySelector('.svg-hover').innerHTML  = `<h1> <b style="color:#e30020">Saudi</b> Office </h1>`;
	document.querySelector('#map-details').innerHTML  = `
	<div class="get-in-touch pr-5 mt-5 mb-5">
					</div>
					<div class="phone-address d-flex flex-column mb-4">
						<h5 class="mb-0">Phone</h5>
						<a href="tel:+966 554 087661">
							<p>
								+966 554 087661
							</p>
						</a>
					</div>
					<div class="message-wrap d-flex flex-column mb-4">
						<h5 class="mb-0">Send Email:</h5>
						<a href="mailto:info@cloudsolutions.com.sa">
							<p>
								info@cloudsolutions.com.sa
							</p>
						</a>
					</div>
					<div class="location-wrap d-flex flex-column mb-4">
						<h5 class="mb-0">Address:</h5>
						<p> Kingdom of Saudi Arabia<br> P.O. Box 31462 Riyadh 11372 Uruba Road</p>
					</div> `;

};

document.getElementById('JO').onmouseover  = ()=> {
	document.querySelector('.svg-hover').innerHTML  = `<h1> <b style="color:#e30020">Jordan</b> Office </h1>`;
	document.querySelector('#map-details').innerHTML  = `
	<div class="get-in-touch pr-5 mt-5 mb-5">
					</div>
					<div class="phone-address d-flex flex-column mb-4">
						<h5 class="mb-0">Phone</h5>
						<a href="tel:+966 554 087881">
							<p>
								+966 554 087881
							</p>
						</a>
					</div>
					<div class="message-wrap d-flex flex-column mb-4">
						<h5 class="mb-0">Send Email:</h5>
						<a href="mailto:info@cloudsolutions.com.jo">
							<p>
								info@cloudsolutions.com.jo
							</p>
						</a>
					</div>
					<div class="location-wrap d-flex flex-column mb-4">
						<h5 class="mb-0">Address:</h5>
						<p> Jordan<br> P.O. Box 31462 Jordan 11372 Uruba Road</p>
					</div> `;


};

document.getElementById('LK').onmouseover  = ()=> {
	document.querySelector('.svg-hover').innerHTML  = `<h1> <b style="color:#e30020" >Srilanka</b> Office </h1>`;

	document.querySelector('#map-details').innerHTML  = `
	<div class="get-in-touch pr-5 mt-5 mb-5">
					</div>
					<div class="phone-address d-flex flex-column mb-4">
						<h5 class="mb-0">Phone</h5>
						<a href="tel:+966 554 087771">
							<p>
								+966 554 087771
							</p>
						</a>
					</div>
					<div class="message-wrap d-flex flex-column mb-4">
						<h5 class="mb-0">Send Email:</h5>
						<a href="mailto:info@cloudsolutions.com.sr">
							<p>
								info@cloudsolutions.com.sr
							</p>
						</a>
					</div>
					<div class="location-wrap d-flex flex-column mb-4">
						<h5 class="mb-0">Address:</h5>
						<p> SriLanka<br> P.O. Box 31462 Srilanka 11372 Uruba Road</p>
					</div> `;
};


  });
