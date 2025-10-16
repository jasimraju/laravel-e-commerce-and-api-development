<section class="my-account-area">
      <div class="container">
        
        <div class="row">
        <div class="col-lg-12">
          <div class="myaccount-page-wrapper">
            <div class="row">
              <div class="col-lg-3 col-md-4">
                <nav>
                    @include('layouts.customer.inc.customerleftmenu')   
         
                </nav>
              </div>
              <div class="col-lg-9 col-md-8">
                <div class="tab-content" id="customer_main_body">
                 @include($main_sub) 
                 </div>
                 <!-- end tab container -->
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>