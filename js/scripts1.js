//    BOUTON MENU MOBILE

var switched = false;
let theMenuMobileButton = document.querySelector(".header-top-menu-mobile-btn");
console.log("theMenuMobileButton=", theMenuMobileButton);
let lines = document.querySelectorAll(".line");
console.log("lines=", lines);
let theMenuMobile = document.querySelector(".menu-mobile");
let theHamburger = theMenuMobileButton.innerHTML;
var theContact = document.querySelector(".contact-btn");
var theBuffer1 = 0;

// MENU MOBILE

theMenuMobileButton.addEventListener('click', function() {
    console.log("switch click!");
    theMenuMobileButton.innerHTML = "";
    if(switched === false) {
      theMenuMobileButton.innerHTML = '<p class="cross_button">&#10005;</p>';
      theMenuMobile.style.display = "flex";
      theMenuMobile.classList.add("appeared_from_above");
      theBuffer1 = theMenuMobile.clientHeight;
      theContact = document.querySelector(".contact-btn-mobile");
      console.log("theContact=", theContact);
      switched = true;
      theContact.addEventListener('click', function() {
        if (modale === false) {
            console.log("Modale!!!");
            theModale.style.display = "block";
            modale = true;
        }
    });
    } else if(switched === true) {
      theMenuMobileButton.innerHTML = theHamburger;
      theMenuMobile.style.display = "none";
      theMenuMobile.classList.remove("appeared_from_above");
      switched = false;
    }
  });

//    MODALE

var theBuffer2 = 0;
var modale = false;
let theModale = document.getElementById("contact-modale");
let theCross = document.querySelector(".close");
console.log("theContact=", theContact);
theContact.addEventListener('click', function() {
    if (modale === false) {
        console.log("Modale!!!");
        theModale.style.display = "block";
        theBuffer2 = theModale.clientHeight;
        theModale.classList.add("modale-appearance");
        modale = true;
    }
});
window.onclick = function(event) {
    if (event.target == theModale) {
      theModale.style.display = "none";
      theModale.classList.remove("modale-appearance");
      modale = false;
    }
}
theContactSingle = document.querySelector(".single-contact-btn");
if (theContactSingle != null) {
  theContactSingle.addEventListener('click', function() {
    if (modale === false) {
        console.log("Modale!!!");
        theModale.style.display = "block";
        var theRef = document.querySelector(".single-ref-photo").textContent.substring(12, 18);
        console.log("theRef = ",theRef);
        $("#modale-ref-photo .wpcf7-form-control").val(theRef);
        modale = true;
    };
  });
};

//    NAVIGATION SINGLE

let thePrevArrow = document.querySelector(".prev-arrow");
let theNextArrow = document.querySelector(".next-arrow");
let thePrevThumb = document.querySelector(".prev-thumb");
let theNextThumb = document.querySelector(".next-thumb");
let theNoThumb = document.querySelector(".no-thumb");
if (thePrevArrow != null) {
  thePrevArrow.addEventListener("mouseenter", function() {
    console.log("prevvv");
    thePrevThumb.style.display = "block";
    theNextThumb.style.display = "none";
    theNoThumb.style.display = "none";
  });
  theNextArrow.addEventListener("mouseenter", function() {
    console.log("nexttttt");
    theNextThumb.style.display = "block";
    thePrevThumb.style.display = "none";
    theNoThumb.style.display = "none";
  });
};

// MASQUE INFORMATION PHOTO

window.onload = function() {
  var theOnePhotos = document.querySelectorAll(".one-photo");
  var theMasques = document.querySelectorAll(".masque-conteneur");
  var rectOnePhoto = null;

  $(document).on({
    mouseenter: function() {
      theOnePhotos = document.querySelectorAll(".one-photo");
      theMasques = document.querySelectorAll(".masque-conteneur");
      console.log("mouseenter on #" + $(this).data("q"));
      var q = $(this).data("q");
      console.log("neo-q =", q);
      rectOnePhoto = theOnePhotos[q].getBoundingClientRect();
      console.log(rectOnePhoto);
      theMasques[q].style.position = "absolute";
      theMasques[q].style.display = "block";
      theMasques[q].style.top = (rectOnePhoto.y + window.scrollY) + "px";
      theMasques[q].style.left = (rectOnePhoto.x + window.scrollX) + "px";
      theMasques[q].style.zIndex = 2;
    }
  }, ".one-photo");

  $(document).on({
    mouseleave: function() {
      console.log("mouseleave on #" + $(this).data("q"));
      var q = $(this).data("q");
      theMasques[q].style.display = "none";
    }
  }, ".masque-conteneur");
};