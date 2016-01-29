/**
 * Created by King on 27.01.2016.
 */
$(document).ready(function(){
    //Скрыть PopUp при загрузке страницы
    PopUpHide();
});

$(document).bind("click", function(){
    $('.popup').click(function() {
        $("#popup1").show();
    });
});

//Функция открытия PopUp
function PopUpShow(){
    $("#popup1").show();
}
//Функция скрытия PopUp
function PopUpHide(){
    $("#popup1").hide();
}