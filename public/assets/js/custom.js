$('.rooms-slider').owlCarousel({
  loop:true,
  margin:20,
  dots:false,
  nav:true,
  autoplay:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:3
      }
  }
})

const d = new Date();
let year = d.getFullYear();
document.querySelector(".update_year").innerHTML = year;