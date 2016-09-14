$(function () {

	$.get("../php/GetTop10FilmsQuery.php", function (data) {
		var lineByLine = data.split('\n');
		for (var i = 0, len = lineByLine.length; i < len; i++) {

			var arr = lineByLine[i].split(';');
			if(arr.length == 3)
			{
				$("#content table").append("<tr> <td>" + arr[0] + "</td>" + "<td>" + arr[1] + "</td>" + "<td>" + arr[2] +"</td></tr>");
			}
		}
	});
});
