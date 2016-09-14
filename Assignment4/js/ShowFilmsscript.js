$(function () {

	$.get("../php/GetFilmListQuery.php", function (data) {
		var lineByLine = data.split('\n');
		for (var i = 0, len = lineByLine.length; i < len; i++) {

			var arr = lineByLine[i].split(';');
			if(arr.length == 5)
			{
				$("#content ul").append("<li class=\"menuitem\" id=\"" + arr[0] + "\">" + arr[0] + "<span class=\"rating star" + arr[1] + "\"</span></li>");
			}
		}
	});

	$("#content").on("click", "li.menuitem", function () {
		$("#content").empty();
		var id = this.id;

		$.get("../php/GetFilmListQuery.php", function (data) {
			console.log(data);
			var lineByLine = data.split('\n');

			for (var i = 0, len = lineByLine.length; i < len; i++) {

				var arr = lineByLine[i].split(';');


			if(arr[0] === id)
			{
				$("#content").html("<h2>" + arr[0] + "</h2>" +
					arr[4] + "</br>" +
					"<p>Länk till IMDB: " + arr[2] + "</p>" +
					"<p>Betyg:<span class=\"rating star" + arr[1] + "\"</span>" + "</p>");

				// Load image
				var img = $("<img />").attr('src', arr[3])
					.on('load', function () {
						if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
							alert('broken image!');
						} else {
							$("#content").append(img);
						}
					});
			}
		}
	});
});
});
