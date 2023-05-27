$(document).ready(function () {
    $('#deleteDataModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var galleryId = button.data('gallery-id');
        var form = $(this).find('form');
        var action = form.attr('action').replace(':galleryId', galleryId);
        form.attr('action', action);
        form.find('#galleryId').val(galleryId);
    });

    $('form.edit-form').on('submit', function (event) {
        event.preventDefault(); // default is kil
                                // no
        var form = $(this);
        var action = form.attr('action');
        var galleryId = form.data('gallery-id'); // i dont even need this because like fucking stuff already happen but for the sake of it

        // bro i literally use ajax bcs when i use the other method above, it doesnt fucking work and i have no idea why
        $.ajax({
            url: action,
            method: 'POST',
            data: new FormData(this), 
            processData: false,
            contentType: false,
            success: function (response) {
                // alert('Gallery updated successfully.'); i dont want alert fuck alert but ill keep this tho
                form.closest('.modal').modal('hide');
                location.reload(); // reload if kool
            },
            error: function (xhr, status, error) {
                alert('An error occurred while updating the gallery.'); // error = not_kool
            }
        });
    });
});

// club penguin is kil

// no