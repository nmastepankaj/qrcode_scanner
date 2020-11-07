var sendqr = document.getElementById("sendqr");

sendqr.addEventListener("click", function() {
    var text = document.getElementById("result").innerText;
    document.getElementById("content2").value = text;
    
});
