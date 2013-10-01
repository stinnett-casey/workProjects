$(function(){
	$('.has_plus').click(function(){
		var day = $(this).closest('.cal_day').find('.day').html();
		var memo = prompt('Enter your memo');

		if(memo != null){
			$.ajax({
				url: window.location,
				type: 'POST',
				data:{
					day: day,
					memo: memo
				},
				success: function(msg){
					location.reload();
				}
			});
		}
	});

	$('.has_minus').click(function(){
		$(this).closest('.cal_day').find('.day').html();
	});
});