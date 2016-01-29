/**
 * Created by Богдан on 28.01.2016.
 */
function funcSuccess (data) {
    $("#select-city-id").html(data);
}

$(document).ready(function () {
    $("select[name='select-country']").bind("change", function () {
        var select = document.getElementById("select-country-id"); // Получаем наш список
        var selected_country = select.options[select.selectedIndex].value; //Получаем значение выделенного элемента
        $.ajax({
            url: "php/show_cities.php",
            type: "POST",
            data: ({country: selected_country}),
            dataType: "html",
            success: funcSuccess
        });
    });
});