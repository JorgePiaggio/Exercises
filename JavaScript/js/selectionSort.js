function selectionSort(array) {

    var aux;
    
    for(var i = 0; i < array.length; i++){
        for(var j = i; j < array.length; j++){
            if(array[j] < array[i]){
            aux=array[j];
            array[j]=array[i];
            array[i]=aux;
            }
        }
        //console.log(array);
    }
    
      return array;
    }
    
    
 //   selectionSort([1, 4, 2, 8, 345, 123, 43, 32, 5643, 63, 123, 43, 2, 55, 1, 234, 92]);