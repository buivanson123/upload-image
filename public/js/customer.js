$(document).on('change', '.form-control-file', function() {
	if($(this).val().length > 0) {
		let url = window.URL.createObjectURL(this.files[0]);

		$(this).parent('div.group-chose-file').children().hide();
		$(this).parents('div.group-chose-file').removeClass('group-chose-file');
		$(this).parent().append('' +
			'<span class="remove-image-thumbs-child">X</span>\n' +
			'<img src="' + url + '" class="img-thumbnail img-thumbnail-child">'
		);

		$('#conten-modal-image').append('' +
			'<div class="col-md-2 item">\n' +
			'<div class="group-chose-file">\n' +
			'<input type="file" accept="image/*" name="image[]" value="" class="form-control-file" placeholder="Chọn ảnh">\n' +
			'<button type="button" class="btn btn-default">Chọn ảnh</button>\n' +
			'</div>\n' +
			'</div>');
	}
});

$(document).on('click', '.remove-image-thumbs-child', function() {
	$(this).parents('div.item').remove();
});

var page = 1;
$(window).scroll(function() {
	toScroll = $(document).height() - $(window).height() - 250;
	if($(this).scrollTop() > toScroll) {
		loadImage(page);
		page++;
	}
});

loadImage(0);
function loadImage(page) {
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		method : 'GET',
		url    : '/image/index?page=' + page,
		success: function(response) {
			if(parseInt(page) <= parseInt(response.total)) {
				$.each(response.data, function(index, value) {
					$('#image-item-row').append('<div class="col-md-12"><img src="uploads/' + value.url + '" alt="image" class="img-thumbnail"></div>');
				});
			} else {
				console.log("Day la trang cuoi");
			}
		},
		error  : function(error) {
			console.log(error);
		}
	});
}
