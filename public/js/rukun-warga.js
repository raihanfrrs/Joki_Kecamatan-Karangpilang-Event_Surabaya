$(document).ready(function () {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });
    
    $.ajax({
        type: "get",
        url: "/dashboard/countAcceptedMusbangkel",
        success: function(data){
            $("#countAcceptedMusbangkel").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/countAcceptedEvent",
        success: function(data){
            $("#countAcceptedEevent").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/countRejectedMusbangkel",
        success: function(data){
            $("#countRejectedMusbangkel").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/countRejectedEvent",
        success: function(data){
            $("#countRejectedEvent").html(data);
        }
    });
});

$(document).ready(function() {
    // Menetapkan nilai default "fisik" pada select
    $("select[name='request_type']").val("fisik");

    // Menonaktifkan input amount saat halaman dimuat
    $("#amount").prop("disabled", true);
    
    // Mendeteksi perubahan pada elemen select
    $("select[name='request_type']").change(function() {
        var selectedOption = $(this).val();

        if (selectedOption === "fisik") {
        // Jika option "Fisik" dipilih, disable input amount dan enable input size
        $("#amount").prop("disabled", true);
        $("#size").prop("disabled", false);
        } else if (selectedOption === "barang") {
        // Jika option "Barang" dipilih, disable input size dan enable input amount
        $("#size").prop("disabled", true);
        $("#amount").prop("disabled", false);
        }
    });
});