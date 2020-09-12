$(function() {

    $('.support-chat').on('click', function () {
        Swal.fire({
            icon: 'warning',
            title: 'Sorry!',
            text: 'All support chat rooms are busy at the moment, please try again shortly!'
        });
    });



});
