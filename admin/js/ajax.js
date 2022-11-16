//fungsi untuk membuat objek XMLHttpRequest
function getXMLHTTPRequest(){
	if (window.XMLHttpRequest){
		// code for modern browsers
		return new XMLHttpRequest();
	}else{
		// code for old IE browsers
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
}

function add_barang(){
	var xmlhttp = getXMLHTTPRequest();
	//get input value
	var nama = encodeURI(document.getElementById('nama_barang').value);
	var harga = encodeURI(document.getElementById('harga_barang').value);
	var stok = encodeURI(document.getElementById('stok_barang').value);
    var kategori = encodeURI(document.getElementById('kategori_barang').value);
	if (nama != "" && harga != "" && stok != "" && kategori != "" ){
		//set url and inner
		var url = "barang_add.php"; 
        // alert(url);
		var inner = "demo";
		//set parameter and open request
		var params = "&nama_barang=" + nama + "&harga_barang=" + harga + "&stok_barang=" + stok + "&kategori_barang=" + kategori ;
		xmlhttp.open("POST", url, true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.onreadystatechange = function() {
			document.getElementById(inner).innerHTML = '<img src="images/ajax_loader.png"/>';
			if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
				 document.getElementById(inner).innerHTML = xmlhttp.responseText;
			}
			return false;
		}
		xmlhttp.send(params);
	}else{
		alert("Tolong diisi semua!!!!");
	}
}
