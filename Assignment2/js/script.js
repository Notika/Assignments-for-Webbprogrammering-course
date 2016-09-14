var filmer = new Array;

function initArray() {
	var numInternalArrays = 2;
	for (var i = 0; i < numInternalArrays; i++) {
		filmer[i] = [];
	}
}

function updateView() {

	$("ul").empty();

	for (i = 0; i < filmer.length; i++) {
		$("ul").append("<li>" + filmer[i][1] + "<span class='rating star" + filmer[i][0] + "' </span></li>");
	}
		console.log(filmer);
}

$(document).ready(function () {
	$('#btnSubmit').click(function (e) {
		var isValid = true;

		$('input[type="text"].required').each(function () {
			if ($.trim($(this).val()) == '') {
				isValid = false;
				$(this).css({
					"border" : "1px solid red",
					"background" : "red"
				});
			} else {
				$(this).css({
					"border" : "",
					"background" : ""
				});
			}
		});

		var rank = $('#formFilmRank').val();
		if (rank == '0') {
			isValid = false;
			$('#formFilmRank').css('background-color', 'red');
		}

		if (isValid == false)
			e.preventDefault();
		else {
			var titleValue = document.getElementById("formFilmTitle").value;
			var rankValue = document.getElementById("formFilmRank").value;
			var el = new Array;
			el.push(rankValue, titleValue);
			filmer.push(el);

			updateView();

			$('#formFilmRank').css('background-color', '');
			$('#formFilmRank').prop('selectedIndex', 0);
			$('input[type="text"], formFilmTitle').val('');
		}
	});
});

$(document).ready(function () {
	$("#btnLowest").click(function () {
		filmer.sort(function (a, b) {
			var a0 = a[0], b0 = b[0];
			return a0 - b0;
		});
		updateView();
	});
});

$(document).ready(function () {
	$("#btnHighest").click(function () {
		filmer.sort(function (a, b) {
			var a0 = a[0], b0 = b[0];
			return b0 - a0;
		});
		updateView();
	});
});
