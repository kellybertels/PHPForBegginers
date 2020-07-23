<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    var_dump($_POST);

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Forms</title>
    <meta charset="utf-8">
</head>
<body>

<form method="post">
<fieldset>
  <legend>Personal Data</legend>
<div>
<label for="title">Title</label>: <input type= "text" name= "title" id="title">
</div>
    <div>
        text: <input type="text" name="surname" value="Your Name Here.">
    </div>

    <div>
        password: <input type="password" name="password">
    </div>

    <div>
        tel: <input type="tel" name="telephone">
    </div>

    <select name="country">
        <optgroup label="Europe">
            <option value="germany">Germany</option>
            <option value="france">France</option>
            <option value="uk" >United Kingdom</option>
        </optgroup>
        <optgroup label="America">
            <option value="brazil"selected>Brazil</option>
            <option value="canada">Canada</option>
            <option value="usa">United States</option>
        </optgroup>
    </select>
</fieldset>
    <div>
        url: <input type="url" name="web_address">
    </div>

    <div>
        date: <input type="date" name="date">
    </div>

    <div>
        time: <input type="time" name="time">
    </div>

    <div>
        week: <input type="week" name="week">
    </div>

    <div>
        color: <input type="color" name="colour">
    </div>

    <p>Which colours do you like?</p>

    <div>
        <input type="checkbox" name="colours[]" value="red"> Red
    </div>
    <div>
        <input type="checkbox" name="colours[]" value="green"> Green
    </div>
    <div>
        <input type="checkbox" name="colours[]" value="blue"> Blue
    </div>

    <div>
        email: <input type="email" name="email_address">
    </div>

    <div>
        month: <input type="month" name="month">
    </div>

    <div>
        range: <input type="range" name="range">
    </div>

    <div>
        hidden: <input type="hidden" name="invisible" value="1234">
    </div>

    <div>
        number: <input type="number" name="number">
    </div>

    <div>
        search: <input type="search" name="search">
    </div>

    <div>
        datetime-local: <input type="datetime-local" name="datetime">
    </div>

    <div>
        <p>Which colour do you like?</p>

        <input type="radio" name="colour" value="blue" checked>Blue<br>
        <input type="radio" name="colour" value="red">Red<br>
        <input type="radio" name="colour" value="green">Green
    </div>

    <button>Send</button>

</form>

</body>
</html>
