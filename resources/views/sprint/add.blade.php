@extends('default')
@section('content')
<div class="container">
    <br/>
    <h2> Ajout d'un sprint</h2>
    <div class="row">
        <form action="{{  URL::action("SprintController@add", [$project_id]) }}" method="POST" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group form-group-label">
                <div class="row">
                    <div class="col-md-10 col-md-push-1">
                        <label class="floating-label" for="StartDate">Date de début :</label>
                        <input type="date" name="StartDate" class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-label">
                <div class="row">
                    <div class="col-md-10 col-md-push-1">
                        <label class="floating-label" for="EndDate">Date de fin :</label>
                        <input type="date" name="EndDate" class="form-control"/>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-md-10 col-md-push-1">
                        <button class="btn btn-primary">Ajouter</button> 
                         <a href="{{ URL::previous()}}" class="btn btn-default" >Annuler</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
</div>

@stop
