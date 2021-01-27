<?php

function flatlandSpaceStations($n, $c) {
    $max = 0;   // maximum min distance from a city to station
    $city_dist;
 
    for($i = 0; $i < $n; $i++){
        if(!in_array($i, $c)){                      // search distances != 0
            $city_dist = 0;
            for($j = 0; $j < sizeof($c); $j++){     // minimum distance for each city
                $min = abs($i - $c[$j]);
                if($min < $city_dist || $city_dist == 0){
                    $city_dist = $min;
                }
            }
            if($city_dist > $max){                  // maximum min distance 
                $max = $city_dist;
            }
            
        }
    }
    
    return $max;
}?>


/*

Flatland is a country with a number of cities, some of which have space stations. Cities are numbered consecutively and each has a road of 1km length connecting it to the next city. It is not a circular route, so the first city doesn't connect with the last city. Determine the maximum distance from any city to it's nearest space station.


Function Description

Complete the flatlandSpaceStations function in the editor below. It should return an integer that represents the maximum distance any city is from a space station.


flatlandSpaceStations has the following parameter(s):

    n: the number of cities
    c: an integer array that contains the indices of cities with a space station, 1-based indexing

 
Constraints

There will be at least 1 city with a space station.
No city has more than one space station.


Output Format

Print an integer denoting the maximum distance that an astronaut in a Flatland city would need to travel to reach the nearest space station.


Sample Input 0

5 2
0 4


Sample Output 0

2

*/
