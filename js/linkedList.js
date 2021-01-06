function LinkedList() {
    var length = 0;
    var head = null;
  
    var Node = function(element){
      this.element = element;
      this.next = null;
    };
  
    this.head = function(){
      return head;
    };
  
    this.size = function(){
      return length;
    };
  
    this.add = function(element){
  
      var newNode = new Node(element);
  
      if(length == 0){
        head = newNode;
      }else{
        var aux= head;
        while(aux.next !== null){
           aux=aux.next;
        }
        aux.next=newNode;
      }
  
      length++;
    }
    
  }