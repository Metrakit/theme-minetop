<?php require('../../includes/header.php'); ?>
<?php require('../../includes/nav.php'); ?>

<div class="container margin-top-md">

	<div class="page-header">
		<h1>Add a new item</h1>
	</div>

	<form class="form-horizontal">

		<div class="form-group">
			<label for="" class="control-label col-md-offset-1 col-md-2">Nom</label>
			<div class="col-md-5">
				<input type="text" class="form-control">
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="form-group">
			<label for="" class="control-label col-md-offset-1 col-md-2">Courte description</label>
			<div class="col-md-5">
				<input type="textarea" class="form-control" rows="2">
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="form-group">
			<label for="" class="control-label col-md-offset-1 col-md-2">URL</label>
			<div class="col-md-5">
				<input type="text" class="form-control">
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="form-group">
			<label for="" class="control-label col-md-offset-1 col-md-2">IP</label>
			<div class="col-md-5">
				<input type="text" class="form-control">
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="form-group">
			<label for="" class="control-label col-md-offset-1 col-md-2"></label>
			<div class="col-md-5">
				<div class="row">
				  <div class="col-md-8">
				    <div class="input-group">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button">IP</button>
				      </span>
				      <input type="text" class="form-control" placeholder="127.0.0.1">
				    </div>
				  </div>
				  <div class="col-md-4">
				    <div class="input-group">
				      <input type="text" class="form-control" placeholder="8080">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button">Port</button>
				      </span>
				    </div>
				  </div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-3 col-md-5 text-center">
				<button type="submit" class="btn btn-success">Envoyer</button>
			</div>
			<div class="clearfix"></div>
		</div>

	</form>

</div>

<?php require('../../includes/footer.php'); ?>
