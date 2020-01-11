<div class="container">
	<div class="row">
		<br>
		<span  class="nav navbar-nav list-group-item list-inline" style="color:blue; font-size:75%">
			<div>Universidad Católica Sedes Sapientiae</div>
			<div>Facultad de Ciencias Económicas y Comerciales</div>
			<div>Tfno. 533-0008 anexo 250</div>
		</span>
		@if(env('APP_ENV') == 'local')	
			<span  class="nav navbar-nav list-group-item list-inline" style="color:blue; font-size:75%">
				<div>Laravel v6.2</div>
				<div>Vue js v^2.5.17</div>
				<div>Npm v6.7.0</div>
			</span>	
			<span  class="nav navbar-nav list-group-item list-inline" style="color:blue; font-size:75%">
				<div>Bootstrap v4.0.0</div>
				<div>family=Nunito</div>
			</span>
		@endif	
		@guest
		@else
		<span  class="nav navbar-nav list-group-item list-inline" style="color:blue; font-size:75%">
			<div>User Id: "{{ \Auth::user()->id }}"</div>
			<div>Tipo: "{{ \Auth::user()->tuser }}"</div>
		</span>	
		@endguest
	</div>
	<div class="row">
		<div class="nav navbar-nav list-group-item list-inline" id="userType" style="color:red; font-size:75%">
			Vista: @yield('view')
		</div>
	</div>
</div>