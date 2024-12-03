$(function() {
    $('#exampleModal').on('show.bs.modal', function () {
      var name = $('#formName').val()
      var email = $('#formEmail').val()
      var password = $('#formPassword').val()
      var modal = $(this)

      modal.find('#modalName').text(name)
      modal.find('#modalEmail').text(email)
      modal.find('#modalPassword').text(password)
    })
  })