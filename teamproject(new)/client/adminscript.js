let rows = document.getElementsByClassName('dataRow');

for (const row of rows){ //iterate through each row; each database entry
    row.onclick = function(){ //set onclick property of the row to sticky row data to modal form

        //select each column of the row
        //NOTE: each row contains 8 columns
        let facilityId = row.children[0].id;
        let fname = row.children[0].innerHTML; //get child, then apply innerHTML to get value
        let location = row.children[1].innerHTML;
        let fmrn = row.children[2].innerHTML;
        let ffmrn = row.children[3].innerHTML;
        let ffln = row.children[4].innerHTML;
        let fflfn = row.children[5].innerHTML;
        let radio = row.children[7].innerHTML;
        let film = row.children[6].innerHTML;

        //select each input field of the form, apply the value attribute, then set it according to the value
        document.getElementById('fname').value = fname;
        document.getElementById('location').value = location;
        document.getElementById('fmrn').value = fmrn;
        document.getElementById('ffmrn').value = ffmrn;
        document.getElementById('ffln').value = ffln;
        document.getElementById('fflfn').value = fflfn;

        switch (radio){ //push images, since input is radio
            case "Yes":
                document.getElementById('yes').checked = true;
                break;
            case "No":
                document.getElementById('no').checked = true;
                break;
            case "No*":
                document.getElementById('no*').checked = true;
                break;
        }

        //document.getElementById('film').value.split(',')

        let checkboxes = document.querySelectorAll("input[type=checkbox]");
        for (const checkbox of checkboxes){
            checkbox.checked = false;
        }

        if (/CT/.test(film)) {
            document.getElementById('inlineCheckbox1').checked = true;
        }
        if (/DEXA/.test(film))
        {
            document.getElementById('inlineCheckbox2').checked = true;
        }
        if (/MG/.test(film))
        {
            document.getElementById('inlineCheckbox3').checked = true;
        }
        if (/MRI/.test(film))
        {
            document.getElementById('inlineCheckbox4').checked = true;
        }
        if (/PATH/.test(film))
        {
            document.getElementById('inlineCheckbox5').checked = true;
        }
        if (/US/.test(film))
        {
            document.getElementById('inlineCheckbox6').checked = true;
        }
        if (/XR/.test(film))
        {
            document.getElementById('inlineCheckbox7').checked = true;
        }

        let facilityForm = document.getElementById('facility-form'); //use action attribute to pass facilityId
        facilityForm.action = 'https://lorem--ipsum.greenriverdev.com/teamproject(new)/edit/confirm.php?facility_id=' + facilityId;


    }
}

/*
* js for validations of form entry*/

document.getElementById("facility-form").onsubmit = validate;

function validate() {
    clearErrors();

    // flag variable to track if form is true
    let valid = true;

    // validate facility name
    let facility = document.getElementById("fname").value;
    if (facility === "")
    {
        document.getElementById("err-fname").style.display = "block";
        valid = false;
    }

    // validate facility location
    let location = document.getElementById("floc").value;
    if (location === "")
    {
        document.getElementById("err-floc").style.display = "block";
        valid = false;
    }

    let medicalRecords = document.getElementById("fmrn").value;
    if (medicalRecords === "");
    {
        medicalRecords = "N/A";
    }

    let medicalRecordsFax = document.getElementById("ffmrn").value;
    if ( medicalRecordsFax === "");
    {
        medicalRecordsFax = "N/A";
    }

    let filmLibrary = document.getElementById("ffln").value;
    if (filmLibrary === "");
    {
        filmLibrary = "N/A";
    }
    let filmLibrarySecondary = document.getElementById("ffsln").value;
    if (filmLibrarySecondary === "");
    {
        filmLibrarySecondary = "N/A";
    }
    let filmLibraryFax = document.getElementById("fflfn").value;
    if (filmLibraryFax === "");
    {
        filmLibraryFax = "N/A";
    }


    // the radio buttons
    let methodButtons = document.getElementsByName("push");
    let methodIsChecked = false;
    for (let i = 0; i < methodButtons.length; i++) {
        if(methodButtons[i].checked){
            methodIsChecked = true;
        }

    }
    if(!methodIsChecked){
        document.getElementById("err-method").style.display = "block";
    }
    return valid;


}
function clearErrors() {
    let errors = document.getElementsByClassName("err");
    for (let i = 0; i < errors.length; i++) {
        errors[i].style.display = "none";

    }
}

