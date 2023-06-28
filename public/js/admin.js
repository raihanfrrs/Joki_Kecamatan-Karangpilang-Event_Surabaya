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