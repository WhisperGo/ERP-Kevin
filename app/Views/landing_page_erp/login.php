<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="<?= base_url('assets/extensions/@fortawesome/fontawesome-pro/css/all.min.css') ?>">
    <title>Login | ERP SPH</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="post" action="<?= base_url('landing_page_erp/home/aksi_login') ?>">
                <h1>Login</h1>

                <?php if (session()->has('error')) : ?>
                    <div class="alert alert-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                        </svg>
                        <?= session('error') ?></div>
                <?php endif; ?>

                <input type="text" id="usernameInput_signin" name="username" placeholder="Username" oninput="capitalizeFirstLetter_signin()">
                <script>
                    function capitalizeFirstLetter_signin() {
                        var input = document.getElementById("usernameInput_signin");
                        var words = input.value.split(" ");
                        for (var i = 0; i < words.length; i++) {
                            words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
                        }
                        input.value = words.join(" ");
                    }
                </script>

                <input type="password" name="password" placeholder="Password">

                <div class="form-check form-check-lg d-flex align-items-end mb-4 text-right">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" style="width: auto;" />
                    <span>Ingat Saya</span>
                </div>

                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Selamat Datang!</h1>
                    <p>Silahkan masukkan username dan password Anda untuk mengakses ERP - SPH</p>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
    }

    body {
        background-color: #f47a21;
        background: linear-gradient(to right, #e2e2e2, #f47a21);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        border-radius: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
    }

    .container p {
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 0.3px;
        margin: 20px 0;
    }

    .container span {
        font-size: 12px;
    }

    .container a {
        color: #333;
        font-size: 13px;
        text-decoration: none;
        margin: 15px 0 10px;
    }

    .container button {
        background-color: #f47a21;
        color: #fff;
        font-size: 12px;
        padding: 10px 45px;
        border: 1px solid transparent;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-top: 10px;
        cursor: pointer;
    }

    .container button.hidden {
        background-color: transparent;
        border-color: #fff;
    }

    .container form {
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        height: 100%;
    }

    .container input {
        background-color: #eee;
        border: none;
        margin: 8px 0;
        padding: 10px 15px;
        font-size: 13px;
        border-radius: 8px;
        width: 100%;
        outline: none;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .sign-in {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .container.active .sign-in {
        transform: translateX(100%);
    }

    .sign-up {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }

    .container.active .sign-up {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: move 0.6s;
    }

    @keyframes move {

        0%,
        49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%,
        100% {
            opacity: 1;
            z-index: 5;
        }
    }

    .social-icons {
        margin: 20px 0;
    }

    .social-icons a {
        border: 1px solid #ccc;
        border-radius: 20%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 3px;
        width: 40px;
        height: 40px;
    }

    .toggle-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: all 0.6s ease-in-out;
        border-radius: 150px 0 0 100px;
        z-index: 1000;
    }

    .container.active .toggle-container {
        transform: translateX(-100%);
        border-radius: 0 150px 100px 0;
    }

    .toggle {
        background-color: #f47a21;
        height: 100%;
        background: linear-gradient(to right, #f47a21, #f47a21);
        color: #fff;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: all 0.6s ease-in-out;
    }

    .container.active .toggle {
        transform: translateX(50%);
    }

    .toggle-panel {
        position: absolute;
        width: 50%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 30px;
        text-align: center;
        top: 0;
        transform: translateX(0);
        transition: all 0.6s ease-in-out;
    }

    .toggle-left {
        transform: translateX(-200%);
    }

    .container.active .toggle-left {
        transform: translateX(0);
    }

    .toggle-right {
        right: 0;
        transform: translateX(0);
    }

    .container.active .toggle-right {
        transform: translateX(200%);
    }

    /* Alert From public/assets */
    .alert {
        --bs-alert-bg: transparent;
        --bs-alert-padding-x: 1rem;
        --bs-alert-padding-y: 1rem;
        --bs-alert-margin-top: 1rem;
        --bs-alert-margin-bottom: 1rem;
        --bs-alert-color: inherit;
        --bs-alert-border-color: transparent;
        --bs-alert-border: 1px solid var(--bs-alert-border-color);
        --bs-alert-border-radius: 0.25rem;
        position: relative;
        padding: var(--bs-alert-padding-y) var(--bs-alert-padding-x);
        margin-top: var(--bs-alert-margin-top);
        margin-bottom: var(--bs-alert-margin-bottom);
        color: var(--bs-alert-color);
        background-color: var(--bs-alert-bg);
        border: var(--bs-alert-border);
        border-radius: var(--bs-alert-border-radius);
    }

    .alert-danger {
        --bs-alert-color: #842029;
        --bs-alert-bg: #f8d7da;
        --bs-alert-border-color: #f5c2c7;
    }

    .alert-danger .alert-link {
        color: #6a1a21;
    }

    .alert-danger {
        background-color: #f3616d;
        color: #fff;
    }

    .alert-danger a {
        color: #fff;
        font-weight: 700;
    }



    /* Alert from public/assets */
</style>

<script>
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");
    });
</script>
<script>
    // Saat halaman dimuat
    document.addEventListener("DOMContentLoaded", function() {
        // Cek apakah ada cookie dengan nama "remember_me"
        if (getCookie("remember_me")) {
            // Jika ada, tandai checkbox "Ingat Saya"
            document.getElementById("flexCheckDefault").checked = true;
            // Dan isi field username dan password dengan nilai cookie
            var cookie = JSON.parse(getCookie("remember_me"));
            if (cookie && cookie.username && cookie.password) {
                document.getElementsByName("username")[0].value = cookie.username;
                document.getElementsByName("password")[0].value = cookie.password;
            }
        }
    });

    // Saat form login disubmit
    document.querySelector("form").addEventListener("submit", function() {
        // Cek apakah checkbox "Ingat Saya" di-tick
        if (document.getElementById("flexCheckDefault").checked) {
            // Jika iya, buat cookie dengan nama "remember_me" yang berisi nilai username dan password
            var username = document.getElementsByName("username")[0].value;
            var password = document.getElementsByName("password")[0].value;
            if (username && password) {
                var cookie = {
                    username: username,
                    password: password
                };
                setCookie("remember_me", JSON.stringify(cookie), 30);
            }
        } else {
            // Jika tidak, hapus cookie dengan nama "remember_me" (jika ada)
            deleteCookie("remember_me");
        }
    });

    // Fungsi untuk membuat cookie
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Fungsi untuk membaca nilai cookie
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Fungsi untuk menghapus cookie
    function deleteCookie(name) {
        document.cookie = name + '=; Max-Age=-99999999;';
    }
</script>