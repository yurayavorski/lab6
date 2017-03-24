
$(document).ready(function() {
    $(".logout").click(function() {
        $.ajax({type: "post", url: "/logout.php"}).done(function (html) {
            location.reload();в
        });
        return false;
    });
    $(".vfor").click(function() {
        var vId = $(this).parent().attr("data-id");
        $.ajax({type: "post", url: "/vote.php", data: {vote: 1, id: vId}}).done(function (html) {
            //alert (html);
            location.reload();
        });
        return false;
    });
    $(".vagainst").click(function() {
        var vId = $(this).parent().attr("data-id");
        $.ajax({type: "post", url: "/vote.php", data: {vote: 0, id: vId}}).done(function (html) {
            //alert (html);
            location.reload();
        });
        return false;
    });
});

