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
        event.preventDefault(); // Prevent the default form submission

        var form = $(this);
        var action = form.attr('action');
        var galleryId = form.data('gallery-id');

        // Perform an AJAX request to submit the form data
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