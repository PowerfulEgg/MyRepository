<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test program</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="javascript/show_countires.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/popup.js"></script>
    <script src="javascript/show_info.js"></script>
    <script src="javascript/fix-form_script.js"></script>
    <script src="javascript/fix_actions.js"></script>
</head>
<body>

    <div class="container block">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p>Куда бы вы хотели отправиться?</p>

                <form id="form-country">
                    <select name="select-country" id="select-country-id">
                        <?php require "php/select_country.php"; ?>
                    </select>
                </form>

                <table id="table" border="1">
                    <script src="javascript/create_table.js"></script>
                </table>

                <div id="res"></div>

                <div class="b-popup" id="popup1">
                    <div class="b-popup-content" id="info"></div>
                </div>

                <p>Нашли ошибку среди используемых языков?</p>
                <p><a href="javascript::FixShow()" class="error">Поправьте нас!</a></p>

                <form id="fix-form" method="POST" action="javascript:void(null);" onsubmit="call()">
                    <label for="action">Выберите действие</label>
                    <select name="select-action" id="select-action-id">
                        <option value="add">Добавить язык</option>
                        <option value="delete">Удалить язык</option>
                    </select><br>

                    <label for="select-city">Выберите город</label>
                    <select name="select-city" id="select-city-id">
                        <script src="javascript/show_cities_options.js"></script>
                    </select><br>

                    <label for="lang_name">Язык</label>
                    <input type="text" name="lang_name" id="lang"><br>

                    <input value="Send" type="submit">
                </form>

                <div class="results"></div>
            </div>
        </div>
    </div>

</body>
</html>