var Node = function(data, prev) {
  this.data = data;
  this.prev = prev;
  this.next = null;
};

var DoublyLinkedList = function() {
  this.head = null;
  this.tail = null;
  

  this.add = (element) => {
    var elem = new Node(element);
    if(this.head === null){
      this.head = elem;
      this.tail = elem;
    }else{
      elem.prev = this.tail;
      this.tail.next = elem;
      this.tail = elem;
    }
  }


  this.remove = (element) => {

    // no elements
    if(this.head === null){
      return null;
    }

    var currNode = this.head;
    while(currNode){
      if(currNode.data === element){
        var prev = currNode.prev;
        var post = currNode.next;
        
        //head
        if(currNode.data === this.head.data){
          this.head = this.head.next;
          //currNode.next = null;
          this.head.prev = null;
          if(post === null){
            this.tail = this.head;
          }
        }

        //mid
        else if(currNode.next !== null && currNode.prev !== null){
        prev.next = post;
        post.prev = prev;
        }

        //tail
        else if(currNode.data === this.tail.data){
          this.tail = null;
          this.tail = prev;
          this.tail.next = null;
        }
        
      }
      currNode = currNode.next;
    }
  }

 
  this.reverse = () => {

    if (this.head === null) {
      return null;
    }

    let previous = null;
    let curr = this.head;
    this.tail = curr;

    while(curr){
      previous = curr.prev;
      curr.prev = curr.next;
      curr.next = previous;
      curr = curr.prev;
    }

    if(previous != null){
      this.head = previous.prev;
    }
  }


  this.print = () => {
    var aux = this.head;
    var s=[];
    while( aux ){
      s.push(aux.data);
      aux= aux.next;
    }
    console.log(s);
  }
  
};


/*
var li= new DoublyLinkedList();
li.add(1);
li.add(2);
li.add(3);
li.add(4);
li.print();
li.reverse();
li.print();
*/