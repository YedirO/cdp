
    @extends('app')

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Ajouter/Modifier une UserStory</div>

                        <div class="panel-body">
                            @if($us)
                                <form action="{{  URL::action("UsController@modifyConfirm", null) }}" class="form-horizontal" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="us" value="{{ $us->id }}">

                                    <label for="description">Description</label> : <input type ="text" name="description" id="description" size="100" maxlength="500" value ="<?php echo $us->description; ?>"/> <br />
                                    <label for="priority">Priorité</label> : <input type ="number" name="priority" id="priority" min="0" value="<?php echo $us->priority; ?>" /> <br />
                                    <label for="difficulty">Difficulté</label> : <input type ="number" name="difficulty" id="difficulty" min="0" value="<?php echo $us->difficulty; ?>" /> <br />
                                    <input type ="checkbox" name="done" id="done" value="done" <?php if($us->status == 1) echo 'checked="checked"' ?> /><label for="done">Terminée</label> <br />
                                    <button type="submit" class="btn">Ajouter</button>
                                </form>
                            @else
                                <form action="{{  URL::action("UsController@createConfirm", null) }}" class="form-horizontal" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <label for="description">Description</label> : <input type ="text" name="description" id="description" size="100" maxlength="500" /> <br />
                                    <label for="priority">Priorité</label> : <input type ="number" name="priority" id="priority" min="0"  /> <br />
                                    <label for="difficulty">Difficulté</label> : <input type ="number" name="difficulty" id="difficulty" min="0"  /> <br />
                                    <button type="submit" class="btn">Ajouter</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

