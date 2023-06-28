$(document).on('click', '#delete-btn', function(e){
    e.preventDefault();
    let slug = $(this).attr('data-key');

    Swal.fire({
        title: 'Are you sure?',
        text: "You will permanently delete this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#delete-form-'+slug).submit();
        }
    });
});