$(function () {
    $("#data1").DataTable();
    $("#data2").DataTable();

    $('#data3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });