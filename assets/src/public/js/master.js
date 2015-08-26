
// Facebook SDK
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.3&appId=96031361007";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


// Custom JS

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

$(".dropdown").hover(            
    function() {
        $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("fast");
        $(this).toggleClass('open');        
    },
    function() {
        $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("fast");
        $(this).toggleClass('open');       
    }
);

$("form").on( "click", ".btn-tri-search", function(e) {
  var form = $(e.delegateTarget);
  var collapse = form.find('.search-collapse');
  if (collapse.hasClass('in')) {
  	$(this).find('i').removeClass('icon-chevron-up').addClass('icon-chevron-down');	
  } else {
  	$(this).find('i').removeClass('icon-chevron-down').addClass('icon-chevron-up');
  }
});



$('.full-size, .full-size .close').on('click keyup', function(event) {
    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
        $('.full-size').removeClass('open');
    }
});


/*$('.full-size').on('click keyup', '.btn-close, this', function(event) {
    if (event.delegateTarget == this || event.target.className == 'btn-close' || event.keyCode == 27) {
        $(event.delegateTarget).removeClass('open');
    }
});*/

$('.add-server').click(function(e) {
  e.preventDefault();
  $('.add-new').addClass('open');
});