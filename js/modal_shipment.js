$(document).ready(function () {
    $('#example').on('click', '.delete-button', function (e) {
        e.preventDefault();
        var $self = $(this);
        var id = $self.data('id');

        Swal.fire({
            title: 'Сигурни ли сте, че искате да изтриете тази пратка?',
            text: 'Действието е необратимо',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Да, изтрий я',
            cancelButtonText: 'Отказ', // Custom cancel button text
            showLoaderOnConfirm: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Изтрита!',
                    text: 'Пратката бе изтрита успешно',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then(() => {
                    location.href = 'includes/delete_shipment.inc.php?deleteid=' + id;
                });
            }
        });
    });
});