$('.btn-click').click(function(e) {
	e.preventDefault();
	var btn = $(this);
    swal({
      title: "Redirection", 
      text: "Redirection en cours sur le site du serveur.", 
      html: true,
      type: "warning",
      showCancelButton: true,
      showConfirmButton: false,
      allowOutsideClick: true,
	  timer: 5000,
	  countdown: true,
	  redirection: btn.attr('href')
    });
});

$('.btn-vote').click(function(e) {
	e.preventDefault();
	var btn = $(this);
	var voteCounter = btn.parent().parent().find('var.vote-counter');
	var votes = parseInt(voteCounter.text());
    swal({
      title: "Voter pour le serveur", 
      text: "Etes-vous sur de vouloir voter ?", 
      type: "warning",
      showCancelButton: true,
      allowOutsideClick: true,
      closeOnConfirm: false,
    }, function(isConfirm) {
      if (isConfirm) {
		$.ajax({
			method: "POST",
			url: btn.attr('href')
		})
		.done(function(data) {
		    swal({
		      title: "Merci !", 
		      text: data.message, 
		      type: "success",
		      html: true,
		      showCancelButton: false,
		      showConfirmButton: true,
		      allowOutsideClick: true,
			  timer: 3000
		    }, function() {
			    voteCounter.fadeOut(500, function() {
					$(this).text(votes+1).fadeIn(500);
				});
		    });	
		})
		.error(function(xhr) {
			data = $.parseJSON(xhr.responseText);
			console.log(data);

			if (data.message) {
				message = data.message;
			} else {
				message = "Vous ne pouvez pas voter pour le moment, une erreur est survenue !";
			}

			swal("Erreur", message, "error");
		});
      }

    });
});	

$(".banner").unveil(1000, function() {
  $(this).load(function() {
    this.style.opacity = 1;
  });
});