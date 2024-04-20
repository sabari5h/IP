<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Celsius to Fahrenheit Converter</h2>
    <form method="post">
        Celsius: <input type="text" name="celsius" value="<?php echo isset($_POST['celsius']) ? $_POST['celsius'] : ''; ?>"><br><br>
        <input type="submit" name="submit" value="Convert">
    </form>
    <?php
    if(isset($_POST['submit'])){
        $celsius = $_POST['celsius'];
        
        if(is_numeric($celsius)){
            $fahrenheit = ($celsius * 9/5) + 32;
            echo "<br>Fahrenheit: $fahrenheit °F";
        } else {
            echo "<br>Please enter a valid number for Celsius.";
        }
    }
    ?>
</body>
</html>