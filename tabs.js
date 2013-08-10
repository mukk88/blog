function switchTab(tabname, containername){
	var i, len, tabs, containers;

	tabs = document.getElementsByClassName("tab");
	for(i = 0, len = tabs.length;i<len;i++){
		tabs[i].className = "tab"
	}

	containers = document.getElementsByClassName("container");
	for(i = 0, len = tabs.length;i<len;i++){
		containers[i].style.display = 'none';
	}

	document.getElementById(tabname).className = "tab active";
	document.getElementById(containername).style.display = 'block'
}