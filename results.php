<?php
require_once 'classes.php';

$calculator = new SequenceCalculator();
$start = $_POST['start'];
$finish = $_POST['finish'];
$results = $calculator->findMinMaxIterations($start, $finish);

echo "<h2>Results:</h2>";

foreach ($results as $key => $value) {
    echo ucfirst($key) . " with " . $value['number'] . " (Iterations: " . $value['iterations'] . ")<br>";
    echo "Highest value: " . $value['highestValue'] . "<br><br>";
}
?>
