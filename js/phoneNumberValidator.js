function telephoneCheck(str) {
    let reg= /^(\+?|[1]?)\s?(\([0-9]{3}\)|[0-9]{3})[-\s]?[0-9]{3}[-\s]?[0-9]{4}$/;
    
    

    return reg.test(str);
    
    }
    
  //  telephoneCheck("(275)76227382");