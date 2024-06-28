//    BOUTON MENU MOBILE

var switched = false;
let theMenuMobileButton = document.querySelector(".header-top-menu-mobile-btn");
console.log("theMenuMobileButton=", theMenuMobileButton);
let lines = document.querySelectorAll(".line");
console.log("lines=", lines);
let theMenuMobile = document.querySelector(".menu-mobile");
let theHamburger = theMenuMobileButton.innerHTML;
var theBuffer1 = 0;
/*theMenuMobileButton.addEventListener('click', function() {
    console.log("switch click!");
    if(switched === false) {
        lines.forEach((element) => element.classList.add("change"));
        theBuffer1 = theMenuMobileButton.clientHeight;
        switched = true;
    } else if(switched === true) {
        lines.forEach((element) => element.classList.remove("change"));
        switched = false;
    }
});*/
theMenuMobileButton.addEventListener('click', function() {
    console.log("switch click!");
    theMenuMobileButton.innerHTML = "";
    if(switched === false) {
      theMenuMobileButton.innerHTML = '<p class="cross_button">&#10005;</p>';
      theMenuMobile.style.display = "block";
      theBuffer = theMenuMobile.clientHeight;
      theMenuMobile.classList.add("appeared_from_above");
      switched = true;
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
let theContact = document.querySelector(".contact-btn");
let theModale = document.getElementById("contact-modale");
let theCross = document.querySelector(".close");
console.log("theContact=", theContact);
theContact.onclick = function() {
    theModale.style.display = "block";
    modale = true;
}
theCross.onclick = function() {
    console.log("fermeture!!!");
    theModale.style.display = "none";
    modale = false;
}
/*window.onclick = function(event) {
    if (modale == true && event.target != modale) {
        theModale.style.display = "none";
        modale = false;
    }
}*/

/*theContact.addEventListener('click', function() {
    console.log("contact click!");
    if(modale === false) {
        theContact.classList.add("modale-appearance");
        //theBuffer = theContact.clientHeight;
        modale = true;
    } else if(modale === true) {
        theContact.classList.remove("modale-appearance");
        switched = false;
    }
});*/