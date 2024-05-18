<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geometric Progression Example</title>
</head>
<body>
    <h1>Geometric Progression </h1>

    <form method="post" action="">
        <label for="initialTerm">Initial Term:</label>
        <input type="number" id="initialTerm" name="initialTerm" required><br><br>

        <label for="commonRatio">Common Ratio:</label>
        <input type="number" id="commonRatio" name="commonRatio" required><br><br>

        <label for="numTerms">Number of Terms:</label>
        <input type="number" id="numTerms" name="numTerms" required><br><br>

        <button type="submit">Generate Sequence</button>
    </form>

    <?php
    include 'classes.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $initialTerm = $_POST['initialTerm'];
        $commonRatio = $_POST['commonRatio'];
        $numTerms = $_POST['numTerms'];

        $gp = new GeometricProgression($initialTerm, $commonRatio, $numTerms);

        $sequence = $gp->getSequence();
        echo "<p>Sequence: " . implode(', ', $sequence) . "</p>";

        $n = 4; 
        $nthTerm = $gp->getNthTerm($n);
        echo "<p>$n" . "th term: $nthTerm</p>";

        $sum = $gp->getSum();
        echo "<p>Sum of the progression: $sum</p>";
    }
    ?>
</body>
</html>
