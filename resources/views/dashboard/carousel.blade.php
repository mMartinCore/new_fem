  <!-- Link to the file hosted on your server, -->
  <link rel="stylesheet" href="path-to-the-file/splide.min.css">
  <!-- or the one installed in node_modules directory, -->
  <link rel="stylesheet" href="node_modules/@splidejs/splide/dist/css/splide.min.css">
  <!-- or the reference on CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/themes/splide-sea-green.min.css"> -->
  <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/themes/splide-skyblue.min.css">



  <style>
 

/* .imgThird{
        background-color: #FF00FF;
background-image: url("images/services-01.png"); 
    } */

 
/* animation bg*/
.context {
    width: 100%;
    position: absolute;
    top:20vh;
    
}

.context h1{
    text-align: center;
    color: #fff;
    font-size: 20px;
}


.area{
    background: #FF00FF;  
    background: -webkit-linear-gradient(to left, #8f94fb, #FF00FF);  
    width: 100%;
    height:100vh;
    /*
    background: #4e54c8;  
    background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);  
    width: 100%;
    height:100vh;
    */
    
   
}

.circles{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li{
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
  /*  background: rgba(255, 255, 255, 0.2);*/
    background:rgb(239, 136, 225);
    animation: animate 25s linear infinite;
    bottom: -150px;
    
}

.circles li:nth-child(1){
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}


.circles li:nth-child(2){
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}

.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}

.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}

.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}

.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}

.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}

.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}

.circles li:nth-child(10){
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}



@keyframes animate {

    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }

    100%{
        transform: translateY(-1000px) rotate(720deg);
        opacity: 0;
        border-radius: 50%;
    }

}

.bg_pattern{
    
background-color: #eb08f7;
background-image: url("data:image/svg+xml,%3Csvg width='180' height='180' viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M81.28 88H68.413l19.298 19.298L81.28 88zm2.107 0h13.226L90 107.838 83.387 88zm15.334 0h12.866l-19.298 19.298L98.72 88zm-32.927-2.207L73.586 78h32.827l.5.5 7.294 7.293L115.414 87l-24.707 24.707-.707.707L64.586 87l1.207-1.207zm2.62.207L74 80.414 79.586 86H68.414zm16 0L90 80.414 95.586 86H84.414zm16 0L106 80.414 111.586 86h-11.172zm-8-6h11.173L98 85.586 92.414 80zM82 85.586L87.586 80H76.414L82 85.586zM17.414 0L.707 16.707 0 17.414V0h17.414zM4.28 0L0 12.838V0h4.28zm10.306 0L2.288 12.298 6.388 0h8.198zM180 17.414L162.586 0H180v17.414zM165.414 0l12.298 12.298L173.612 0h-8.198zM180 12.838L175.72 0H180v12.838zM0 163h16.413l.5.5 7.294 7.293L25.414 172l-8 8H0v-17zm0 10h6.613l-2.334 7H0v-7zm14.586 7l7-7H8.72l-2.333 7h8.2zM0 165.414L5.586 171H0v-5.586zM10.414 171L16 165.414 21.586 171H10.414zm-8-6h11.172L8 170.586 2.414 165zM180 163h-16.413l-7.794 7.793-1.207 1.207 8 8H180v-17zm-14.586 17l-7-7h12.865l2.333 7h-8.2zM180 173h-6.613l2.334 7H180v-7zm-21.586-2l5.586-5.586 5.586 5.586h-11.172zM180 165.414L174.414 171H180v-5.586zm-8 5.172l5.586-5.586h-11.172l5.586 5.586zM152.933 25.653l1.414 1.414-33.94 33.942-1.416-1.416 33.943-33.94zm1.414 127.28l-1.414 1.414-33.942-33.94 1.416-1.416 33.94 33.943zm-127.28 1.414l-1.414-1.414 33.94-33.942 1.416 1.416-33.943 33.94zm-1.414-127.28l1.414-1.414 33.942 33.94-1.416 1.416-33.94-33.943zM0 85c2.21 0 4 1.79 4 4s-1.79 4-4 4v-8zm180 0c-2.21 0-4 1.79-4 4s1.79 4 4 4v-8zM94 0c0 2.21-1.79 4-4 4s-4-1.79-4-4h8zm0 180c0-2.21-1.79-4-4-4s-4 1.79-4 4h8z' fill='%23d9d4aa' fill-opacity='0.36' fill-rule='evenodd'/%3E%3C/svg%3E");

}
  </style>

 
 

  <div id='splide' class="  mx-0 -mt-8  py-4 splide">
      <div class="splide__track">
          <ul class="splide__list">
              <li class="splide__slide  md:h-96   ml-6   ">
                <section class="    bg_pattern text-white   body-font  rounded-md ">
                      @include('dashboard/carousel1')  

 {{-- <div class="context">

   
</div>




<div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
    </div > --}} 
                  </section>

              </li>
              <li class="splide__slide md:h-96   ml-6 ">
                  <section class="text-gray-700 body-font rounded-md bg-site_color_hover ">
                      @include('dashboard/carousel3')   
                  </section> 
              </li>
              <li class="splide__slide  ml-6 md:h-96  ">
                <section class="flex flex-wrap items-center  rounded-md     ">
                        @include('dashboard/carousel2')  
                 </section>
              </li>
          </ul>

      </div>
  </div>










  <script>
document.addEventListener('DOMContentLoaded', function() {


    //option 1


    new Splide('.splide', {
        type: 'slider',
        //  autoWidth: true,
        // height   : '9rem', 
        autoHeight: true,
        // trimSpace: false,
        focus: 'center',
        speed: 2000,
        interval: 5000,
        rewind: true,
        autoplay: true,
        pauseOnHover: true,
        pauseOnFocus: true,
        easing: 'ease', //ease
        lazyLoad: 'nearby',
        // fixedHeight: '8rem',
        // fixedWidth: '12rem',
        // perPage:1,
        //  padding: 10,
        gap: 10,
        // heightRatio: 0.3,
        // trimSpace: false,
    }).mount();


    //option 2
    // new Splide( '.splide', {
    // 	type   : 'loop',
    //     gap:50,
    //     autoplay:true, 
    //     interval:5000, 
    //     speed:2000,
    //     autoHeight:true,
    // 	padding: {
    // 		right: '5rem',
    // 		left : '5rem',
    //         },
    //     } ).mount();


    //option3
    // new Splide( '.splide', {
    // 	type   : 'loop',
    //     gap:'1em',
    //     autoplay:true, 
    //     interval:5000, 
    //     speed:2000, 
    // 	cover  : true,
    // 	height : '8rem',
    // 	perPage: 4,
    //     } ).mount();




});
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.min.js"></script>