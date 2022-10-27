document.getElementById('myBtn').addEventListener("click", function() {
    document.getElementById("myForm").style.display = "block";
    document.getElementById("myBtn").style.display = "none";
});

document.getElementById('btnClose').addEventListener("click", function() {
    document.getElementById("myForm").style.display = "none";
    document.getElementById("myBtn").style.display = "block";
});