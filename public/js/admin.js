$(document).ready(function () {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/countRukunWarga",
        success: function(data){
            $("#countRukunWarga").html(data);
        }
    });
    
    $.ajax({
        type: "get",
        url: "/dashboard/countPhoto",
        success: function(data){
            $("#countPhoto").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/countEvent",
        success: function(data){
            $("#countEvent").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/countMusbangkel",
        success: function(data){
            $("#countMusbangkel").html(data);
        }
    });
});

$(document).on('change', '#statusMusbangkel', function () {
    let selectedOption = $(this).find('option:selected');
    let status = selectedOption.val();
    let musbangkel = $(this).data('key');

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });

    $.ajax({
        type: "get",
        url: "/musbangkel/"+musbangkel+"/status",
        data: {
            "status": status
        },
        success: function(data){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Status Updated!',
                showConfirmButton: false,
                timer: 1500
            })
            location.reload();
        }
    });
});

$(document).on('change', '#statusEvent', function () {
    let selectedOption = $(this).find('option:selected');
    let status = selectedOption.val();
    let event = $(this).data('key');

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });

    $.ajax({
        type: "get",
        url: "/event/"+event+"/status",
        data: {
            "status": status
        },
        success: function(data){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Status Updated!',
                showConfirmButton: false,
                timer: 1500
            })
            location.reload();
        }
    });
});