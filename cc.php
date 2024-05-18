<?php
require_once 'classes.php';

class ExtendedSequenceCalculator extends SequenceCalculator {
    public function calculateHistogram($start, $finish) {
        $histogramData = [];

        for ($x = $start; $x <= $finish; $x++) {
            $sequence = $this->calculateSequence($x);
            $iterations = $this->findIterations($sequence);

            if (!isset($histogramData[$iterations])) {
                $histogramData[$iterations] = 0;
            }

            $histogramData[$iterations]++;
        }

        return $histogramData;
    }
}

$extendedCalculator = new ExtendedSequenceCalculator();
$start = 1;
$finish = 100;
$histogramData = $extendedCalculator->calculateHistogram($start, $finish);

?>
