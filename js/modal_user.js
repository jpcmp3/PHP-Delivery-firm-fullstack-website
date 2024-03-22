$(document).ready(function () {
    $('#example').on('click', '.delete-button', function (e) {
        e.preventDefault();
        var $self = $(this);
        var id = $self.data('id');

        Swal.fire({
            title: 'Сигурни ли сте, че искате да изтриете този потребител?',
            text: 'Действието е необратимо',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Да, изтрий го',
            cancelButtonText: 'Отказ', // Custom cancel button text
            showLoaderOnConfirm: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Изтрит!',
                    text: 'Потребителят бе премахнат успешно',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then(() => {
                    location.href = 'includes/deleteUser.inc.php?deleteid=' + id;
                });
            }
        });
    });
});