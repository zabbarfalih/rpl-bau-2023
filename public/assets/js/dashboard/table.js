$(document).ready(function () {
    var table = $("#table-bau").DataTable({
        scrollX: true,
        responsive: true,
        language: {
            lengthMenu: "Tampilkan _MENU_ entri",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(disaring dari _MAX_ entri)",
            search: "Cari:",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: ">",
                previous: "<",
            },
            zeroRecords: "Tidak ada data yang tersedia dalam tabel",
        },
    });

    new $.fn.dataTable.FixedHeader(table);

    var tablepenolakan = $("#table-bau-penolakan").DataTable({
        scrollX: true,
        responsive: true,
        language: {
            lengthMenu: "Tampilkan _MENU_ entri",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(disaring dari _MAX_ entri)",
            search: "Cari:",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: ">",
                previous: "<",
            },
            zeroRecords: "Tidak ada data yang tersedia dalam tabel",
        },
    });

    new $.fn.dataTable.FixedHeader(tablepenolakan);
});
