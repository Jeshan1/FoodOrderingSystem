<!-- Footer -->
<footer class="text-center text-lg-start text-white py-4" style="background-color: #2F58CD; overflow: hidden;">
   
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <a href="" class="text-decoration-none text-white fs-4">Food Ordering System</a>
            </h6>
            <p>
              <img src="{{asset('image/Foodlogo3.png')}}" alt="Food logo" height="150" width="150">
            </p>
          </div>
          <!-- Grid column -->
    
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="/" class="text-decoration-none text-white foot_nav">Home</a>
            </p>
            <p>
              <a href="{{route('restaurants')}}" class="text-decoration-none text-white foot_nav">Restaurants</a>
            </p>
            <p>
              <a href="{{route('customerdetail')}}" class="text-decoration-none text-white foot_nav">Setting</a>
            </p>
            <p>
              <a href="/cartitems" class="text-decoration-none text-white foot_nav">Cart</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                       <map name="" class="">
                        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1R0C4OWIMoyK1ryq6kCZ7J2ndIEDuyLM&ehbc=2E312F" width="300" height="300"></iframe>
                       </map>
                      </div>
                      <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    {{-- <div class="text-center p-4 bg-primary mx-5 rounded-5 shadow-lg border-0"> --}}
      <div class="text-center">
        © {{date('Y')}} Copyright:
      <a class="text-decoration-none text-reset fw-bold" href="">Foodmandu.com</a> || 
      <a href="https://www.facebook.com/jection.jection.564/" class="text-decoration-none text-white">Powered By: <span class="fw-bold" style="font-size: 16px; color: #F1EBBB;">Jeshan Tiwari</span></a>
      </div>
      
    {{-- </div> --}}
    <!-- Copyright -->
  </footer>
  <!-- Footer -->