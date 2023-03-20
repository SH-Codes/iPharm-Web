let count = 1;

document.getElementById("decrement").onclick = function() {
    count -=1;
    document.getElementById("quantity").value = count;
}
document.getElementById("increment").onclick = function() {
    count +=1;
    document.getElementById("quantity").value = count;
}

if (count.valueOf < 1){
    count.valueOf +=1;
}
else if (count.valueOf === NaN) {
    count.valueOf = 1
}