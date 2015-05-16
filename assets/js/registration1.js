var emailReg = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
function validateForm() {
    var err = false;
	var b=$('#inputInstansi').val();
	var c=$('#inputAcara').val();
	var e=$('#inputDate').val();
	var f=$('#inputDeskripsi').val();
	validateHTM();  
	validateCP();
	validateTwitter();
	validateFacebook();
	validateWebpage();
	validateEmail();
	validateCP();
	if (!validateFakultas())
	  {
	  $('#inputFakultas-label').text('Fakultas harus diisi!');
	  document.getElementById("inputFakultas-label").style.color = "red"
	  document.getElementById("inputFakultas").style.borderColor = "red"	  
	  err = true;
	  };	
	
	if (b=="" || b==null)
	  {
	  $('#inputInstansi-label').text('Instansi harus diisi!');
	   document.getElementById("inputInstansi-label").style.color = "red"
	   document.getElementById("inputInstansi").style.borderColor = "red"	  
	  err = true;
	  };
	if (c=="" || c==null)
	  {
	  $('#inputAcara-label').text('Acara harus diisi!');
	   document.getElementById("inputAcara-label").style.color = "red"
	   document.getElementById("inputAcara").style.borderColor = "red"	  
	  err = true;
	  };
	if (!validateJenis())
	  {
	  $('#inputJenis-label').text('Jenis acara harus diisi!');
	   document.getElementById("inputJenis-label").style.color = "red"
	   document.getElementById("inputJenis").style.borderColor = "red"	  
	  err = true;
	  };  
	if (e=="" || e==null)
	  {
	  $('#inputDate-label').text('Tanggal harus diisi!');
	   document.getElementById("inputDate-label").style.color = "red"
	   document.getElementById("inputDate").style.borderColor = "red"	  
	  err = true;
	  };
	if (f=="" || f==null)
	  {
	  $('#inputDeskripsi-label').text('Deskripsi harus diisi!');
	   document.getElementById("inputDeskripsi-label").style.color = "red"
	   document.getElementById("inputDeskripsi").style.borderColor = "red"	  
	  err = true;
	  };  
	
	  if (err)
	  {
		return false;
	  } else {
		return true;
	  }; 
};


$('#inputFakultas').focusout(function(){validateFakultas()});
$('#inputInstansi').focusout(function(){validateInstansi()});
$('#inputAcara').focusout(function(){validateAcara();});
$('#inputJenis').focusout(function(){validateJenis()});
$('#inputHTM').focusout(function(){validateHTM()});
$('#inputDate').focusout(function(){validateDate();});
$('#inputDeskripsi').focusout(function(){validateDeskripsi()});
$('#inputCP').focusout(function(){validateCP()});
$('#inputTwitter').focusout(function(){validateTwitter();});
$('#inputFacebook').focusout(function(){validateFacebook()});
$('#inputEmail').focusout(function(){validateEmail()});
$('#inputWebpage').focusout(function(){validateWebpage();});

$('#inputFakultas').keyup(function(){validateFakultas()});
$('#inputInstansi').keyup(function(){validateInstansi()});
$('#inputAcara').keyup(function(){validateAcara();});
$('#inputJenis').keyup(function(){validateJenis()});
$('#inputHTM').keyup(function(){validateHTM()});
$('#inputDate').keyup(function(){validateDate();});
$('#inputDeskripsi').keyup(function(){validateDeskripsi()});
$('#inputCP').keyup(function(){validateCP()});
$('#inputTwitter').keyup(function(){validateTwitter();});
$('#inputFacebook').keyup(function(){validateFacebook()});
$('#inputEmail').keyup(function(){validateEmail()});
$('#inputWebpage').keyup(function(){validateWebpage();});

function removeFakultas(){
var select=document.getElementById('inputFakultas');
    select.remove(0);
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#gambar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#inputUpload").change(function(){
    readURL(this);
});

function validateFakultas(){
    var e = document.getElementById("inputFakultas");
    var strUser = e.options[e.selectedIndex].value;
 	if (strUser=="0")
	  {
	  document.getElementById("inputFakultas-label").style.color = "red"	  
	  $('#inputFakultas-label').text('Fakultas harus diisi!');	  
	  document.getElementById("inputFakultas").style.bordercolor = "red"
	  return false;
	  }
	else
	  {
	  document.getElementById("inputFakultas-label").style.color = "white"
	  $('#inputFakultas-label').text('');
	  document.getElementById("inputFakultas").style.bordercolor = "transparent"
	  return true;
	  };
};

function validateInstansi(){
	if ($('#inputInstansi').val().length < 1)
	  {
	  document.getElementById("inputInstansi-label").style.color = "red"
	  document.getElementById("inputInstansi").style.borderColor = "red"
	  $('#inputInstansi-label').text('Instansi harus diisi!');	  
	  }
	else
	  {
	  document.getElementById("inputInstansi-label").style.color = "white"
	  document.getElementById("inputInstansi").style.borderColor = "transparent"
	  $('#inputInstansi-label').text('');
	  };
};
function validateAcara(){
	if ($('#inputAcara').val().length < 1)
	  {
	  document.getElementById("inputAcara-label").style.color = "red"
	  document.getElementById("inputAcara").style.borderColor = "red"
	  $('#inputAcara-label').text('Acara harus diisi!');	  
	  }
	else
	  {
	  document.getElementById("inputAcara-label").style.color = "white"
	  document.getElementById("inputAcara").style.borderColor = "transparent"
	  $('#inputAcara-label').text('');
	  };
};
function validateJenis(){
	var e = document.getElementById("inputJenis");
    var strUser = e.options[e.selectedIndex].value;
 	if (strUser=="0")
	  {
	  document.getElementById("inputJenis-label").style.color = "red"	  
	  $('#inputJenis-label').text('Jenis Acara harus diisi!');	  
	  document.getElementById("inputJenis").style.bordercolor = "red"
	  return false;
	  }
	else
	  {
	  document.getElementById("inputJenis-label").style.color = "white"
	  document.getElementById("inputJenis").style.borderColor = "transparent"
	  $('#inputJenis-label').text('');
	  return true;
	  };
};
function validateDate(){
	if ($('#inputDate').val().length < 1)
	  {
	  document.getElementById("inputDate-label").style.color = "red"
	  document.getElementById("inputDate").style.borderColor = "red"
	  $('#inputDate-label').text('Tanggal harus diisi!');	  
	  }
	else
	  {
	  document.getElementById("inputDate-label").style.color = "white"
	  document.getElementById("inputDate").style.borderColor = "transparent"
	  $('#inputDate-label').text('');
	  };
};

function validateDeskripsi(){
	if ($('#inputDeskripsi').val().length < 1)
	  {
	  document.getElementById("inputDeskripsi-label").style.color = "red"
	  document.getElementById("inputDeskripsi").style.borderColor = "red"
	  $('#inputDeskripsi-label').text('Deskripsi harus diisi!');	  
	  }
	else
	  {
	  document.getElementById("inputDeskripsi-label").style.color = "white"
	  document.getElementById("inputDeskripsi").style.borderColor = "transparent"
	  $('#inputDeskripsi-label').text('');
	  };
};

function validateHTM(){
	if ($('#inputHTM').val().length < 1)
	  {	  
	 document.getElementById("inputHTM").value = "-"
	  }
};


function validateCP(){
	if ($('#inputCP').val().length < 1)
	  {	  
	  document.getElementById("inputCP").value = "-"
	  }
};

function validateTwitter(){
	if ($('#inputTwitter').val().length < 1)
	  {	  
	  document.getElementById("inputTwitter").value = "-"
	  }
};
function validateFacebook(){
	if ($('#inputFacebook').val().length < 1)
	  {	  
	  document.getElementById("inputFacebook").value = "-"
	  }
};
function validateWebpage(){
	if ($('#inputWebpage').val().length < 1)
	  {	  
	  document.getElementById("inputWebpage").value = "-"
	  }
};

function validateEmail(){
	if($("#inputEmail").val().length > 1) {
	   if(!emailReg.test($("#inputEmail").val())) {
		$("#inputEmail-label").text('Alamat email salah!');		
		document.getElementById("inputEmail-label").style.color = "red"
	    document.getElementById("inputEmail").style.borderColor = "red"
	   }	
	   else 
	   {
	    document.getElementById("inputEmail-label").style.color = "white"
	    document.getElementById("inputEmail").style.borderColor = "transparent" 
		$("#inputEmail-label").text('');
	   }	
	}	
	else 
	   {
	    document.getElementById("inputEmail-label").style.color = "white"
	    document.getElementById("inputEmail").style.borderColor = "transparent" 
		document.getElementById("inputEmail").value = "-"
	   };		   
};

