function sym(args) {

    var length = arguments.length;
    var diff= new Array();
    
    // replace arrays with only unique values
    for(var i = 0; i < length; i++){
        var aux= [];
        for(var j = 0; j < arguments[i].length; j++){
          if(aux.indexOf(arguments[i][j]) == -1){
                aux.push(arguments[i][j]);
              }
        }
        arguments[i]=aux;
    }
    
    
    //sym diff between arrays
    for(var i = 0; i < length; i++){
        for(var j = 0; j < arguments[i].length; j++){
            if(diff.indexOf(arguments[i][j]) == -1){
                diff.push(arguments[i][j]);
              }else{
                diff.splice(diff.indexOf(arguments[i][j]), 1);
              }
          }
    }
    
    
    //sort final array
    diff.sort(function(a, b) {
      return a - b;
    });
    
      return diff;
    }
    

/* tests

sym([1, 2, 5], [2, 3, 5], [3, 4, 5]);
sym([1, 2, 3], [5, 2, 1, 4]);
sym([1, 2, 3], [5, 2, 1, 4]);
sym([1, 2, 3, 3], [5, 2, 1, 4]);
sym([1, 2, 3, 3], [5, 2, 1, 4]);
sym([1, 2, 3], [5, 2, 1, 4, 5]); 
sym([1, 2, 3], [5, 2, 1, 4, 5]);
sym([1, 2, 5], [2, 3, 5], [3, 4, 5]);
sym([1, 2, 5], [2, 3, 5], [3, 4, 5]);
sym([1, 1, 2, 5], [2, 2, 3, 5], [3, 4, 5, 5]);
sym([3, 3, 3, 2, 5], [2, 1, 5, 7], [3, 4, 6, 6], [1, 2, 3]);
sym([3, 3, 3, 2, 5], [2, 1, 5, 7], [3, 4, 6, 6], [1, 2, 3]);
sym([3, 3, 3, 2, 5], [2, 1, 5, 7], [3, 4, 6, 6], [1, 2, 3], [5, 3, 9, 8], [1]);

*/