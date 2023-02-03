
$(document).ready(function() {
  //alert("hello");
    $('#myform').submit(function(e) {
      e.preventDefault();
      var email = $('#email').val();
      var password = $('#password').val();
      var age = $('#age').val();
      var dob = $('#dob').val();
      var mobile = $('#mobile').val();
  
      if (email.length == 0 || password.length == 0 || age.length == 0 || dob.length == 0 || mobile.length == 0) {
        alert('All fields are required');
        return;
      }
  
      $.ajax({
        type: 'POST',
        url: 'login.php',
        data: {
          email: email,
          password: password,
          age: age,
          dob: dob,
          mobile: mobile
        },
        success: function(response) {
          formData = JSON.parse(localStorage.getItem('formData')) || [];

          let exist = formData.length && JSON.parse(localStorage.getItem('formData')).every(data=> 
            data.email == email
            );

            //alert(data.email.toLowerCase());

          if(!exist){
            formData.push({"email":email,"password":password});
            localStorage.setItem('formData',JSON.stringify(formData));
            alert("account created");
          }
          else {
            alert("account exists");
            
          }
          window.location.href = 'login.php';
         }
      });
    });
  });