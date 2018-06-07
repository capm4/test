$("document").ready(function () {
    $("#task_preview").click(function (event) {
        $this = $(this);
        event.preventDefault();
        var data = $this.parent('form').serialize();
        $.ajax({
            url: "/app/views/task_preview.php",
            type: "POST",
            data: data,
            success: function success(data) {
                console.log(data);
                $('#forma').css("opacity","0.0");
                $('#tbody').html(data);
                $("#task_create").css("display", "block")
            },
            error: function error(err) {
                console.log(err);
            }
        });
    });

    $("#task_create").click(function (event) {
        $('#tbody').html("");
        $("#task_create").css("display", "none")
        event.preventDefault();
        $('#forma').css("opacity", "1.0");
    });


});