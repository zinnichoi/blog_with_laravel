function check() {
    if(document.getElementById('password').value ===
        document.getElementById('repassword').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = "password match";
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = "password no match";
    }
}