document.querySelector('#login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var email = document.querySelector("#email").value;
    var contrasena = document.querySelector("#contrasena").value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../core/cuentas/control_login.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                window.location.href = 'index.php';
            } else {
                document.querySelector('#login-error').textContent = response.message;
                document.querySelector('#login-error').style.display = 'block';
            }
        } else {
            console.error(xhr.statusText);
        }
    };
    xhr.onerror = function() {
        console.error(xhr.statusText);
    };
    xhr.send('email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(contrasena));
});