// Thời gian chờ thông báo
$("div.alert").delay(3000).slideUp();
// End thời gian

$(document).ready(function() {
	$("input#sendMail").on('click', function() {
		var url = "http://localhost/TL3/lien-he";
		var _token = $("#token").val();
		var name = $("#name").val();
		var email = $("#email").val();
		var phone = $("#phone").val();
		var content = $("#content").val();
		alert('Xác nhận gửi Mail');
		$.ajax({
			url: url,
			type: 'POST',
			cache: false,
			data: {"_token":_token, "name": name, "email" : email, "phone": phone, "content": content},
			success:function(data) {
				if(data == "Ok") {
					alert("Gửi Mail thành công");
				}
				else {
					alert("Gửi Mail không thành công");
				}
			}
		})
		
	})
});
