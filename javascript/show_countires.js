/**
 * Created by King on 27.01.2016.
 */
function func_succ(data){
    alert('Этот язык используется в таких странах: ' + data);
}

$(document).bind("click", function(){
    $('.link').click(function() {
        var id = ($(this).attr('id'));
        $.ajax({
            url: "php/show_countries.php",
            type: "POST",
            data: ({lang: id}),
            dataType: "html",
            success: func_succ
        });
    });
});