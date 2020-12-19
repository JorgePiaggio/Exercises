function bubbleSort(array) {
    
  var swap = 0;
  
  do{
    swap = 0;
    for(var i = 0; i < array.length; i++){
      if(array[i+1]){
        if(array[i]>array[i+1]){
          var aux = array[i];
          array[i] = array[i+1];
          array[i+1] = aux;
          swap = 1;
        }
      }
    }
  }while(swap == 1);

  //console.log(array);

    return array;
  }
  
  bubbleSort([1, 4, 2, 8, 345, 123, 43, 32, 5643, 63, 123, 43, 2, 55, 1, 234, 92]);