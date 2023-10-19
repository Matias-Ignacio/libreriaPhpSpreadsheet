$(document).ready(function(){
    console.log("Funciona");
    $("#loadExcel").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "upload.php",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success: function (data) {
                $("#areaExcel").html(data);
                $('table').css("width","100%");
                //$("#sheet0").css("visibility","hidden");
                
            }
        });
    });
});