const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

let email = urlParams.get('email');
let txt_email = document.getElementById('txt_email');
txt_email.value = email;
