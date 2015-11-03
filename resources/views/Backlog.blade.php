@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Backlog</div>

					<div class="panel-body">
						@if(count($userstories))
							<TABLE BORDER="1">

								<TR>
									<TH> N° </TH>
									<TH> Description </TH>
									<TH> Priorité </TH>
									<TH> Difficulté </TH>
								</TR>

								@foreach($userstories as $us)
									<TR>
										<TH> {{$us->id}} </TH>
										<TD> {{$us->description}} </TD>
										<TD> {{$us->priority}} </TD>
										<TD> {{$us->difficulty}} </TD>
									</TR>

								@endforeach
							</TABLE>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


