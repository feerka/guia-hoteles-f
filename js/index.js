$(function () {
					$('[data-toggle="tooltip"]').tooltip();
					$('[data-toggle="popover"]').popover();
					$('.carousel').carousel({
						interval: 3000
					});
					$('#contacto').on('show.bs.modal', function (e) {
  // do something...
  						console.log('El modal se esta mostrando');
  						$('#contactoBtn').removeClass('btn-success');
  						$('#contactoBtn').addClass('btn-primary');
  						$('#contactoBtn').prop('disabled', true);
					});
					$('#contacto').on('shown.bs.modal', function (e) {
  // do something...
  						console.log('El modal se mostro');
					});
					$('#contacto').on('hide.bs.modal', function (e) {
  // do something...
  						console.log('El modal se esta ocultando');
					});
					$('#contacto').on('hidden.bs.modal', function (e) {
  // do something...
  						console.log('El modal se oculto');
  						$('#contactoBtn').prop('disabled', false);
					});
				});
			