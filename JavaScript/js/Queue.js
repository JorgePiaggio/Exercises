function Queue() {
    var collection = [];
    this.print = function() {
      console.log(collection);
    };
  
    this.isEmpty = function() {
        return collection.length ? false : true;
        };
    
    this.enqueue = function(a) {
        return collection.push(a);
        };
    
    this.dequeue = function(){
        return collection.shift();
        };
    
    this.front = function(){
        return collection[0];
    };
    
    this.size = function(){
    return collection.length;
    };
  }
  
  /*
  var a= new Queue();
  console.log(a.isEmpty());
  a.enqueue("a");
  a.enqueue("b");
  a.enqueue("c");
  a.print();
  console.log(a.isEmpty());
  console.log(a.dequeue());
  console.log(a.front());
  a.size();
  console.log(a.isEmpty());

  */