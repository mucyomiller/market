<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
<div class="container topnav">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand topnav" href="{{ route('search') }}">E-Pricing System</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    @if(Auth::user()->check()) 
	 @if(!((Auth::User()->status)==0))
	 	<ul class="nav navbar-nav navbar-left">
		 <li><a href="#">Your Marks:</a></li>
	 	 <li><a href="#"><b>{{Auth::user()->user()->point->points}}</b></a></li>
	 </ul>
	 @endif
	 @endif 
    <ul class="nav navbar-nav navbar-right">
    @if(Auth::user()->check()) 
	@if(!((Auth::User()->status)==0))
		<li>
		<a href="{{route('profile')}}">{{ucfirst(Auth::user()->user()->personInfo->lastname)}}</a>
		</li>
	<li>
	<a href="{{route('price')}}">Register Product price</a>
	</li>
	<li>
	<a href="{{route('contact')}}">Contact us</a>
	</li>
	@endif
	<li><a href="{{route('signout')}}">Sign Out</a></li>
	@else 
   	<li>
        <a href="{{route('search')}}">home</a>
    </li>
    <li>
        <a href="#services">Search Product</a>
    </li>
    <li>
        <a href="{{ route('signin') }}">Sign in</a>
    </li>
    <li>
        <a href="{{ route('signup') }}">Sign up</a>
    </li>
    @endif
    </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>