$(function () {
  $("#example1")
    .DataTable({
      responsive: true,
      order: [[0, "desc"]],
      lengthChange: false,
      autoWidth: false,
      // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      buttons: [ "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#example1_wrapper .col-md-6:eq(0)");
});

$(function () {
  $("#transaction")
    .DataTable({
      responsive: true,
      order: [[0, "desc"]],
      lengthChange: false,
      autoWidth: false,
      // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      buttons: [ "csv", "excel", "pdf", "print"],
    })
    .buttons()
    .container()
    .appendTo("#transaction_wrapper .col-md-6:eq(0)");
});


$(function() {

	toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-full-width",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "15000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };
});