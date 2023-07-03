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