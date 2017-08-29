/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn, .dropdownIcon')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



/*CHECKING THAT THE FORM FIELDS REQUIRED ARE FILLED IN */

function validateForm() {
    var x = document.forms["messageForm"]["name"].value;
    var y = document.forms["messageForm"]["user_email-address"].value;
    if (x == "" && y == "") {
        alert("Name and email address must be filled in");
        return false;
    } else if (y == "") {
        alert("Email address must be filled in");
        return false;
    } else if (x == ""){
        alert("Name must be filled in");
        return false;
    } else {
        alert("Thank you, your message has been sent");
        return false;
    }
}
    
