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
   // Only change code above this line
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