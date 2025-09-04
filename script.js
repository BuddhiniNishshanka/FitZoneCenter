document.addEventListener("DOMContentLoaded", function(){
    console.log("JavaScript Loaded");

    //Dynamic Greeting Message
    let greetingMessage = document.getElementById("greetingMessage");
    let hour = new Date().getHours();
    if (hour<12) {
        greetingMessage.textContent = "Good Morning!";
    } else if (hour<18) {
        greetingMessage.textContent = "Good Afternoon!";
    } else {
        greetingMessage.textContent = "Good Evening!";
    }

    //Smooth Scrolling
    document.querySelectorAll('.nav a').forEach(anchor => {
        anchor.addEventListener('click', function(event) {
            event.preventDefault();
            let targetId = this.getAttribute('href');
            if (targetId.startsWith("#")) {
                document.querySelector(targetId).scrollIntoView({
                    behavior: 'smooth'
                });
            } else {
                window.location.href = targetId;
            }
        });
    });

});


