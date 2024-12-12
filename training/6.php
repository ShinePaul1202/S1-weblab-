<html>
<head>
    <title>sum</title>
</head>
<body>
    <h2>Add two Numbers</h2>

    <form method="post">
        <label for="num1">Enter the first number:</label>
        <input type="number" name="num1" required>
        <br><br>
        <label for="num2">Enter the second number:</label>
        <input type="number" name="num2" required>
        <br><br>
        <button type="submit">Add Numbers</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number1 = $_POST["num1"];
            $number2 = $_POST["num2"];
            
            $sum = $number1 + $number2;
            echo "$sum";
        }
    ?>
</body>
</html>
