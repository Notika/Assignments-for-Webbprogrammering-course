$(function () {
	var arr = new Array;
	var i = 0;
	$.get("https://ddwap.mah.se/AC9496/Assignment4/php/GetFilmListQuery.php", function (data) {

		// Fetch pix web address from DB.
		var lineByLine = data.split('\n');
		for (var i = 0, len = lineByLine.length; i < len; i++) {
			var params = lineByLine[i].split(';');
			if (params.length == 5)
			{
				arr.push(params[3]);
			}
		}
		// Preload all images
		preloadImages(arr);

	/*	$('<div> <img src=\"' + arr[i] + '\"> </div>').appendTo("#slideshow");
		i = 1;*/
	});

	$("#slideshow > div:gt(0)").hide();
	setInterval(function () {
		$('#slideshow > div:first')
		.fadeOut(1000)
		.next()
		.fadeIn(1000)
		.end()
		.appendTo('#slideshow');

	if(i < arr.length){
		$('<div> <img src=\"' + arr[i] + '\"> </div>').appendTo("#slideshow");
		i++;
	}

	},
		5000); 
});

function preloadImages(array) {
	if (!preloadImages.list) {
		preloadImages.list = [];
	}
	var list = preloadImages.list;
	for (var j = 0; j < array.length; j++) {
		var img = new Image();
		img.onload = function () {
			var index = list.indexOf(this);
			if (index !== -1) {
				// remove image from the array once it's loaded
				// for memory consumption reasons
				list.splice(index, 1);
			}
		}
		list.push(img);
		img.src = array[j];
	}
}

