<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand topnav" href="{{ route('index') }}">E-Pricing System</a>
		</div>
		<div class="collapse navbar-collapse">
@if(Auth::user()->check()) 
@if(!((Auth::User()->status)==0))
			<ul class="nav navbar-nav">
				<li><a href="#">Your Marks:</a></li>
				<li><a href="#"><b>{{Auth::user()->user()->point->points}}</b></a></li>
  @endif 			</ul>
 @endif 
		<ul class="nav navbar-nav navbar-right">
 @if(Auth::user()->check()) 
 @if(!((Auth::User()->status)==0))
         <li><a href="{{route('profile')}}">{{ucfirst(Auth::user()->user()->personInfo->lastname)}}</a></li>
        <li><a href="{{route('price')}}">Register Product price</a></li>
        <li><a href="{{route('contact')}}">Contact us</a></li>
        @endif
         <li><a href="{{route('signout')}}">Sign Out</a></li>
          @endif 
		</ul>
		</div>
	</div>
</nav>