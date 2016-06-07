$(document).on('ready', function(){
	$('.suboptions_li').slideUp(0, function(){
	});

	function getParameterByName(name) {
	    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	    results = regex.exec(location.search);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
   	var type = getParameterByName('type');
   	var country = getParameterByName('country');
   	var state = getParameterByName('state');
   	
	function removeParam(key, sourceURL) {
	    var rtn = sourceURL.split("?")[0],
	        param,
	        params_arr = [],
	        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
	    if (queryString !== "") {
	        params_arr = queryString.split("&");
	        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
	            param = params_arr[i].split("=")[0];
	            if (param === key) {
	                params_arr.splice(i, 1);
	            }
	        }
	        rtn = rtn + "?" + params_arr.join("&");
	    }
	    return rtn;
	}

   	if (type) { 
		$("ul.suboptions_li.type").css("display", "block");
		$('.principal_text.type').click(function () {
			var url = location.href;
			var alteredURL = removeParam("type", url);
			window.location.replace(alteredURL);
		});
		$('.principal_text.country').click(function () {
			$(this).siblings('ul.suboptions_li.country').slideToggle(250, function(){
		   	});
		});
		$('.principal_text.state').click(function () {
			$(this).siblings('ul.suboptions_li.state').slideToggle(250, function(){
		   	});
		});
	} else if (country) {	
		$("ul.suboptions_li.country").css("display", "block");
		$('.principal_text.country').click(function () {
			var url = location.href;
			var alteredURL = removeParam("country", url);
			window.location.replace(alteredURL);
		});
		$('.principal_text.type').click(function () {
			$(this).siblings('ul.suboptions_li.type').slideToggle(250, function(){
		   	});
		});
		$('.principal_text.state').click(function () {
			$(this).siblings('ul.suboptions_li.state').slideToggle(250, function(){
		   	});
		});
	} else if (state) {	
		$("ul.suboptions_li.state").css("display", "block");
		$('.principal_text.state').click(function () {
			var url = location.href;
			var alteredURL = removeParam("state", url);
			window.location.replace(alteredURL);
		});
		$('.principal_text.type').click(function () {
			$(this).siblings('ul.suboptions_li.type').slideToggle(250, function(){
		   	});
		});	
		$('.principal_text.country').click(function () {
			$(this).siblings('ul.suboptions_li.country').slideToggle(250, function(){
		   	});
		});
	} else if (type+country) {

		alert(getParameterByName());

	} else {
		$('.principal_text').click(function () {
			$(this).siblings('ul.suboptions_li').slideToggle(250, function(){
		   	});
		});
	}

});