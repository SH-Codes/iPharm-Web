let count = 1;

        document.getElementById("decrement").onclick = function() {
                 count -=1;
        document.getElementById("quantity").innerHTML = count;
        }
        document.getElementById("increment").onclick = function() {
                 count +=1;
        document.getElementById("quantity").innerHTML = count;
        }