jQuery(document).ready(function($) { 

	$(document).on('click', '.more_posts', function(e){
		e.preventDefault();
		let _this = $(this);

		let data = {
			'action': 'more_posts',
			'query': _this.attr('data-param-posts'),
			'page': this_page,
			'template': _this.attr('data-template'),
			'posts_per_page': _this.attr('data-posts_per_page'),
		}

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: data,
			type: 'POST',
			success:function(data){
				if (data) {
					$('#response_posts .content').append(data); 
					this_page++;                      
					if (this_page == _this.attr('data-max-pages')) {
						_this.remove();               
					}
				} else {                              
					_this.remove();                   
				}
			}
		});
	});

	$(document).on('change', '#taxonomies', function(e){
		e.preventDefault();

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: $('#filter_by_term').serialize(),
			type: 'POST',
			success:function(data){
				if (data) {
					$('#response_posts').html(data); 
				}
			}
		});
	});

});