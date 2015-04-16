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