console.log("asy.js");

function requestphp(){
	var connectTo = "http://192.168.33.10:8000/api/editSession.php";
	const request =  new XMLHttpRequest();
	request.open("GET", connectTo);

	request.addEventListener("load", (event) => {
		console.log(event.target.status);
		console.log(event.target.responseText);
	});

	request.send();
}

//DOMの解析が全部終わってからじゃないと、要素が取得できないことがあるんだねぇ
document.addEventListener("DOMContentLoaded", function(event) {
	console.log("DOM fully loaded and parsed");

	    
    var button =  document.querySelector("#session-button");
	button.addEventListener("click", function( event ){
		requestphp();
	});
	
});