$(document).ready(function () {
    $("#btnSubmitDisease").click(function () {
        $.ajax({
            url: "http://localhost:8000/diseases/add",
            beforeSend: function (xhr) {
                // xhr.overrideMimeType("text/plain; charset=x-user-defined");
            },
        }).done(function (data) {
            // if (console && console.log) {
            //     console.log("Sample of data:", data.slice(0, 100));
            // }
        });
        // $('#form_id').trigger("reset");
    });
});
