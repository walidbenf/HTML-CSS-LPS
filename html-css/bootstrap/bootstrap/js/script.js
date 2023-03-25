//Script Modal
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});
//script tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
