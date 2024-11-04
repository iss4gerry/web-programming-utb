document.addEventListener('DOMContentLoaded', () => {
	const showMessageBtn = document.getElementById('showMessageBtn');
	const message = document.getElementById('message');

	showMessageBtn.addEventListener('click', () => {
		message.style.display = message.style.display === 'none' ? 'block' : 'none';
	});
});
