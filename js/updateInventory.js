function updateInventory(arr1, arr2) {

    for(var i=0; i<arr2.length; i++){
        var flag=0;
        for(var j=0; j<arr1.length; j++){
            if(arr1[j][1] == arr2[i][1]){
                arr1[j][0]+=arr2[i][0];
                flag=1;
            }
        }
        if(flag == 0){
            arr1.push(arr2[i]);
        }
    }

    arr1.sort(function(a, b) {
        if (a[1] > b[1]) {
        return 1;
        }
        if (a[1] < b[1]) {
        return -1;
        }
        return 0;
    });

    //console.log(arr1);

    return arr1;
}




// Example inventory lists
/*
var curInv = [
    [21, "Bowling Ball"],
    [2, "Dirty Sock"],
    [1, "Hair Pin"],
    [5, "Microphone"]
];

var newInv = [
    [2, "Hair Pin"],
    [3, "Half-Eaten Apple"],
    [67, "Bowling Ball"],
    [7, "Toothpaste"]
];

updateInventory(curInv, newInv);
*/



/*
updateInventory([[21, "Bowling Ball"], [2, "Dirty Sock"], [1, "Hair Pin"],
 [5, "Microphone"]], [[2, "Hair Pin"], [3, "Half-Eaten Apple"], [67, "Bowling Ball"], [7, "Toothpaste"]]);
 */