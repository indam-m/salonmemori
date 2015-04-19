/*$(document).ready(function(){    
    var $TABLE = $('#table');
	var $BTN = $('#export-btn');
	var $EXPORT = $('#export');

	$('.table-add').click(function () {
	  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
	  $TABLE.find('table').append($clone);
	});

	$('.table-remove').click(function () {
		if(confirm("Anda yakin ingin menghapus akun ini?")){
			var user = $(this).parents('tr').find(".username").text();
			var role = $(this).attr('role');
			$.ajax({
				type: 'POST',
				url: 'delete_akun.php',
				data: 'username=' + user + '&role='  role
			})
			$(this).parents('tr').detach();
		}
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
});*/

$(document).ready(function(){    
    var $TABLE = $('#table');
	var $BTN = $('#export-btn');
	var $EXPORT = $('#export');

	$('.table-add').click(function () {
	  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
	  $TABLE.find('table').append($clone);
	});

	$('.table-remove').click(function () {
		if(confirm("Anda yakin ingin menghapus akun ini?")){
			var user = $(this).parents('tr').find(".username").text();
			$.ajax({
				type: 'POST',
				url: 'delete_akun.php',
				data: 'username=' + user
			})
			$(this).parents('tr').detach();
		}
	});

	$('.table-ok').click(function () {
		var user = $(this).parents('tr').find(".username").text();
		var name = $(this).parents('tr').find(".nama").text();
		var password = $(this).parents('tr').find(".password").text();
		var role = $(this).parents('tr').find(".role").text();
		var gaji = $(this).parents('tr').find(".gaji").text();
		$.ajax({
			type: 'POST',
			url: 'edit_akun.php',
			data: 'username=' + user + '&name=' + name + '&password=' + password +'&role=' + role + '&gaji=' + gaji
		})
		alert("Akun " + user + " berhasil diubah");
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

});
