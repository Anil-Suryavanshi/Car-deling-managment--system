
//conect navbar
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}


//login-btn
document.querySelector('#login-btn').onclick = () =>{
    document.querySelector('.login-form-container').classList.toggle('active');
}

document.querySelector('#close-login-form').onclick = () =>{
    document.querySelector('.login-form-container').classList.remove('active');
}




//scrolling-activ-navbar
window.onscroll = () =>{

if(window.scrollY > 0){
    document.querySelector('.header').classList.add('active');
}
else{
    document.querySelector('header').classList.remove('active');
}

    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}


window.onload = () =>{

    if(window.scrollY > 0){
        document.querySelector('.header').classList.add('active');
    }
    else{
        document.querySelector('.header').classList.remove('active');
    }
    
    }


//vehicles-slider
    var swiper = new Swiper(".vehicles-slider", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop:true,
        grabCursor:true,
        centeredSlides:true,
        autoplay: {
            delay:2000,
            disableOnInteraction: false,
          },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          991: {
            slidesPerView: 3,
          },
        },
      });



//featured-slider
      var swiper = new Swiper(".featured-slider", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop:true,
        grabCursor:true,
        centeredSlides:true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
          },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          991: {
            slidesPerView: 3,
          },
        },
      });

      

//reviews-slider
      var swiper = new Swiper(".reviews-slider", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop:true,
        grabCursor:true,
        centeredSlides:true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
          },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          991: {
            slidesPerView: 3,
          },
        },
      });




  //home-slider
      let slideIndex = 0;

function showSlides() {
    const slides = document.querySelectorAll('.slide');
    
    slides.forEach((slide, index) => {
        slide.style.display = (index === slideIndex) ? 'block' : 'none';
    });

    slideIndex++;
    
    if (slideIndex >= slides.length) {
        slideIndex = 0; //this is for resit slider
    }
}

//slide-speed
setInterval(showSlides, 2000);