<!DOCTYPE html>
<html>
<head>
    <title>Factorial Calculator</title>
</head>
<body>
    <h2>Factorial Calculator</h2>
    <form method="post">
        Enter a number: <input type="text" name="number" value="<?php echo isset($_POST['number']) ? $_POST['number'] : ''; ?>"><br><br>
        <input type="submit" name="submit" value="Calculate Factorial">
    </form>
    <?php    function factorial($n) {
        $factorial = 1;
        for($i = 1; $i <= $n; $i++) {
            $factorial *= $i;
        }
        return $factorial;
    }
    
    if(isset($_POST['submit'])){
        $number = $_POST['number'];
        
        if(is_numeric($number) && $number >= 0 && floor($number) == $number){
            $result = factorial($number);
            echo "<br>Factorial of $number is $result";
        } else {
            echo "<br>Please enter a valid positive integer.";
        }
    }
    ?>
</body>
</html>
