$(document).ready(function () {
    $('#example').DataTable({
        "language": {
            "decimal": "",
            "emptyTable": "Няма данни",
            "info": "Показани _START_ до _END_ от _TOTAL_ резултата",
            "infoEmpty": "Покажи 0 до 0 от 0 резултата",
            "infoFiltered": "(филтрирани от общо _MAX_)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Покажи _MENU_ на страница",
            "loadingRecords": "Зареждане...",
            "processing": "",
            "search": "Търси:",
            "zeroRecords": "Нищо не отркихме",
            "paginate": {
                "first": "Първа",
                "last": "Последна",
                "next": "Напред",
                "previous": "Назад"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });
});