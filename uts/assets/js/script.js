document
	.getElementById('loginForm')
	.addEventListener('submit', function (event) {
		event.preventDefault();
		const email = document.getElementById('email').value;
		const password = document.getElementById('password').value;

		if (email === 'admin@gmail.com' && password === 'admin123') {
			localStorage.setItem('loggedIn', 'true');
			window.location.href = 'menu.html';
		} else {
			alert('Email atau Password salah!');
		}
	});

document
	.getElementById('registerForm')
	.addEventListener('submit', function (event) {
		event.preventDefault();
		const name = document.getElementById('name').value;
		const email = document.getElementById('email').value;
		const password = document.getElementById('password').value;
		const confirmPassword = document.getElementById('confirmPassword').value;

		if (password !== confirmPassword) {
			alert('Password dan konfirmasi password tidak cocok!');
			return;
		}

		const userData = { name, email, password };
		localStorage.setItem('userData', JSON.stringify(userData));

		alert('Registrasi berhasil! Silakan login.');
		window.location.href = 'login.html';
	});
