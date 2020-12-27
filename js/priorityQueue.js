class PriorityQueue{
    constructor() {
          this.collection = [];
      };
      
      isEmpty(){
          return this.collection.length ? false : true;
      };
      
      enqueue(newItem){ 
        //console.log(this.collection);
        if(this.isEmpty()){
          return this.collection.push(newItem);
        }
  
        var i=0;
        while(this.collection[i] && ( (newItem[1] + 1) > this.collection[i][1]) ){
          i++;
        }
        this.collection.splice(i, 0, newItem);  
      };
      
      
      dequeue(){
          return this.collection.shift()[0];
          };
      
    printCollection() {
      console.log(this.collection);
    }; 
      
      front(){
          if(this.collection.length > 0)
          return this.collection[0][0];
      };
      
     size(){
      return this.collection.length;
      };
    
  }
  
  /*
  var coll= new PriorityQueue();
  coll.enqueue(['blue', 3]);
  coll.enqueue(['cat', 2]);
  coll.enqueue(['red', 3]);
  coll.enqueue(['pig', 1]);
  coll.enqueue(['flag', 6]);
  coll.enqueue(['yellow', 4]);
  coll.printCollection();
  coll.enqueue(['newItem', 1]);
  coll.enqueue(['newItem2', 2]);
  console.log(coll.isEmpty());
  console.log(coll.front());
  console.log(coll.size());
  console.log(coll.dequeue());
  console.log(coll.size());
  coll.printCollection();
  */