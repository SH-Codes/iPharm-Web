let count = 1;

document.getElementById("decrement").onclick = function() {
    count -= 1;
    if (count < 1) {
        count = 1;
    }
    document.getElementById("quantity").value = count;
};

document.getElementById("increment").onclick = function() {
    count += 1;
    document.getElementById("quantity").value = count;
};

if (isNaN(count) || count < 1) {
    count = 1;
}
