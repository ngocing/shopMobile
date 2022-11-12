// JavaScript Document
function getsanpham(page, k)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("noidung").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","sanpham.php?page="+page+"&keyword="+k,true);
	xmlhttp.send();
	document.getElementById("timkiem").setAttribute("onChange", "getsanpham(0, this.value)");
}
function getbanner(id)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("noidung").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","qlbanner.php",true);
	xmlhttp.send();
}
function getphanquyen(id)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("noidung").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","phanquyen.php?page="+id,true);
	xmlhttp.send();
}
function getdonhang(id)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("noidung").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","donhang.php?page="+id,true);
	xmlhttp.send();
}
function getthacmac(id)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("noidung").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","thacmac.php?page="+id,true);
	xmlhttp.send();
}
function gethang(page, k)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("noidung").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","hang.php?page="+page+"&keyword="+k,true);
	xmlhttp.send();
	document.getElementById("timkiem").setAttribute("onChange", "gethang(0, this.value)");
}
function getkhuyenmai(page)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("noidung").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","khuyenmai.php?page="+page,true);
	xmlhttp.send();
}
function gettintuc(id)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("noidung").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","tintuc.php?page="+id,true);
	xmlhttp.send();
}
function getnhanvien(page, k)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("noidung").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","user.php?page="+page+"&keyword="+k,true);
	xmlhttp.send();
	document.getElementById("timkiem").setAttribute("onChange", "getnhanvien(0, this.value)");
}
function getkhachhang(page, k)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("noidung").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","khachhang.php?page="+page+"&keyword="+k,true);
	xmlhttp.send();
	document.getElementById("timkiem").setAttribute("onChange", "getkhachhang(0, this.value)");
}
function getgiaidapthacmac(id)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("noidung").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET","giaidapthacmac.php?page="+id,true);
	xmlhttp.send();
}