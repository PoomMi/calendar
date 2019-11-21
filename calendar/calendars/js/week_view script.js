function GotoForm(){
	var form =  document.getElementById("gotoForm");
	if(form.style.display === "none"){
		form.style.display = "block";
	}
	else{
		form.style.display = "none";
	}
}

$(document).ready(function(){
	$('.btnAddApp').click(function(){
		$('.addAppointment').toggle();
	});

	$('.app').click(function(){
		$('#detail-wrapper').show();
			title_ = $(this).text().split(" ")[0];
			date =  $(this).text().split(" ")[2];
			time = $(this).text().split(" ")[1];

			$('.title').html(title_); //show title
			$('.date_time').html(date+" | Time: "+time); //show date and time		
			$('.detail_').load('includes/detail.php', {set_title: title_, set_date: date}); //show detial

			//delete variable 
			delete title_;
			delete date;
			delete time;
			delete set;
	});

	$('#btnDel').click(function(){
		title_ = $('.title').text();
		date = $('.date_time').text().split("|")[0];
		$('.app').load('includes/del_detail.php', {set_title: title_, set_date: date}); //delete appointment
		location.reload(); //refresh page

		//delete variable 
		delete title_;
		delete date;
	});
});