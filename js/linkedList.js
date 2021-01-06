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
    

    this.remove = function(element){
        //if element is the first
        if(head.element === element){
          head = head.next;
          return length--;
        }
    
        // else search previous node
        var prev = head;
        while( prev ){
            let seek=prev.next;
            if(seek){
                if(seek.element === element){
                prev.next = seek.next;
                return length--;
                }
            }
            prev=seek;
        }
      }

  }