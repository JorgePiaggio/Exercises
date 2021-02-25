function pairwise(arr, arg) {

    if(arr.length === 0) return 0;
    
    var indices= new Array();
    
    for(var i=0; i<arr.length; i++){
      if(arr[i+1]){
        for(var j=i+1 ; j<arr.length; j++){
            if(arr[i] + arr[j] == arg){
                if((indices.indexOf(i) == -1) && (indices.indexOf(j) == -1)){
                    indices.push(i);
                    indices.push(j);
                }
            }
        }
      }
    }
    
    arg = indices.reduce((a,b)=> a+b);
      
    console.log(indices);
    
    return arg;
}

/*
pairwise([1, 4, 2, 3, 0, 5], 7) should return 11.

pairwise([1, 3, 2, 4], 4) should return 1.

pairwise([1, 1, 1], 2) should return 1.

pairwise([], 100) should return 0.

*/