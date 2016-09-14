$(document).ready(function () {

	var form = $('addCommentForm');
	var submit = $('#submit');

	$('#addCommentForm').submit(function (e) {
		// prevent default action
		e.preventDefault();
		// send ajax request
		$.ajax({
			url : '../php/ajax_comment.php',
			type : 'POST',
			cache : false,
			data : $(this).serialize(), //form serizlize data
			beforeSend : function () {
				// change submit button value text and disabled it
				submit.val('Submitting...').attr('disabled', 'disabled');
			},
			success : function (data) {
				var item = $(data).hide().fadeIn(800);
				$('.comment-block').append(item);

				// reset form and button
				$('#addCommentForm').trigger("reset");
				submit.val('Submit Comment').removeAttr('disabled');
			},
			error : function (e) {
				alert(e);
			}
		});
	});

});
