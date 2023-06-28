$(document).ready(function () {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/countRequest",
        success: function(data){
            $("#countRequest").html(data);
        }
    });
    
    $.ajax({
        type: "get",
        url: "/dashboard/countAccepted",
        success: function(data){
            $("#countAccepted").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/countRejected",
        success: function(data){
            $("#countRejected").html(data);
        }
    });
});