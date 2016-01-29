/**
 * Created by Богдан on 28.01.2016.
 */
function call(){

    var select_action = document.getElementById("select-action-id");
    var selected_action = select_action.options[select_action.selectedIndex].value;

    var select_city = document.getElementById("select-city-id");
    var selected_city = select_city.options[select_city.selectedIndex].value;

    var selected_lang = document.getElementById("lang").value;

    $.ajax({
        url: 'php/fix_error.php',
        type: 'POST',
        data: ({action:  selected_action, city: selected_city, lang: selected_lang}),
        dataType: 'html',
        success: function (data) {
            $(".results").html(data);
        }
    })
}
