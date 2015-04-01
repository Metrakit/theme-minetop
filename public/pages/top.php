<?php require('../includes/header.php'); ?>
<?php require('../includes/nav.php'); ?>

<!-- Begin page content -->
<div class="container">
  <div class="page-header">
    <h1>Sticky footer with fixed navbar</h1>
  </div>
  <p class="lead">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>body > .container</code>.</p>
  <p>Back to <a href="#">the default sticky footer</a> minus the navbar.</p>
</div>


<div class="container">
  <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Title!</strong> Alert body ...
  </div>    
  <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Title!</strong> Alert body ...
  </div>  
  <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Title!</strong> Alert body ...
  </div> 
  <div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <strong>Title!</strong> Alert body ...
  </div> 
</div>

<div class="container">

  <nav>
    <ul class="pagination">
      <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
      <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
       <li><a href="#">2</a></li>
       <li><a href="#">3</a></li>
       <li><a href="#">4</a></li>
       <li><a href="#">5</a></li>
       <li><a href="#">6</a></li>
       <li><a href="#">7</a></li>
       <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
    </ul>
  </nav>

</div>


<?php require('../includes/footer.php'); ?>
