<hr>
<div class="col-md-12 text-center"><p>&copy; Copyright {{date("Y")}}&nbsp; tskillsc,&nbsp;Allright reserved.</p></div>
</div>
<!--login modal-->
<div style="display: none;" id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><img src="{{asset('user/img/photo_002.png')}}" class="img-circle"><br>Login</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input class="form-control input-lg" placeholder="Email" type="text">
            </div>
            <div class="form-group">
              <input class="form-control input-lg" placeholder="Password" type="password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>


<!--about modal-->
<div style="display: none;" id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center">About</h2>
      </div>
      <div class="modal-body">
          <div class="col-md-12 text-center">
             E-Pricing syste is system that will helps you to get in touch with product price updates on market around you
            <br><br>
          </div>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">OK</button>
      </div>
  </div>
  </div>
</div>
 
<script type="text/javascript" src="{{asset('user/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/bootstrap.js')}}"></script>

<script type="text/javascript">

$(document).ready(function() {

$('#btnToggle').click(function(){
if ($(this).hasClass('on')) {
	$('#main .col-md-6').addClass('col-md-4').removeClass('col-md-6');
	$(this).removeClass('on');
}
else {
	$('#main .col-md-4').addClass('col-md-6').removeClass('col-md-4');
	$(this).addClass('on');
}
});
});

</script>
    
</body>
</html>