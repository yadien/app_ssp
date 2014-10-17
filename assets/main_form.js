var modaldetailkegiatan = {
			beforeSend: function() {
				$('#modaladd').modal('hide');
				$(".inputkeg").val('');
			},
			success: function(msg)
			{
				$.ajax({
					url: "browsedetailkeg/",
					cache: false,
					success: function(msg){
						alert('go for success');
						$("#msgdetailkeg").html(msg);
					}
				});
			}
		}
		
		$("#modaldetailkegiatan").ajaxForm(modaldetailkegiatan);