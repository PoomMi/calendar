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
	
	$('.app-detail').click(function(){
		$('#detail-wrapper').show();
			title_ = "" ;
			date = "";
			time = "";

		//loop to set title value				
		for(var i=0; $(this).text()[i]!="|"; i++){
			title_ += $(this).text()[i];
		}
		$('.title').html(title_); //show title

		//loop to set fate value
		i = 0;
		breaking_countdown = 2;
		while(true){

			if($('.app-content').text()[i] == "-"){
				breaking_countdown--;
			}

			if($('.app-content').text()[i] != " "){
				date += $('.app-content').text()[i];
			}

			if(breaking_countdown==0){
				date += $('.app-content').text()[i+1];
				date += $('.app-content').text()[i+2];
				break;
			}
			i++;
		}

		//loop to set time value
		set = false;
		for(var i=0; $(this).text()[i]!="."; i++){
			if($(this).text()[i-2] == "|"){
				set = true;
			}

			if(set){
				time += $(this).text()[i];
			}
		}

		$('.date_time').html(date+" | "+time); //show date and time		
		$('.detail_').load('includes/detail.php', {set_title: title_, set_date: date}); //show detial

		//delete variable 
		delete title_;
		delete date;
		delete time;
		delete i;
		delete set;
		delete breaking_countdown;
	});

	$('#btnDel').click(function(){
		title_ = $('.title').text();
		date = "";

		//loop to set date value
		i = 0;
		breaking_countdown = 2;
		while(true){

			if($('.app-content').text()[i] == "-"){
				breaking_countdown--;
			}

			if($('.app-content').text()[i] != " "){
				date += $('.app-content').text()[i];
			}

			if(breaking_countdown==0){
				date += $('.app-content').text()[i+1];
				date += $('.app-content').text()[i+2];
				break;
			}
			i++;
		}
		$('.app-content').load('includes/del_detail.php', {set_title: title_, set_date: date}); //delete appointment
		location.reload(); //refresh page
		
		//delete variable 
		delete title_;
		delete date;
		delete i;
		delete breaking_countdown;
	});

	$('#btnShare').click(function(){
		var title = $('.title').text();
		var date = $('.date_time').text().split("|")[0];
		var time = $('.date_time').text().split("|")[1];
		var detail = $('.detail_').text();
		
		$('.msg').show();
		$('.msg_title').text(title);
		$('.msg_date').text(date);
		$('.msg_time').text(time);
		$('.msg_detail_').text(detail);

	});
});

var model = document.getElementById('detail-wrapper');
var model2 = document.getElementById('msg-wrapper');
window.onclick = function(event) {
    if (event.target == model) {
        model.style.display = "none";
    }

    if (event.target == model2) {
        model2.style.display = "none";
    }
}