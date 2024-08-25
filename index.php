<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ; ?>" method="post">
    <input type="number" name="num01" placeholder="Number one">
    <select name="operator" >
        <option value="add">+</option>
        <option value="substract">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>

    <input type="number" name="num02" placeholder="Number two">
    <button>Calculate</button>
    </select>
</form>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Grab the values from the form
        $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);

        $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);

        $operator = htmlspecialchars($_POST["operator"]);
    
    // Handle errors here 
    $errors = false;
    if (empty($num01) || empty($num02) || empty($operator)) {
        // we echo the error message in red color
        echo "<p style='color: red;'>All fields are required</p>";
        $errors = true;
    }

    if (!is_numeric($num01) || !is_numeric($num02)) {
        // we echo the error message in red color
        echo "<p style='color: red;'>Please enter a valid number</p>";
        $errors = true;
    }

    // calculate the result if there are no errors

    if (!$errors) {
        $value = 0;
        switch ($operator) {
            case 'add':
                $value = $num01 + $num02;
                break;
            case 'substract':
                $value = $num01 - $num02;
                break;
            case 'multiply':
                $value = $num01 * $num02;
                break;
            case 'divide':
                $value = $num01 / $num02;
                break;
            default:
                echo "<p style='color: red;'>Invalid operator</p>";
        }
        $sign = '';
        switch ($operator) {
            case 'add':
                $sign = '+';
                break;
            case 'substract':
                $sign = '-';
                break;
            case 'multiply':
                $sign = '*';
                break;
            case 'divide':
                $sign = '/';
                break;
            default:
                echo "<p style='color: red;'>Invalid operator</p>";
        }
        echo "<p style='color: green;' > $num01 $sign  $num02  is $value </p>";
    }
}
?>


</body>
</html>

