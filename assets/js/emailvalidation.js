var emailReg = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
function validateForm() {
    var err = false;
	var x=$('#name').val();
	var y=$('#email').val();
	var z=$('#password').val();
	if (x=="" || x==null || x.length < 5)
	  {
	  $('#username-label').text('Username harus lebih dari 5 karakter !');
	  document.getElementById("username-label").style.color = "red"
	  document.getElementById("name").style.borderColor = "red"	  
	  err = true; 
	  };	
	if (y=="" || y==null || !emailReg.test(y)||!myFunction())
	  {
	  $('#email-label').text('Alamat email salah!');
	   document.getElementById("email-label").style.color = "red"
	   document.getElementById("email").style.borderColor = "red"	  
	  err = true;
	  };
	if (z=="" || z==null || z.length < 8)
	  {
	  $('#password-label').text('Password minimal 8 karakter!');
	   document.getElementById("password-label").style.color = "red"
	  document.getElementById("password").style.borderColor = "red"	  
	  err = true;
	  };	
	 if (err)
	  {
		return false;
	  } else {
		return true;
	  }; 
};
$('#name').focusout(function(){validateUsername()});
$('#email').focusout(function(){validateEmail()});
$('#password').focusout(function(){validatePassword();});
$('#name').keyup(function(){validateUsername()});
$('#email').keyup(function(){validateEmail()});
$('#password').keyup(function(){validatePassword();validateConfirm()});

function validateUsername(){
	if ($('#name').val().length < 5)
	  {
	  document.getElementById("username-label").style.color = "red"
	  document.getElementById("name").style.borderColor = "red"
	  $('#username-label').text('Username harus lebih dari 5 karakter !');	  
	  }
	else
	  {
	  document.getElementById("username-label").style.color = "white"
	  document.getElementById("name").style.borderColor = "transparent"
	  $('#username-label').text('');
	  };
};
function myFunction() {
    var str = $('#email').val();  
	var strsplit = str.split("@");
	var str1 = strsplit[1].valueOf();
    var strsplit1 = str1.split(".");	
	if(strsplit1[1].valueOf()=="unair"&&strsplit1[2].valueOf()=="ac"&&strsplit1[3].valueOf()=="id"&&strsplit1.length==4){
		return true;
	}
	else{
		return false;
	};
};

function validateEmail(){
	if($("#email").val().length < 1) {
   	  document.getElementById("email-label").style.color = "red"
	  document.getElementById("email").style.borderColor = "red"
		$("#email-label").text('Alamat email salah!');
	}
	else if(!emailReg.test($("#email").val())) {
		$("#email-label").text('Alamat email salah!');
		
		document.getElementById("email-label").style.color = "red"
	    document.getElementById("email").style.borderColor = "red"
	}	
	else if(!myFunction()){
	$("#email-label").text('Alamat email salah!');
		
		document.getElementById("email-label").style.color = "red"
	    document.getElementById("email").style.borderColor = "red"
	}
	else 
	{
	    document.getElementById("email-label").style.color = "white"
	    document.getElementById("email").style.borderColor = "transparent" 
		$("#email-label").text('');
	};
};

function validatePassword(){
	if ($('#password').val().length < 8)
	  {
	  document.getElementById("password-label").style.color = "red"
	  document.getElementById("password").style.borderColor = "red"
	  $('#password-label').text('Password minimal 8 karakter!');
	  }
	else 
	  {
	  document.getElementById("password-label").style.color = "black"
	  document.getElementById("password").style.borderColor = "transparent"
	  document.getElementById("password-label").style.color = "white"
	  document.getElementById("password").style.borderColor = "transparent"	  
	  var results= '';
	  var score = 0; 
	  $('#password-label').text('');	
			
				};
};