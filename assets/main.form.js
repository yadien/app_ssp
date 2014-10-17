		var masteradd = {
			beforeSend: function() {
				$('#msgmasterkeg').html("<script>alert('Kegiatan akan di inserts');</script>");
			},
			success: function(msg)
			{
				//$('#msgdetailkeg').html(msg);
				//$('#msgmasterkeg').html("Master insert sukses!");
				//$('#inputidkeg').val("");
				//$('#tmblsubmit').hide('slow');
				//$('#tmbladd').show();
			}
		}
		$("#masterkegiatan").ajaxForm(masterkegiatan);
		$('#modaladd').on('show.bs.modal', function () {
		  // do something…
		  var idkeg = $("#idkeg").data("id");
		  $("#inputidkeg").val(idkeg);
		});
		
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
