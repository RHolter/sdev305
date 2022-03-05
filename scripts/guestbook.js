document.getElementById("guest-form").onsubmit = validate;

function validate() {
    clearErrors();

    // flag variable to track if form is valid
    let valid = true;

    // validate first name
   // let first = document.getElementById("fname").value;
   //
   //  if (first === "")
   //  {
   //      document.getElementById("err-fname").style.display = "block";
   //      valid = false
   //  }

    // validate last name
    let last = document.getElementById("lname").value;
    if (last === "")
    {
        document.getElementById("err-lname").style.display = "block";
        valid = false;
    }



    // Return false if any errors were found
    return valid;

}

// clears all  error messages
function clearErrors()
{
    let errors = document.getElementsByClassName("err");
    for (let i = 0; i < errors.length; i++)
    {
        errors[i].style.display = "none";

    }
}