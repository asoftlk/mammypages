// Header-Section
$(window).on("scroll", function() {
    if($(window).scrollTop() > 50) {
        $(".header-section").addClass("active-header");
    } else {
       $(".header-section").removeClass("active-header");
    }
});


$(".video-banner-img").find('video').click(function() {

	var $this = $(this);

	if(this.paused){
    	this.play();
    }else{
    	this.pause();
    }
	
});


$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var iframe = $(e.relatedTarget.hash).find('iframe'); 
    var src = iframe.attr('src');
    iframe.attr('src', '');
    iframe.attr('src', src);
s});



$(function(){
    $('#search').data('holder',$('#search').attr('placeholder'));
    $('#search').focusin(function(){
        $(this).attr('placeholder','');
    });
    $('#search').focusout(function(){
        $(this).attr('placeholder',$(this).data('holder'));
    });
})


// Animation-Js
AOS.init();


var lightBoxVideo = document.getElementById("VisaChipCardVideo");
var closeBtn = document.getElementById("boxclose-btn");


function lightbox_open() {
  document.getElementById('light').style.display = 'block';
  lightBoxVideo.play();
}

function lightbox_close() {
  document.getElementById('light').style.display = 'none';
  lightBoxVideo.pause();
}

function myFunction() {
  console.log("The video has ended");
  document.getElementById('light').style.display = 'none';
}


var lightBoxVideo_1 = document.getElementById("VisaChipCardVideo-1");
var closeBtn_1 = document.getElementById("boxclose-btn-1");

function lightbox_open_1() {
  document.getElementById('light-1').style.display = 'block';
  lightBoxVideo_1.play();
}

function lightbox_close_1() {
  document.getElementById('light-1').style.display = 'none';
  lightBoxVideo_1.pause();
}

function myFunction_1() {
  console.log("The video has ended");
  document.getElementById('light-1').style.display = 'none';
}

$('#faq').on('shown.bs.collapse', function () {
  var $this = $(this);
    $this.find('.btn-header-link').each(function(){
      console.log($(this).hasClass('collapsed'));
      if($(this).hasClass('collapsed')){
        $(this).find('i').addClass('icofont-minus').removeClass('icofont-plus');
      }else{
        $(this).find('i').removeClass('icofont-minus').addClass('icofont-plus');
      }
    });
});


(function() {
	'use strict';
	window.addEventListener('load', function() {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function(form) {
		form.addEventListener('submit', function(event) {
			if (form.checkValidity() === false) {
			event.preventDefault();
			event.stopPropagation();
			}
			form.classList.add('was-validated');
		}, false);
		});
	}, false);
})();


$('#testimonial-1').owlCarousel({
	loop: true,
	items: 3,
	margin: 30,
	autoplay: true,
	dots:true,
	nav:true,
	autoplayTimeout: 8500,
	smartSpeed: 450,
	navText: ['<i class="icofont-long-arrow-left"></i>','<i class="icofont-long-arrow-right"></i>'],
	responsive: {
		0: {
			items: 1
		},
		768: {
			items: 1
		},
		992: {
			items: 2
		},
		1170: {
			items: 2
		}
	}
});

$('#testimonial-2').owlCarousel({
	loop: true,
	items: 3,
	margin: 30,
	autoplay: true,
	dots:true,
	nav:true,
	autoplayTimeout: 8500,
	smartSpeed: 450,
	navText: ['<i class="icofont-long-arrow-left"></i>','<i class="icofont-long-arrow-right"></i>'],
	responsive: {
		0: {
			items: 1
		},
		768: {
			items: 1
		},
		1170: {
			items: 1
		}
	}
});


