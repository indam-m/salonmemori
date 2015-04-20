// Validating Empty Field
function check_empty() {
    if (document.getElementById('name').value == "") {
        alert("Tolong Diisi Setiap Field!");
    } 
    else {
        document.getElementById('form-registrasi').submit();
        //alert("Data Berhasil Disimpan");
    }
}
//Function To Display Popup
function div_show() {
    //document.getElementById('popupForm').style.display = "block";
    document.getElementById('box-bg').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
    //document.getElementById('popupForm').style.display = 'none';
    document.getElementById('box-bg').style.display = 'none';
}

$(document).ready(function(){
    div_hide(); 
});

function loadRegistrasi(){
    // Create an XMLHttpRequest Object  
    var xmlHttpObj; 
    if (window.XMLHttpRequest) {                
        xmlHttpObj = new XMLHttpRequest( );
    } else {            
        try {
            xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                xmlHttpObj = false;
            }
        }
    }       
    // Create a function that will receive data sent from the server
    xmlHttpObj.open("GET", "loadregistrasi.php", true);
    xmlHttpObj.send();
    xmlHttpObj.onreadystatechange = function() {
        if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
            document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
        }
    }
}

function selesaiLayanan(nama, biaya){
    if(confirm("Sudah selesai pelayanannya?")){
        // Create an XMLHttpRequest Object  
        var xmlHttpObj; 
        if (window.XMLHttpRequest) {                
            xmlHttpObj = new XMLHttpRequest( );
        } else {            
            try {
                xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    xmlHttpObj = false;
                }
            }
        }       
        // Create a function that will receive data sent from the server
        xmlHttpObj.open("GET", "layanan_selesai.php?nama=" + nama + "&biaya=" + biaya, true);
        xmlHttpObj.send();
        xmlHttpObj.onreadystatechange = function() {
            if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
                document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
            }
        }
    }
}

function searchRegistrasi(e, search){
    // Create an XMLHttpRequest Object 
    if(e.keyCode != 13){
        return true;
    }
    else {
        var xmlHttpObj; 
        if (window.XMLHttpRequest) {                
            xmlHttpObj = new XMLHttpRequest( );
        } else {            
            try {
                xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    xmlHttpObj = false;
                }
            }
        }       
        // Create a function that will receive data sent from the server
        xmlHttpObj.open("GET", "search_registrasi.php?search=" + search, true);
        xmlHttpObj.send();
        xmlHttpObj.onreadystatechange = function() {
            if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
                document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
            }
        }
        return false;
    }
}
