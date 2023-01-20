$(document).ready(function () {
    $(document).on("click", ".btn-edit-rol", function () {

        let id = $(this).data("id");

        let data = {
            id: id
        }
        let url = `{{ route('user.inactive')}}`;
        $.ajax({
            url: url,
            method: "post",
            data: data,
            datatype: "json",
            success: function (respuesta) {
                ////console.log(respuesta);
            },
            error: function () {
                console.log("No se ha podido obtener la información");
            }
        });
    });
 });
