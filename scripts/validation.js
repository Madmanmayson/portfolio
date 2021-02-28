document.getElementById('sign-up-form').onsubmit = validate;

//Binding events to hidden fields
document.getElementById('mailingList').onchange = toggleMailType;
document.getElementById('meeting').onchange = toggleOther;

const emailRegex = new RegExp(/[\w!#$%&\'*+/=?^`{|}~\.-]+@[A-z0-9]+\.[A-z0-9]+/);
const linkedInRegex = new RegExp(/http(?:s)?:\/\/(?:www.)?linkedin.com\/in\/(?:.)+/i);
/*
Note: This patter for LinkedIn is specific to only work for that site,
in the future use my general url Regex found below for validation:
/(?:(?:http(?:s)?:\/\/)?(?:www\.)?)?(?<domain>[\w\.-]+){1}(?<path>.*)/g
 */

function validate() {
    let isValid = true;

    let refeshElements = document.getElementsByClassName('error');
    for (let i = refeshElements.length - 1; i >= 0; i--) { //have to go in reverse cause size changes as it parses
        refeshElements[i].classList.toggle('error', false);
    }

    let fname = document.getElementById('fname');
    if (!fname.value) {
        isValid = false;
        fname.parentNode.children[2].classList.toggle('error');
        fname.classList.toggle('error');
    }

    let lname = document.getElementById('lname');
    if (!lname.value) {
        isValid = false;
        lname.parentNode.children[2].classList.toggle('error');
        lname.classList.toggle('error');
    }


    let email = document.getElementById('email');
    if (email.value) { //checks if email does exist rather then requiring
        console.log(emailRegex.test(email.value));
        if (!emailRegex.test(email.value)) {

            isValid = false;
            email.parentNode.children[2].classList.toggle('error');
            email.classList.toggle('error');
        }
    }

    let mailingList = document.getElementById('mailingList');
    if (mailingList.checked && !email.value) {
        isValid = false;
        email.parentNode.children[2].classList.toggle('error', true); //true in case they exist from before
        email.classList.toggle('error', true); //true in case they exist from before
    }

    let linkedIn = document.getElementById('linkedIn');
    if (linkedIn.value) { //checks if email does exist rather then requiring
        if (!linkedInRegex.test(linkedIn.value)) {
            isValid = false;
            linkedIn.parentNode.children[2].classList.toggle('error');
            linkedIn.classList.toggle('error');
        }
    }

    let meeting = document.getElementById('meeting');
    if(meeting.value === 'choose'){
        isValid = false;
        meeting.parentNode.children[2].classList.toggle('error');
        meeting.classList.toggle('error');
    }

    return isValid;
}

function textFunction(event){
    console.log(this);
}

function toggleMailType(){
    let target = document.getElementById('mailTypeExtra');
    if(this.checked){
        target.classList.toggle('d-none', false);
    } else {
        target.classList.toggle('d-none', true);
    }
}

function toggleOther(){
    let target = document.getElementById('otherExtra');
    if(this.value === 'other'){
        target.classList.toggle('d-none', false);
    } else {
        target.classList.toggle('d-none', true);
    }
}
