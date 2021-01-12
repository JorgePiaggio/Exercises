function mergeSort(array) {
    if (array.length == 1) 
        return array;

    //console.log(array);

    let half = Math.floor(array.length/2);
    let low = mergeSort(array.slice(0, half));
    let high = mergeSort(array.slice(half));
    
    //console.log("low" ,low, high);

    return merge(low, high);
}
    
function merge(low, high){
    var i = 0, j = 0, mergedArr= [];
    
    while ( i < low.length && j < high.length){
        if(low[i] < high[j]){
            mergedArr.push(low[i++]);
        }else{
            mergedArr.push(high[j++]);
        }
    }

    while (i < low.length){
        mergedArr.push(low[i++]);
    }
    while (j < high.length){
        mergedArr.push(high[j++]);
    }
    
    //console.log(low);

    return mergedArr;
    
    }
    
    // mergeSort([1, 4, 2, 8, 345, 123, 43, 32, 5643, 63, 123, 43, 2, 55, 1, 234, 92]);