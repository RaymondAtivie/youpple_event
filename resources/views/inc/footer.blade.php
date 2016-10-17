 <!--Footer Content Start-->
  <footer class="cp-footer">
    <div class="container">

      <!--Footer Copyright Start-->
      <div class="cp-copyright-row">
        <div class="row">
          <div class="col-md-4">
            <p><a href="{{ url('/') }}">Youpple</a> &copy; {{date("Y")}}. All Rights Reserved</a></p>
          </div>
          <div class="col-md-8" style="text-align: right">
            <p>
              <a href="{{url("about")}}">About Youpple</a> &nbsp; &middot; &nbsp;
                <a href="{{url("advert")}}">Advertising / Partnership</a> &nbsp; &middot; &nbsp;
                <a href="{{url("faq")}}">FAQ</a> &nbsp; &middot; &nbsp;
                <a href="{{url("terms-of-use")}}">How it Works</a> &nbsp; &middot; &nbsp;
                <a href="{{url("privacy-policy")}}">Privacy Policy</a> &nbsp; &middot; &nbsp;
                <a href="{{url("terms-and-conditions")}}">Terms and Conditions</a>
            </p>
          </div>
        </div>

      </div><!--Footer Copyright End-->
      <!--Footer Copyright Start-->
      <div class="cp-copyright-row">
        <div class="row">
          <div class="col-md-6">
            <p>Design & Developed By: <a href="http://reftek.co/">Reftek Technologies</a></p>
          </div>
          <div class="col-md-6">
            <ul class="cp-social-links">
              <li><a target="_blank" href="{{ $social_links['google_plus'] }}"><i class="fa fa-google-plus"></i></a></li>
              <li><a target="_blank" href="{{ $social_links['twitter'] }}"><i class="fa fa-twitter"></i></a></li>
              <li><a target="_blank" href="{{ $social_links['linkedin'] }}"><i class="fa fa-linkedin"></i></a></li>
              <li><a target="_blank" href="{{ $social_links['facebook'] }}"><i class="fa fa-facebook"></i></a></li>
              <li><a target="_blank" href="{{ $social_links['google'] }}"><i class="fa fa-google"></i></a></li>
              <li><a target="_blank" href="{{ $social_links['pinterest'] }}"><i class="fa fa-pinterest"></i></a></li>
              <li><a target="_blank" href="{{ $social_links['instagram'] }}"><i class="fa fa-instagram"></i></a></li>
              <li><a target="_blank" href="{{ $social_links['youtube'] }}"><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>

      </div><!--Footer Copyright End-->

    </div>
  </footer><!--Footer Content End-->
