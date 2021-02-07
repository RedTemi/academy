var xhr = new XMLHttpRequest;
join=(x,y)=>{
	xhr.open("POST", 'joinWebinar.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(`webinar=${x}&user=${y}`);
	xhr.onload=()=>{
			alert(xhr.responseText);
	}
}
// verify=(x)=>{
// 	xhr.open("POST",'allowUser.php');
// 	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// 	xhr.send(`ID=${x}`);
// }
// drop=(x)=>{
// 	xhr.open("POST",'deleteUser.php');
// 	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// 	xhr.send(`ID=${x}`);
// }
approve=(x)=>{
	xhr.open("POST",'approveUser.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(`ID=${x}`);

}
enter=(x)=>{
	xhr.open("POST",'enter.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(`ID=${x}`);
	xhr.onload=()=>{
		if (xhr.responseText == 'done') {
			window.location.href='CDN/index.html'
		}
}
}
watch=(x)=>{
		xhr.open("POST",'watch.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(`ID=${x}`);
	xhr.onload=()=>{
		if (xhr.responseText == 'done') {
			window.location.href='webinarViewer.php'
		}
}
}
checkpw=()=>{
		var x = document.forms["pwreset"]["password"].value;
		var y = document.forms["pwreset"]["password2"].value;
		if (x != y) {
		  alert("passwords must match");
		  return false;
		}
		else{
			return true;
		}
}
stream=(x)=>{
	xhr.open("POST",'streamer.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(`ID=${x}`);
	xhr.onload=()=>{
		if (xhr.responseText == 'done') {
			window.location.href='livestream.php'
		}
}
}
// var xhr = new XMLHttpRequest();
// xhr.open("POST", 'login.php');

//Send the proper header information along with the request
// xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

// xhr.onreadystatechange = function () { 
	// Call a function when the state changes.
	// if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
		// Request finished. Do processing here.
	
	// }
// }
// xhr.send(`username=${name}&password=${password}&login_btn=1`);
// var box = `username=${name}&password=${password}&login_btn`; 
// progress.innerHTML = box;

// xhr.send(new Int8Array()); 
// xhr.send(document); 
//  xhr.onload = function (){
// 	if (xhr.status === 200) {
// 		//File(s) uploaded
// 		serverResponse.innerHTML = xhr.responseText;
// 	} else {
// 		alert('An error occurred!');
// 	}
// }