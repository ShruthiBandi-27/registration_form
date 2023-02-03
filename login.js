
$(document).ready(function() {
    //alert("hello");
      $('#myform').submit(function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        //alert(email + ',' + password);
    
        if (email.length == 0 || password.length == 0) {
          alert('All fields are required');
          return;
        }
    
        $.ajax({
          type: 'POST',
          url: 'profile.php',
          data: {
            email: email,
            password: password,
          },
          success: function(response) {
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            formData = JSON.parse(localStorage.getItem('formData')) || [];
  
            let exist = formData.length && JSON.parse(localStorage.getItem('formData')).every(data=> 
              data.email == email && data.password == password
              );
  
              //alert(data.email.toLowerCase());
  
            if(!exist){
              alert("Incorrect login details, please register first ");
            }
            else {
              alert("Login Successful");
              window.location.href = 'profile.php';
            }
            
           }
        });
      });
    });

