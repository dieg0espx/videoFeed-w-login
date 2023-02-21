const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

let email = urlParams.get('email');
let name = urlParams.get('name');
let lastName = urlParams.get('lastName');



let txt_email = document.getElementById('txt_email');
let txt_name = document.getElementById('txt_name');
let txt_lastName = document.getElementById('txt_lastName');


txt_email.value = email;
txt_name.value = name;
txt_lastName.value = lastName;
