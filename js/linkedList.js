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


      this.isEmpty = ()=>{
        return head===null;
      }
    

      this.indexOf = (element) => {
        
        var index = -1;
        if(head === null){
          return index;
        }
    
        var aux= head;
        index=0;

        while(aux.next !== null && aux.element !== element){
          index++;
          aux=aux.next;
        }

        if(aux.element !== element && aux.next===null){
          return -1;
        }else{
          return index;
        }
      }
    
    
      this.elementAt = (index) => {
        var aux = head;
        var i= 0;
    
        while(aux){
          if(i === index){
            return aux.element;
          }
          i++;
          aux=aux.next;
        }
        
        if(aux === null) return undefined;
      }
  }