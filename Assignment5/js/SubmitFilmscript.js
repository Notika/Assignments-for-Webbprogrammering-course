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
			var rank = document.getElementById("formFilmRank").value;
			var rankValue = "rating star" + rank;
			var IMDBlink = document.getElementById("formFilmIMDB").value;
			var bildLink = document.getElementById("formFilmBild").value;
			var filmensHandling = document.getElementById("formFilmHandling").value;

			//send txt to the server
			$.post('../php/InsertFilmData.php', {
				title : titleValue,
				rankValue : rank,
				idbmValue : IMDBlink,
				linkValue : bildLink,
				filmInfo : filmensHandling
			}, function (data) {
				//now data is an object, so put the message in the div
				$('#response').text(data.message);
				//alert("Data Loaded: " + data.message);

			}, 'json');

			$('#formFilmRank').css('background-color', '');

			$('#formFilmRank').prop('selectedIndex', 0);
			$('input[type="text"], formFilmTitle').val('');
		}
	});
});
