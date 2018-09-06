jQuery(document).ready(function () {

    jQuery(".nav-link").click(function () {
        var rowId = $(this).data('rowid');
        alert(rowId);
        $('#prodSearch #taxonomy').val(rowId);
    });

    $("#prodSearch").validate({
        errorElement: "div",
        rules: {
            post_type: {
                required: true
            }
        },
        messages: {
            post_type: {
                required: "Please enter product name."
            }
        },
        submitHandler: function () {
            var post_type = $("#prodSearch #post_type").val();
            var taxonomy = $("#prodSearch #taxonomy").val();
            
            $.post("../data.js.php", {"mode": "search", "post_type": post_type, "taxonomy": taxonomy}, function (data) {
                alert(data.details);
                if (data.status == 1) {
                    
                }
            });
        }
    });



});