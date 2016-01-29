/**
 * Created by King on 27.01.2016.
 */
function funcSuc(data){
    $("#info").html(data);

}

$(document).bind("click", function(){
    $('.popup').click(function() {
        var id = ($(this).attr('id'));
        $.ajax({
            url: "php/show_info.php",
            type: "POST",
            data: ({city: id}),
            dataType: "html",
            success: funcSuc
        });
    });
});