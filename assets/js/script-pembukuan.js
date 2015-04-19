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