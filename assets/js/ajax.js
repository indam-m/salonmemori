// JavaScript Document
	function formPengaduan(user) {
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
		xmlHttpObj.open("GET", "form_pengaduan.php?user="+user, true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}
	
	function formTaman() {
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
		xmlHttpObj.open("GET", "form_tambah_taman.php", true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}
	
	// function tambahPengaduan() {
		// // Create an XMLHttpRequest Object
		// var xmlHttpObj;
		// if (window.XMLHttpRequest) {
			// xmlHttpObj = new XMLHttpRequest( );
		// } else {
			// try {
				// xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");
			// } catch (e) {
				// try {
					// xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
				// } catch (e) {
					// xmlHttpObj = false;
				// }
			// }
		// }
		
		// var id_taman = document.getElementById('inputTaman').value;
		// var judul = document.getElementById('inputJudul').value;
		// var isi = document.getElementById('inputIsi').value;
		
		// // Create a function that will receive data sent from the server
		// xmlHttpObj.open("GET", "pengaduan_baru.php?id_taman=" + inputTaman + "&judul=" + inputJudul + "&isi=" + inputIsi, true);
		// xmlHttpObj.send(null);
		// xmlHttpObj.onreadystatechange = function() {
			// if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				// document.getElementById("inner-page").innerHTML=xmlHttpObj.responseText;
			// }
		// }
	// }

	function loadSemuaTaman() {
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
		xmlHttpObj.open("GET", "load_semua_taman.php", true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}
	
	function loadSemuaPengaduan() {
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
		xmlHttpObj.open("GET", "load_semua_pengaduan.php", true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}
	
	function loadSemuaPengaduanAdmin() {
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
		xmlHttpObj.open("GET", "load_semua_pengaduan_admin.php", true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}

	function loadMenunggu(user) {
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
		xmlHttpObj.open("GET", "load_menunggu.php?user="+user, true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}
	
	function loadSedangDiproses() {
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
		xmlHttpObj.open("GET", "load_sedang_diproses.php", true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}

	function loadSudahSelesai() {
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
		xmlHttpObj.open("GET", "load_sudah_selesai.php", true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}

	function loadDitolak() {
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
		xmlHttpObj.open("GET", "load_ditolak.php", true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}

	function statistik() {
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
		xmlHttpObj.open("GET", "statistik.php", true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}
	
	function kirimEmail() {
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
		xmlHttpObj.open("GET", "kirim_email.php", true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}
	
	function hapusTolak() {
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
		xmlHttpObj.open("GET", "hapus_tolak.php", true);
		xmlHttpObj.send();
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}

	function searchPengaduan(user) {
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
		var query = encodeURIComponent(document.getElementById('query').value);
		xmlHttpObj.open("GET", "search_aduan.php?user=" + user + "&search=" + query, true);
		xmlHttpObj.send(null);
		xmlHttpObj.onreadystatechange = function() {
			if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200) {
				document.getElementById("page-inner").innerHTML=xmlHttpObj.responseText;
			}
		}
	}