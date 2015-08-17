<div id="search" class="full-size">
    <button type="button" class="close">×</button>
    <form class="form-horizontal" action="{{ URL::route('search.result.post') }}" method="POST">
    	<div class="form-group">
    		<label class="control-label col-sm-3 col-sm-offset-2">Type :</label>
    		<div class="col-sm-7">
				<div class="search-tri-types"></div>
				<select class="hidden" name="search_types[]" multiple></select>
			</div>
    	</div>
    	<div class="form-group">
    		<label class="control-label col-sm-3 col-sm-offset-2">Slots max :</label>
    		<div class="col-sm-6">
				<input class="form-control" type="number" name="search_slot" value="{{ Input::old('search_slot') }}" />
			</div>
    	</div>
    	<hr />
        <input type="search" placeholder="Nom du serveur" name="search_keywords" value="{{ Input::old('search_keywords') }}" />
        <hr />
        <div class="text-center">
        	<button type="submit" class="btn btn-primary btn-animated">Valider ma recherche</button>
        </div>
    </form>
</div>