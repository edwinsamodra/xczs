$(document).ready(function(){
    function load_url(a, b, c) {
        $.post("/posisi", { b, c }, function () {
            location.href = a;
        });
    
        // Get the container element
    
        // Get all buttons with class="btn" inside the container
        var btns = document.getElementsByClassName("limainm");
    
        // Loop through the buttons and add the active class to the current/clicked button
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    }
});
