<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST['x'];

    $sequence = [$x];

    while ($x != 1) {
        if ($x % 2 == 0) {
          
            $x = $x / 2;
        } else {
            $x = 3 * $x + 1;
        }
        $sequence[] = $x; 
    }

    echo "Sequence values: " . implode(", ", $sequence) . "<br>";

    $maxValue = max($sequence);
    echo "Maximum value: $maxValue<br>";

    $iterations = count($sequence) - 1; 
    echo "Total iterations: $iterations";
}
?>

<form method="post" action="">
    <label for="x">Enter a number:</label>
    <input type="number" name="x" step="any" required>
    <input type="submit" value="Calculate">
</form>
