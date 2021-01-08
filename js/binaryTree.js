var displayTree = tree => console.log(JSON.stringify(tree, null, 2));

function Node(value) {
  this.value = value;
  this.left = null;
  this.right = null;
}

function BinarySearchTree() {

    this.root = null;

    this.add = (int) => {

        if(Number.isInteger(int)){
            let newNode = new Node(int);
        
            if(this.root === null){
                this.root = newNode;
            }else{
                let look = new Node();
                look = this.root;

                while(look != null){ //console.log(look);
                    if(int < look.value){
                        if(!look.left){
                            look.left = newNode;
                            return;
                        }
                    look = look.left;
                    }else if(int > look.value){
                        if(!look.right){
                            look.right = newNode;
                            return;
                        }
                    look = look.right;
                    }else{ //num already exists
                        return null;
                    }
                }
                look.value = int;
            }
        }else{
            return null;
        }
    }

    //min value in tree
    this.findMin = () => {
        if(this.root === null)
            return null;

        let min = this.root;

        while(min.left){
            min = min.left;
        }
        return min.value;
    }

    //max value in tree
    this.findMax = () => {
        if(this.root === null)
            return null;

        let max = this.root;

        while(max.right){
            max = max.right;
        }
        return max.value;
    }

    //check presence of value in tree
    this.isPresent = (value) => {
        if(!this.root)
            return false;

        if(this.root.value === value)
            return true;

        let aux = new Node();
        aux = this.root;

        while(aux){
            if(value === aux.value)
                return true;

            if(value < aux.value){
                aux = aux.left;
            }else if(value > aux.value){
                aux = aux.right;
            }
        }
        return false;
        
    }

}


let bt = new BinarySearchTree();
bt.add(2);
bt.add(21);
bt.add(-33);
bt.add(15);
bt.add(6);
bt.add(-5);
displayTree(bt);