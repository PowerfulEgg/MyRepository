/**
 * Created by King on 27.01.2016.
 */
$(document).ready(function(){
    FixHide();
});
$(document).bind("click", function(){
    $('.error').click(function() {
        $("#fix-form").show();
    });
});

function FixShow(){
    $("#fix-form").show();
}

function FixHide(){
    $("#fix-form").hide();
}
