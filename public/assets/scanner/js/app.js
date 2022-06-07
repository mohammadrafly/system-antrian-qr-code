(function() {
  // Jquery Validation
  var activateSelect2;

  jQuery.validator.addMethod('noSpace', (function(value, element) {
    return $.trim(value) !== '';
  }), 'Don\'t leave it empty');

  $('.form-login').validate();

  $('.form-user-request').validate({
    rules: {
      note: {
        noSpace: true
      }
    },
    submitHandler: function(form) {
      $('.preloader').addClass('d-block');
      return form.submit();
    }
  });

  // $('.form-set-db').validate()

  // Select2
  activateSelect2 = function() {
    return $('.select2').select2({
      width: '100%'
    });
  };

  activateSelect2();

  // Datepicker
  $('.datepicker').datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
    todayHighlight: true
  });

  // Modal
  $('#modal-user-request').on('show.bs.modal', function(e) {
    return activateSelect2();
  });

  // Form
// $('.form-set-db').on 'submit', (e) ->
// 	e.preventDefault()
// 	that = $(this)
// 	$.ajax
// 		type: 'post'
// 		url: that.attr('action')
// 		data:
// 			host: that.find('#host').val()
// 			database: that.find('#database').val()
// 			user_db: that.find('#user-db').val()
// 			password_db: that.find('#password-db').val()
// 			_token: that.find('input[name="_token"]').val()
// 		beforeSend: (data) ->
// 			$('.preloader').addClass('d-block')
// 			$('.preloader').removeClass('d-none')
// 		success: (data) ->
// 			if data.message == ''
// 				alert('Database successfully set')
// 				location.reload()
// 			else
// 				alert(data.message)

// 			$('.preloader').addClass('d-none')
// 			$('.preloader').removeClass('d-block')

}).call(this);
