function toggle(id){
	var main = document.getElementById(id);
	if(main.style.display=="none"||main.style.display=="")
		main.style.display = "block";
	else
		main.style.display = "none";
}