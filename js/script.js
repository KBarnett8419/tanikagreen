$(document).ready(function(){
  $("#nav").addClass("js").before('<div id="menu">&#9776;</div>');
  	$("#menu").click(function(){
  		$("#nav").toggle();
  	});
  	$(window).resize(function(){
  		if(window.innerWidth > 768) {
  			$("#nav").removeAttr("style");
  		}

});


    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    var slideIndex = 0;
    showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 3000); // Change image every 3 seconds
}

});
