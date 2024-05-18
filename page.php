<?php
require_once 'cc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start = $_POST['start'];
    $finish = $_POST['finish'];

    $extendedCalculator = new ExtendedSequenceCalculator();
    $histogramData = $extendedCalculator->calculateHistogram($start, $finish);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histogram of 3x+1 Iteration Values</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Histogram of 3x+1 Iteration Values</h2>

    <?php
    echo "<p>Calculations:</p>";
    echo "<ul>";
    foreach ($histogramData as $iterations => $count) {
        echo "<li>Iterations: $iterations - Count: $count</li>";
    }
    echo "</ul>";
    ?>

    <canvas id="histogramChart" width="400" height="400"></canvas>

    <script>
        var ctx = document.getElementById('histogramChart').getContext('2d');
        var histogramData = <?php echo json_encode($histogramData); ?>;
        
        var labels = Object.keys(histogramData);
        var data = Object.values(histogramData);
        
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Iterations',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>

<?php
} 
?>
