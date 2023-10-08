<?php
    /**
     * Homework 4 - PHP Introduction
     *
     * Computing ID: pvn5nv
     * Resources used: 
     * https://www.w3schools.com/php/func_array_sum.asp
     * https://www.w3schools.com/php/php_numbers.asp#:~:text=PHP%20Integers&text=An%20integer%20data%20type%20is,the%20limit%20of%20an%20integer.
     */
     

     function calculateAverage($scores, $drop) {
        $totalScore = 0;
        $totalMaxPoints = 0;

        if ($drop) {
            $lowestScoreKey = -1;

            foreach ($scores as $key => $score) {
                if ($lowestScoreKey==-1 || ($score["score"] / $score["max_points"]) * 100 < ($scores[$lowestScoreKey]["score"] / $scores[$lowestScoreKey]["max_points"]) * 100) {
                    $lowestScoreKey = $key;
                }
            }

            if ($lowestScoreKey !== -1) {
                unset($scores[$lowestScoreKey]);
            }
        }

        foreach ($scores as $score) {
            $totalScore += $score["score"];
            $totalMaxPoints += $score["max_points"];
        }

        if ($totalMaxPoints == 0) {
            return 0;
        }

        return round(($totalScore / $totalMaxPoints) * 100, 3);
    }