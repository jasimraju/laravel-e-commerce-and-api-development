<!--------- Footer area---------------->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col footer-logo-area">
       {!!image_compnent($metadata['app_setting']->applog,'img-fluid')!!}  
      </div> 
      <div class="col">
        <h3 class="widgettitle">Contact Info</h3>
        <ul class="list-unstyled mb-0 contact-list">
          <li>{{$metadata['app_setting']->address->address}} #{{$metadata['app_setting']->address->unit}}-{{$metadata['app_setting']->address->apartment}}, {{$metadata['app_setting']->address->town_city}}, {{$metadata['app_setting']->address->country->name}} {{$metadata['app_setting']->address->post_code}}</li>
          <li>Tel: +{{$metadata['app_setting']->address->phone}}</li>

        </ul>
      </div> 
      <div class="col">
        <h3 class="widgettitle">Customer Care</h3>
        <ul class="list-unstyled menu-style mb-0">
          <li><a href="#"> Login </a></li>
          <li><a href="#"> My Account</a></li>
          <li><a href="#"> Privacy policy</a></li>
          <li><a href="#"> Terms & conditions</a></li>
 
         </ul>
      </div> 
      
      <div class="col">
        <h3 class="widgettitle">Quick Links</h3>
        <ul class="list-unstyled menu-style mb-0">
          <li><a href="#">About us</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Shipping & Returns</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">How to sell</a></li>
 
         </ul>
      </div>
      <div class="col apps-download-images">
        <a href="#">
        <img src="{{ asset('images/google-play.png')}}" class="icon-google-play"/>
      </a>
      <a href="#">
        <img src="{{ asset('images/apple-store.png')}}" class="icon-apple-store"/>
      </a>

      </div>
    </div>

  </div>
</footer>

<div class="copywrite-section">
  <div class="container">
    
    <div class="row">
      <div class="col-md-6">
<div class="footer-social-area">
  <ul class="list-unstyled mb-0">
    <li><a href="#"><i class="fab fa-facebook-f"></i> </a></li>
    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
  </ul>
</div>
      </div>
      <div class="col-md-6">
<span class="copywrite">
  © 2022  Fresh Pasar. All rights reserved. All trademarks are property of their respective owners.
</span>
      </div>
    </div>
  </div>
</div>

        <div class="modal fade" id="front-modal" tabindex="-1" aria-labelledby="front-modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="front-end-ajax">
                   
                    
                </div>
            </div>
        </div>
    