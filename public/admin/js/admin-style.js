//Begin nav menu
$(document).ready(function()
{
	$('.menu-toggle').click(function(){
		$('.nav-menu').toggleClass('active');
		$('.content').toggleClass('active');
	});
	$('.nav-menu ul li').click(function(){
		$(this).toggleClass('active');
	});
});

// load menu

// load menu

// End nav menu
// Thời gian chờ thông báo
$("div.alert").delay(3000).slideUp();
// End thời gian

//Hàm thông báo xóa
function xacnhanxoa(msg) {
	if(window.confirm(msg)) {
		return true;
	}
	return false;
}
//End Hàm thông báo xóa

//chuan bi xoa khỏi web
document.querySelectorAll( 'oembed[url]' ).forEach( element => {
    iframely.load( element, element.attributes.url.value );
} );

// Thống kê	người dùng
$(function() {
  // Function Ajax Request
	function requestData(days, chart){
	    $.ajax({
	      type: "GET",
	      dataType: 'json',
	      url: "http://localhost/TL3/admin/api",
	      data: { days: days }
	    })
	    .done(function( data ) {
	    	chart.setData(data);
	    })
	    .fail(function() {
	    	alert( "Lỗi" );
	    });
	  }

	var chart = Morris.Bar({
    	// id element để vẽ biểu đồ
    	element: 'stats-container',
    	data: [0, 0], // đặt giá trị ban đầu
    	xkey: 'date', // dặt key X là ngày
    	ykeys: ['value'], // đặt key Y là giá trị
    	labels: ['Người Dùng'] // đặt nhãn
 	});

  	// Dữ liệu ban đầu là 30 ngày
  	requestData(30, chart);
  	$('ul.ranges a').click(function(e){
    	e.preventDefault();

    	// Lấy số ngày dữ liệu
    	var el = $(this);
    	days = el.attr('value');

    	// yêu cầu và hiện thị dữ liệu
    	requestData(days, chart);
  	})
});
// end thong ke người dùng
// Thống kê	news
$(function() {
  // Function Ajax Request
	function requestData(days, chart){
	    $.ajax({
	      type: "GET",
	      dataType: 'json',
	      url: "http://localhost/TL3/admin/api-news",
	      data: { days: days }
	    })
	    .done(function( data ) {
	    	chart.setData(data);
	    })
	    .fail(function() {
	    	alert( "Lỗi" );
	    });
	  }

	var chart = Morris.Bar({
    	// id element để vẽ biểu đồ
    	element: 'stats-container-news',
    	data: [0, 0], // đặt giá trị ban đầu
    	xkey: 'date_news', // dặt key X là ngày
    	ykeys: ['value'], // đặt key Y là giá trị
    	labels: ['Tin Tức'] // đặt nhãn
 	});

  	// Dữ liệu ban đầu là 30 ngày
  	requestData(30, chart);
  	$('ul.ranges a').click(function(e){
    	e.preventDefault();

    	// Lấy số ngày dữ liệu
    	var el = $(this);
    	days = el.attr('value');

    	// yêu cầu và hiện thị dữ liệu
    	requestData(days, chart);
  	})
});
// end thong ke news