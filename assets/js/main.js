//CURRENT DATE
$(document).ready(function () {
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();

  if(dd<10) {
      dd='0'+dd
  }

  if(mm<10) {
      mm='0'+mm
  }

  today = dd+'/'+mm+'/'+yyyy;
  $('#current-date').html('Reporte al '+today);
});

// FORM
const msgForm = '<div id="msgStatus" class="form-control-feedback">:msg:</div>';
/***** Formulario de suscripcion ***/
$('#formRegister').submit(function (e) {
  e.preventDefault();

  $.ajax({
    method: 'POST',
    url: $(this).attr('action'),
    data: $(this).serialize(),
    success: function (msg) {
      resetForm();
      $('#input-main').focus();
      if (msg == "success") {
        window.open('http://localhost:8000/gracias.html', '_self');
      } else if (msg == "warning") {
        var mensaje = "Datos incorrectos. Inténtelo nuevamente."
        $('.form-group').addClass('has-warning');
        $('input').addClass('form-control-warning');
      } else {
        var mensaje = "Tuvimos un problema, inténtalo más tarde."
        $('.form-group').addClass('has-danger');
        $('input').addClass('form-control-danger');
      }
      var msje = msgForm.replace(':msg:', mensaje);
      var $msje = $(msje);
      $('#form-message').append($msje);
    }
  })

});

//reset form
function resetForm() {
  $('#msgStatus').remove();
  $('input').removeClass();
  $('input').addClass('form-control');
  $('.form-group').removeClass('has-danger');
  $('.form-group').removeClass('has-success');
  $('.form-group').removeClass('has-warning');
}
