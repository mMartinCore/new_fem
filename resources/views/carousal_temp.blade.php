
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Tailwind CSS carousel slider with arrow and indicators.</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <link
      href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <!-- Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
  </head>

  <body>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://source.unsplash.com/user/erondu/3000x900"
            alt="image"
          />
        </div>
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://source.unsplash.com/collection/190727/3000x900"
            alt="image"
          />
        </div>
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://source.unsplash.com/collection/190728/3000x900"
            alt="image"
          />
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
      });
    </script>
  </body>
</html>








   
 <html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Tailwind css  carousel autoplay slider with arrow and indicators.</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <link
      href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <!-- Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
  </head>

  <body>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://source.unsplash.com/user/erondu/3000x900"
            alt="apple watch photo"
          />
        </div>
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://source.unsplash.com/collection/190727/3000x900"
            alt="apple watch photo"
          />
        </div>
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://source.unsplash.com/collection/190728/3000x900"
            alt="apple watch photo"
          />
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper('.mySwiper', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>
  </body>
</html>




<div class="container flex flex-wrap mx-auto">
    <div class="w-full p-2 rounded lg:w-1/3">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
    <div class="w-full p-2 rounded lg:w-1/3">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
    <div class="w-full p-2 rounded lg:w-1/3">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
    <div class="w-full p-2 rounded lg:w-1/3">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
    <div class="w-full p-2 rounded lg:w-1/3">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
    <div class="w-full p-2 rounded lg:w-1/3">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=989&q=80"
            alt="image">
    </div>
</div>
