@if(Session::has('info'))
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<div class="alert alert-info alert-message" role="alert">
{{ Session::get('info')}}
</div>
</div>
<div class="col-sm-3">
</div>
@endif
<script type="text/javascript">
  window.setTimeout(function() {
    $(".alert-message").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
</script>