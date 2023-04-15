document.querySelector('#register-form').addEventListener('submit', function(event) {
    event.preventDefault();
  
    var email = document.querySelector('#email').value;
    var password = document.querySelector('#contrasena').value;
    /*var confirmPassword = document.querySelector('#confirm-password').value;
  
    if (password !== confirmPassword) {
      document.querySelector('#register-error').textContent = 'Las contraseñas no coinciden';
      document.querySelector('#register-error').style.display = 'block';
      return;
    }*/
  
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../core/cuentas/control_registro.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          window.location.href = 'index.php';
        } else {
          document.querySelector('#register-error').textContent = response.message;
          document.querySelector('#register-error').style.display = 'block';
        }
      } else {
        console.error(xhr.statusText);
      }
    };
    xhr.onerror = function() {
      console.error(xhr.statusText);
    };
    xhr.send('email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password));
  });