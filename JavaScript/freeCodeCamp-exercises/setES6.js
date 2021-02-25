
/*

Let's look at the .has and .size methods available on the ES6 Set object.

First, create an ES6 Set

var set = new Set([1,2,3]);

The .has method will check if the value is contained within the set.

var hasTwo = set.has(2);

The .size method will return an integer representing the size of the Set

var howBig = set.size;


*/


function checkSet(arrToBeSet, checkValue){

    // Only change code below this line
    var newSet= new Set(arrToBeSet);
    var checks = new Array();
    checks.push(newSet.has(checkValue), newSet.size);
    // Only change code above this line
 
    return checks;
 }
 

//  ... can take iterable objects in ES6 and turn them into arrays.

function checkSet2(set){
    // Only change code below this line
    var newSet = [...set];
 
    return newSet;
    // Only change code above this line
 }


 console.log(checkSet([4, 5, 6], 3));
 console.log(checkSet2([1, 4, 5, 6, 7, 11, 32]));