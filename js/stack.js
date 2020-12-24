function Stack() {
    var collection = [];
    this.print = function() {
      console.log(collection);
    };
    this.isEmpty = function() {
        return collection.length ? false : true;
        };
    
    this.push = function(a) {
        return collection.push(a);
        };
    
    this.pop = function(){
        return collection.pop();
        };
    
    this.peek = function(){
        return collection[collection.length - 1];
    };
    
    this.clear = function(){
        collection = [];
    };
    
  }
  
  /*
  var a= new Stack();
  console.log(a.isEmpty());
  a.push("a");
  a.push("b");
  a.push("c");
  a.print();
  console.log(a.isEmpty());
  console.log(a.pop());
  console.log(a.peek());
  a.clear();
  console.log(a.isEmpty());
  */