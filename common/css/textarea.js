const textarea = document.querySelector("textarea");
textarea.addEventListener("input", e => {
	textarea.style.height = '43px';
	textarea.style.height = (textarea.scrollHeight + 1) + 'px';
	});
