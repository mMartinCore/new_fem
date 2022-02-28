<footer class="text-gray-900 border-t body-font shadow-md bg-gray-100">
 
 @include('layouts/footer_content') 


 <!-- SCROLL ICON HERE FOR SCROLL TO TOP -->
 <div onclick="scrollToTop();" class="fixed scrollToTop  mr-36   bottom-0 right-0 z-10 flex items-end justify-end mb-12  " style="visibility: visible;">
            <a target="_blank" class=" block w-8 h-8  text-yellow-200 transition-all transform   duration-700 ease-in-out  rounded-full shadow hover:shadow-lg hover:scale-150 hover:rotate-360 ">
                <svg class="bg-site_color_theme rounded-full shadow-2xl "   viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
</svg>
            </a>
        </div>
        <script>
        document.querySelector('.scrollToTop').style.visibility = 'hidden';

        window.addEventListener("scroll", function(){
            scroll=window.scrollY;
            if (scroll>800) {               
                document.querySelector('.scrollToTop').style.visibility = 'visible'; 
            } else {
                document.querySelector('.scrollToTop').style.visibility = 'hidden';
            }
        }); 

        function scrollToTop() {
            var scrollToTop = window.setInterval(function() {
                var pos = window.pageYOffset;
                if (pos > 0) {
                    window.scrollTo(0, pos - 30); // how far to scroll on each step
                } else {
                    window.clearInterval(scrollToTop);
                }
            }, 16);
        }
        </script>



    </div>
</footer>













</main> 
</body> 
</html>