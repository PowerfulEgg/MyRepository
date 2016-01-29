/**
 * Created by Богдан on 22.01.2016.
 */


function func_success (data) {
    $("#table").html(data);
}

$(document).ready(function () {
    $("select[name='select-country']").bind("change", function () {
        var select = document.getElementById("select-country-id"); // Получаем наш список
        var selected_country = select.options[select.selectedIndex].value; //Получаем значение выделенного элемента
        $.ajax({
            url: "php/create_table.php",
            type: "POST",
            data: ({country: selected_country}),
            dataType: "html",
            success: func_success
        });
    });
});