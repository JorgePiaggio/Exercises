function checkCashRegister(price, cash, cid) {
    const values=  [ 
      ["ONE HUNDRED", 100],
      ["TWENTY", 20],
      ["TEN", 10],
      ["FIVE", 5],
      ["ONE", 1],
      ["QUARTER", 0.25],
      ["DIME", 0.1],
      ["NICKEL", 0.05],
      ["PENNY", 0.01]
      ];
    let difference = cash-price;
    let stat={
      status:"INSUFFICIENT_FUNDS",
      change:[]
    };
    var index=-1;
    
    if(difference > 0){
      for(var i=0; i < values.length; i++){
        if(difference > values[i][1]){
          for(var j=0; j < cid.length; j++){
            if(cid[j][0] == values[i][0]){
                index=j;
                while(difference >= values[i][1] && cid[j][1]>0){
                    stat.change.push(values[i]);
                    difference-=Math.round(values[i][1] * 100) / 100;
                    difference=Math.round(difference * 100) / 100;
                    cid[index][1]-=Math.round(values[i][1] * 100) / 100;
                }
            }
            if(cid[j][1]== 0){ //pushear valores de entrada q se mandan con cero, requerido en fcc ¿?¿?
                stat.change.push(cid[j]);
            }
          }
        }
      }
    }
    
    //sumar valores repetidos
    if(difference == 0){

        const combineArray = (arr) => {
        const map = {};
        for(const index in arr){
            const name = arr[index][0];
            const val = arr[index][1];
            if(map[name]){
                map[name] += val;
            }else{
                map[name] = val;
            }
        }

        return Object.keys(map).map(key => [key, map[key]]);
        }
        

        stat.change=combineArray(stat.change);
        
        //chequear si quedo resto disponible en caja
        for(var k=0; k < cid.length; k++){
            if(cid[k][1] > 0 ){
                stat.status= "OPEN";
                break;
            }else{
                stat.status= "CLOSED";
            }
        }

    }else{
        stat.change= [];
    }

    //redondear valores.... maldito js!
    for(var i = 0; i< stat.change.length; i++){
    stat.change[i][1]=Math.round(stat.change[i][1]*100)/100;
    }


      return stat;
    
}

//checkCashRegister(19.5, 20, [["PENNY", 0.5], ["NICKEL", 0], ["DIME", 0], ["QUARTER", 0], ["ONE", 0], ["FIVE", 0], ["TEN", 0], ["TWENTY", 0], ["ONE HUNDRED", 0]]);