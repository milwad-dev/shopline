$(function () {
  ('use strict');
  var addPermissionForm = $('#addPermissionForm');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (addPermissionForm.length) {
    addPermissionForm.validate({
      rules: {
        modalPermissionName: {
          required: true
        }
      }
    });
  }

  // reset form on modal hidden
  $('.modal').on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();
  });
});
