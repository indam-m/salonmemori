

function loadPembukuan(){
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
    xmlHttpObj.open("GET", "loadpembukuan.php", true);
    xmlHttpObj.send();
    xmlHttpObj.onreadystatechange = function() {
        if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
            document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
            documentReady();
        }
    }
}

function pembukuanTanggal(){
    // Create an XMLHttpRequest Object 
    var d1 = document.getElementById("datepicker").value;
    var d2 = document.getElementById("datepicker2").value;

    if(d1 != '' && d2 != ''){
        var parts = d1.split('/');
        var tgl1 = '' + parts[2] + '-' + parts[0] + '-' + parts[1];

        var parts2 = d2.split('/');
        var tgl2 = '' + parts2[2] + '-' + parts2[0] + '-' + parts2[1];

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
        xmlHttpObj.open("GET", "pembukuan_tanggal.php?tgl1=" + tgl1 + "&tgl2=" + tgl2, true);
        xmlHttpObj.send();
        xmlHttpObj.onreadystatechange = function() {
            if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
                document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
                documentReady();
            }
        }
    }
    else{
        alert("Silakan mengisi kolom tanggal terlebih dahulu");
    }
}

function documentReady(){
	$(document).ready(function(){

		var $TABLE = $('#table');
		var $BTN = $('#export-btn');
		var $EXPORT = $('#export');

		$('.table-add-pemasukan').click(function () {
		  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
		  //$TABLE.find('table').append($clone);
	      $('#table-pemasukan').append($clone);
		});
	    
	    $('.table-add-pengeluaran').click(function () {
		  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
		  //$TABLE.find('table').append($clone);
	      $('#table-pengeluaran').append($clone);
		});

		$('.table-remove-pemasukan').click(function () {
			if(confirm("Anda yakin ingin menghapusnya?")){
				var id = $(this).parents('tr').attr('id');
				var tipe = 0;
				$.ajax({
					type : 'POST',
					url : 'delete_pembukuan.php',
					data : 'id=' + id + '&tipe=' + tipe
				});
				$(this).parents('tr').detach();
			}
		});

		$('.table-remove-pengeluaran').click(function () {
			if(confirm("Anda yakin ingin menghapusnya?")){
				var id = $(this).parents('tr').attr('id');
				var tipe = 1;
				$.ajax({
					type : 'POST',
					url : 'delete_pembukuan.php',
					data : 'id=' + id + '&tipe=' + tipe
				});
				$(this).parents('tr').detach();
			}
		});

		$('.table-ok-pemasukan').click(function () {
			var id = $(this).parents('tr').attr('id');
			var tanggal = $(this).parents('tr').find(".tanggal").text();
			var keterangan = $(this).parents('tr').find(".keterangan").text();
			var nominal = $(this).parents('tr').find(".nominal").text();
			var tipe = 0;
			$.ajax({
				type : 'POST',
				url : 'edit_pembukuan.php',
				data : 'id=' + id + '&tipe=' + tipe + '&tanggal=' + tanggal + '&keterangan=' + keterangan + '&nominal=' + nominal
			});
			if(id == 0)
				alert("Data berhasil disimpan.");
			else
				alert("Data berhasil diubah.");
		});

		$('.table-ok-pengeluaran').click(function () {
			var id = $(this).parents('tr').attr('id');
			var tanggal = $(this).parents('tr').find(".tanggal").text();
			var keterangan = $(this).parents('tr').find(".keterangan").text();
			var nominal = $(this).parents('tr').find(".nominal").text();
			var tipe = 1;
			alert("aa " + id);
			$.ajax({
				type : 'POST',
				url : 'edit_pembukuan.php',
				data : 'id=' + id + '&tipe=' + tipe + '&tanggal=' + tanggal + '&keterangan=' + keterangan + '&nominal=' + nominal
			});
			if(id == 0)
				alert("Data berhasil disimpan.");
			else
				alert("Data berhasil diubah.");
		});

		$('.table-up').click(function () {
		  var $row = $(this).parents('tr');
		  if ($row.index() === 1) return; // Don't go above the header
		  $row.prev().before($row.get(0));
		});

		$('.table-down').click(function () {
		  var $row = $(this).parents('tr');
		  $row.next().after($row.get(0));
		});

		// A few jQuery helpers for exporting only
		jQuery.fn.pop = [].pop;
		jQuery.fn.shift = [].shift;

		$BTN.click(function () {
		  var $rows = $TABLE.find('tr:not(:hidden)');
		  var headers = [];
		  var data = [];
		  
		  // Get the headers (add special header logic here)
		  $($rows.shift()).find('th:not(:empty)').each(function () {
			headers.push($(this).text().toLowerCase());
		  });
		  
		  // Turn all existing rows into a loopable array
		  $rows.each(function () {
			var $td = $(this).find('td');
			var h = {};
			
			// Use the headers from earlier to name our hash keys
			headers.forEach(function (header, i) {
			  h[header] = $td.eq(i).text();   
			});
			
			data.push(h);
		  });
		  
		  // Output the result
		  $EXPORT.text(JSON.stringify(data));
		});
	    
	    $( "#datepicker" ).datepicker();
	    $( "#datepicker2" ).datepicker();
	});
}
