$(document).ready(function() {
	      
	$('div[data-toggle="toggle"]').click(function() {
       $('#table').fadeToggle("slow");
    })

	
	
	var preg_match = new RegExp("^(http:\/\/|https:\/\/).*$");
	$("#link1").on("change", function(){
		url = new $("#link1").val();
		if (url == "") {
			document.getElementById("link1").style.border="";
			document.getElementById("pass1").style.border="";
			$("#status1").slideUp("fast");
			$("#status1").html("");
			$("#sttpass1").slideUp("fast");
			$("#sttpass1").html("");
			$('#submit').attr('disabled', 'disabled');
		}
		else {
			if (!preg_match.test(url)) {
				$("#status1").html("<span class=\"badge badge-danger\">Geçersiz URL Formatı</span>").slideDown("fast");
				document.getElementById("link1").style.border="1px solid red";
				$('#submit').attr('disabled', 'disabled');
			}
			else {
				$("#status1").slideUp("fast");
				$("#status1").html("");
				document.getElementById("link1").style.border="1px solid green";
				$('#submit').removeAttr('disabled');
			}
		}
		return;
	});
	
	$("#pass1").on('change', function(){
		pass = $("#pass1").val();
		if (pass === "") document.getElementById("pass1").style.border="";
		else {
			document.getElementById("pass1").style.border="1px solid green";
			$("#sttpass1").slideUp("fast");
			$("#sttpass1").html("");
			$('#submit').removeAttr('disabled');
		}
		return;
	});
});

function check(inputs) {
	tonglink = 0;
	var showlink = "";
	var linkdown = new Array();
	var daypass = new Array();
	var stt = new Array();
	$('#submit').attr('disabled', 'disabled');
	$('#mabb').attr('disabled', 'disabled');
	setTimeout(function(){$('#submit').removeAttr('disabled');},2000);
	for (x = 0 ; x < inputs.length ; x++) {
		name = inputs[x].getAttribute("id");
		if(name.indexOf("link")==0) {
			numb = name.replace("link","");
			$("#result"+numb).html("").slideUp("fast");;
			url = document.getElementById(name).value;
			if (url.length > 3 && (/http/i.test(url) === true || /www/.test(url) === true)) {
				if (url.substr(0,4) === "www.") url = "http\:\/\/"+url;
				linkdown[tonglink] = url;
				daypass[tonglink] = document.getElementById('pass'+numb).value;
				stt[tonglink] = numb;
				tonglink++;
				$("#bbcode"+numb).html("");
			}
		}
	}
	if (linkdown.length == 0) return;
	for (i=0; i < linkdown.length; i++) {
		showlink = showlink+"<div id='results"+stt[i]+"'></div>";
		ajaxget(i, stt[i],linkdown[i],daypass[i],'get');
	}
	$('#waiting').show(100);
}

function ajaxget(stt, id, link, pass, type) {
	captcha = 'none';
	if (type =='reget'){
		$("#link"+id).html("<font color=#FFFF99><b>"+url+"</b></font> <img src='images/loading.gif' />"); 
	}
	else if (type !=='get'){
		$("#link"+id).html("reload captcha... <img src='images/loading.gif' />"); 
		captcha = 'reload';
	}
	if(id > 3 && type == 'get') time = (Math.round(id/5)*3000);
	else time = 0;
	
	url_link = link+'|'+pass;

	$.ajax({
		type: "POST",
		url: "check.php?random=",
		dataType: "json",
		data: 'links=' + encodeURIComponent(url_link),
		success: function(string) {	
		
			$('#status'+id).html("");
			$('#sttpass'+id).html("");
			if (stt == tonglink-1) $('#waiting').hide(0);
			if (string.status == "good_link") {
				pst = string.link + ' link_live | [color=#CD0000][b] ' + decodeURIComponent(string.filename) + " [/b][/color] | [color=#000000][b] "+ string.filesize +" [/b][/color] | [color=green][b] LAZENES [/b][/color]";
				$("#link1").removeAttr("style")
				$("#result"+id).html('<div class="well-sm"><font color="red">'+ decodeURIComponent(string.filename) +'</font> (<font color="blue">'+ string.filesize +'</font>)<br/><div class="form-group has-warning"><input type="text" class="form-control" id="bbcodeshow'+id+'" value="'+pst+'" onclick="this.setSelectionRange(0, this.value.length)"/></div></div>').slideDown("fast");
			}
			else if (string.status == "input_password") {
				document.getElementById("pass"+id).style.border="1px solid red";
				$("#sttpass"+id).html("<span class=\"badge badge-danger\">Şifre Gerekli</span>").slideDown("fast");
				$('#submit').attr('disabled', 'disabled');
			}
			else if (string.status == "wrong_password") {
				document.getElementById("pass"+id).style.border="1px solid red";
				$("#sttpass"+id).html("<span class=\"badge badge-danger\">Geçersiz Şifre .Tekrar deneyin</span>").slideDown("fast");
				$('#submit').attr('disabled', 'disabled');
			}
			else if (string.status == "folder_link") {
				document.getElementById("pass"+id).style.border="1px solid red";
				$("#status"+id).html("<span class=\"badge badge-danger\">Üzgünüz. Şuan Bu link\'i desteklemiyoruz.</span>").slideDown("fast");
			}
			else if ((!string.filename) || (!string.filesize)) {
				document.getElementById("link"+id).style.border="1px solid red";
				$("#status"+id).html("<span class=\"badge badge-danger\">Link Ölü</span>").slideDown("fast");
			}
		},
		error: function () {
			if (stt == tonglink-1) $('#waiting').hide(0);
			document.getElementById("link"+id).style.border="1px solid red";
			$("#status"+id).html("<span class=\"badge badge-danger\">Üzgünüz. Şuan Bu link\'i desteklemiyoruz</span>").slideDown("fast");
		}
	});
}