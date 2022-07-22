$(function () {
  ('use strict');
  var editPermissionForm = $('#editPermissionForm');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (editPermissionForm.length) {
    editPermissionForm.validate({
      rules: {
        editPermissionName: {
          required: true
        }
      }
    });
  }
});
