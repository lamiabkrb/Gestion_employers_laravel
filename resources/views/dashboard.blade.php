@extends('layauts.template')

@section('content')
  <h1 class="app-page-title">Dashboard</h1>

  <div class="row mt-2 mb-2 p-2">
     @if ($paiementnotification)   {{--on doit utiliser le if pour verifier son existance car on l'a initialiser avec null --}}
		<div class="alert alert-warning"><b>Attention: </b>{{ $paiementnotification }}</div>
	@endif
  </div>

  <!--ligne des statistiques-->
  <div class="row g-4 mb-4">   
		 <div class="col-6 col-lg-3">   {{-- Total Département --}}
			<div class="app-card app-card-stat shadow-sm h-100">
				<div class="app-card-body p-3 p-lg-4">
					<h4 class="stats-type mb-1">Total Département</h4>
					<div class="stats-figure">{{ $totalDepartement}}</div>
				</div><!--//app-card-body-->
				<a class="app-card-link-mask" href="#"></a>
			</div><!--//app-card-->
		</div><!--//col-->
		
		<div class="col-6 col-lg-3">   {{-- Total Employés--}}
			<div class="app-card app-card-stat shadow-sm h-100">
				<div class="app-card-body p-3 p-lg-4">
					<h4 class="stats-type mb-1">Total Employés</h4>
					<div class="stats-figure">{{$totalEmploye}}</div>
				</div><!--//app-card-body-->
				<a class="app-card-link-mask" href="#"></a>
			</div><!--//app-card-->
		</div><!--//col-->

		<div class="col-6 col-lg-3">     {{-- Total Administrateur--}}
			<div class="app-card app-card-stat shadow-sm h-100">
				<div class="app-card-body p-3 p-lg-4">
					<h4 class="stats-type mb-1">Total Administrteur</h4>
					<div class="stats-figure">{{$totaladministrateur}}</div>
				</div><!--//app-card-body-->
				<a class="app-card-link-mask" href="#"></a>
			</div><!--//app-card-->
		</div><!--//col-->
		
		<div class="col-6 col-lg-3">   {{-- retard de paiement--}}
			<div class="app-card app-card-stat shadow-sm h-100">
				<div class="app-card-body p-3 p-lg-4">
					<h4 class="stats-type mb-1">Retard de paiement</h4>
					<div class="stats-figure">0</div>
				</div><!--//app-card-body-->
				<a class="app-card-link-mask" href="#"></a>
			</div><!--//app-card-->
		</div><!--//col-->
	</div><!--//row-->

	
   
@endsection