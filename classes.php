<?php
class SequenceCalculator {
    public function calculateSequence($x) {
        $sequence = [$x];
        while ($x != 1) {
            if ($x % 2 == 0) {
                $x = $x / 2;
            } else {
                $x = 3 * $x + 1;
            }
            $sequence[] = $x;
        } 
        return $sequence;
    }

    public function findMaxValue($sequence) {
        return max($sequence);
    }

    public function findIterations($sequence) {
        return count($sequence) - 1; 
    }

    public function findMinMaxIterations($start, $finish) {
        $maxIterations = 0;
        $minIterations = PHP_INT_MAX;
        $maxIterationsNumber = null;
        $minIterationsNumber = null;
        $highestValueMaxIterations = null;
        $highestValueMinIterations = null;

        for ($x = $start; $x <= $finish; $x++) {
            $sequence = $this->calculateSequence($x);

            if (is_string($sequence)) {
                echo "Error: " . $sequence . "<br>";
                continue; 
            }

            $iterations = $this->findIterations($sequence);
            $maxValue = $this->findMaxValue($sequence);

            if ($iterations > $maxIterations) {
                $maxIterations = $iterations;
                $maxIterationsNumber = $x;
                $highestValueMaxIterations = $maxValue; 
            }

            if ($iterations < $minIterations) {
                $minIterations = $iterations;
                $minIterationsNumber = $x;
                $highestValueMinIterations = $maxValue; 
            }

            echo "Sequence for $x: " . implode(', ', $sequence) . "<br>";
            echo "Number: $x (Iterations: $iterations, Max value: $maxValue)<br>";
        }

        $result = [];

        if ($maxIterationsNumber !== null) {
            $result['maxIterations'] = ["number" => $maxIterationsNumber, "iterations" => $maxIterations, "highestValue" => $highestValueMaxIterations];
        }

        if ($minIterationsNumber !== null) {
            $result['minIterations'] = ["number" => $minIterationsNumber, "iterations" => $minIterations, "highestValue" => $highestValueMinIterations];
        }

        return $result;
    }
}

class GeometricProgression {
    private $initialTerm;
    private $commonRatio;
    private $numTerms;

    public function __construct($initialTerm, $commonRatio, $numTerms) {
        $this->initialTerm = $initialTerm;
        $this->commonRatio = $commonRatio;
        $this->numTerms = $numTerms;
    }

    public function getSequence() {
        $sequence = [];
        $currentTerm = $this->initialTerm;

        for ($i = 0; $i < $this->numTerms; $i++) {
            $sequence[] = $currentTerm;
            $currentTerm *= $this->commonRatio;
        }

        return $sequence;
    }

    public function getNthTerm($n) {
        return $this->initialTerm * pow($this->commonRatio, $n - 1);
    }

    public function getSum() {
        if ($this->commonRatio == 1) {
            return $this->initialTerm * $this->numTerms;
        } else {
            return $this->initialTerm * (1 - pow($this->commonRatio, $this->numTerms)) / (1 - $this->commonRatio);
        }
    }
}

?>
