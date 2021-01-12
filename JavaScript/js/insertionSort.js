function insertionSort(array) {
    
    var i=0;

    while( i < array.length-1){
      insertar(array, i, array[i+1]);
      i++;
    }
    
    function insertar(arr, index, dato){
        while(index >= 0 && dato < arr[index]){
            arr[index+1]=arr[index];
            index--;
        }
        
        arr[index+1]=dato;
    }
    
    // console.log(array);
    
      return array;
    }
    
    // insertionSort([1, 4, 2, 8, 345, 123, 43, 32, 5643, 63, 123, 43, 2, 55, 1, 234, 92]);