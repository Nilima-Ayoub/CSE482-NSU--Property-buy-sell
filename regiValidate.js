function validateForm(){
    
   /* password check */ 
    var password = document.getElementById("regipwd").value;

    var checkpass=/^[A-Za-z0-9]{5,10}$/;
    if(!password.trim().match(checkpass)){
        alert("check password: no special character and length [5-8 characters long]");
        return false;
    }
    var upper=0;
    var num=0;
    var string=password.toString();
var char="";

for(var i=0;i<string.length;i++){
    char=string.charAt(i);
if(!isNaN(char)){
num++;
}
else{
    if(char==char.toUpperCase()){
        upper++;
        }
}
}

if(upper==0||num==0){
    alert("check password: no upper case and number");
return false;
}

if(upper>1||num>1){
    alert("check password: please use one upper case and number");
return false;
}

 /* phone number check */
var phonenumber = document.getElementById("regiphn").value;
var checkphn=phonenumber.toString();

if(checkphn.charAt(0)!="0"||checkphn.charAt(1)!="1"||checkphn.length!=11){
    alert("check phone number: please enter a valid phone number");
    return false;
}
    else return true;
    
}



