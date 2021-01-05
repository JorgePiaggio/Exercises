class Set {
    constructor() {
        this.dictionary = {};
        this.length = 0;
     };
 

    // This method will check for the presence of an element and return true or false
    has(element) {
      return this.dictionary[element] !== undefined;
    }
  

    // This method will return all the values in the set
    values() {
      return Object.keys(this.dictionary);
    }
  
  
    add(element) {
      if(!this.has(element)){
        this.dictionary[element] = 0;
        this.length++;
        return true;
      }else{
        return false;
      }
    }
 

    remove(element) {
      if(this.has(element)){
        delete this.dictionary[element];      
        this.length--;
        return true;
      }else{
        return false;
      }
    }
 
    size(){
      return this.length;
    }
   

    //union of 2 sets
    union(set2){
    
    	let set1 = new Set();
    	this.values().forEach(func);
    	set2.values().forEach(func);

        function func(item){
           set1.add(item);
        }
        
     return set1;
    }

    
    //intersection of 2 sets
    intersection(set2){
    
      let set1 = new Set();
      this.values().forEach(value => {
          set2.values().forEach(val => {
            if(value === val){
              set1.add(value);
            }
          });      
      });

      return set1;
    }


    //difference between 2 sets (elements in A not in B)
    difference(set){

      let newSet = new Set();
      
      this.values().forEach(value => {
        if(!set.dictionary[value]){
          newSet.add(value);
        }
      });

      return newSet;
    }

}
 

 /*
 var s = new Set();
 s.add(5);
 s.add(1);
 s.add(6);
 s.add(9);
 s.add(22);
 s.remove(6);
 s.add(9);
 
 console.log(s.values());
 console.log(s.size());

 */
