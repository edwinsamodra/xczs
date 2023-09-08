$(document).ready(function () {
    $("#btnLoginSubmit").click(function () {
        const username = $("#username").val();
        const password = $("#password").val();
        const kodeUser = $("#kodeUser").val();

        $.ajax({
            type: "POST",
            url: "/api/auth/login",
            data: {
                'username': username,
                'password': password,
                'kode_user': kodeUser,
            },
            beforeSend: function () {
                // todo:
            },
            success: function (data) {            
                const url = data.site + "?t=" + data.token;    
                window.location.replace(url);
            },
        });
    });
});
