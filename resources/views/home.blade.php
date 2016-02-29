@if(Auth::check())
	Hello, {{Auth::user()->name}}!
	<a href="/auth/logout">Logout</a>
 <h3>User Infomation</h3>
	<ul>
		<li>Name:{{Auth::user()->name}}</li>
		<li>Email:{{Auth::user()->email}}</li>
	</ul>
@else
	Welcome, please <a href="/auth/login">Login </a>
	Or <a href="/auth/register">Register</a>
@endif
