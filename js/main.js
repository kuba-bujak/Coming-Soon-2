let id = (id) => document.getElementById(id);

let classes = (classes) => document.getElementsByClassName(classes);

let email = id("email"),
  form = id("form"),
  errorMsg = classes("error"),
  successIcon = classes("success-icon"),
  failureIcon = classes("failure-icon");

  form.addEventListener("submit", (e) => {
	engine(email, 0, "Email cannot be blank");

	if (!checkStatus()) e.preventDefault();
 });

 let engine = (id, serial, message) => {
	console.log(errorMsg.innerHTML = message);
	if (id.value.trim() === "" || id.value === null) {
		errorMsg[serial].innerHTML = message;
		id.style.border = "2px solid red";

		// icons
		failureIcon[serial].style.opacity = "1";
		successIcon[serial].style.opacity = "0";
	}
	else {
		errorMsg[serial].innerHTML = "";
		id.style.border = "2px solid green";
		
		// icons
		failureIcon[serial].style.opacity = "0";
		successIcon[serial].style.opacity = "1";
	}
 };

 let checkStatus = () => {
	if (successIcon[0].style.opacity === '1') {
		return true;
 }
};