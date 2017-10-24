			
function displayTime() {
	var today = new Date();
	var year = today.getFullYear();
	var month = today.getMonth();
    var months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	var d = today.getDate();
	var day = today.getDay();
	var days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
	var h = today.getHours();
	h = checktime(h);
	var m = today.getMinutes();
	m = checktime(m);
	var s = today.getSeconds();
	s = checktime(s);
	var result = ''+h+':'+m+':'+s+' '+days[day]+' '+months[month]+' '+d+' '+year+' ';
	document.getElementById("date").innerHTML = result;
	setTimeout(function(){displayTime()}, 500);
}
			
function checktime(i) {
	if (i < 10) {
    	i = "0" + i
	}
	return i;
}