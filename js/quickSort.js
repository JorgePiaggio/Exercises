function quickSort(array) {

    if(array.length == 0){
        return [];
    }else{
        const pivot = array[0];
        var smaller= [];
        var equal= [];
        var greater= [];

        for(let i of array){
            if(i < pivot){
                smaller.push(i);
            }else if(i > pivot){
                greater.push(i);
            }else{
                equal.push(i);
            }
        }

        return [...quickSort(smaller), ...equal, ...quickSort(greater)];
        
        }
    }
    
   // quickSort([1,4,2,8,345,123,43,32,5643,63,123,43,2,55,1,234,92]);