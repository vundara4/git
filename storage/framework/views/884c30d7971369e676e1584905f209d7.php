<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Romdoul Delivery</title>

    
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px 20px;

            font-family: 'Poppins', sans-serif;

            background:
                radial-gradient(
                    circle at 0% 0%,
                    rgba(148, 163, 255, 0.35),
                    transparent 35%
                ),
                radial-gradient(
                    circle at 100% 100%,
                    rgba(99, 102, 241, 0.22),
                    transparent 35%
                ),
                linear-gradient(
                    135deg,
                    #f8fafc 0%,
                    #eef2ff 50%,
                    #f8fafc 100%
                );

            overflow-x: hidden;
        }

        /* Decorative background circles */

        body::before {
            content: "";
            position: fixed;

            width: 420px;
            height: 420px;

            top: -220px;
            left: -180px;

            background: rgba(129, 140, 248, 0.18);

            border-radius: 50%;

            filter: blur(5px);

            pointer-events: none;
        }

        body::after {
            content: "";
            position: fixed;

            width: 420px;
            height: 420px;

            bottom: -240px;
            right: -180px;

            background: rgba(99, 102, 241, 0.15);

            border-radius: 50%;

            filter: blur(5px);

            pointer-events: none;
        }

        /* =========================================================
           LOGIN CONTAINER
        ========================================================= */

        .login-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 460px;

            padding: 42px;

            background: rgba(255, 255, 255, 0.68);

            border: 1px solid rgba(255, 255, 255, 0.85);

            border-radius: 30px;

            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);

            box-shadow:
                0 30px 80px rgba(15, 23, 42, 0.14),
                0 10px 30px rgba(15, 23, 42, 0.07);
            animation: cardShow 0.6s ease;
        }
        .back-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            color: #475569;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }
        .back-home:hover {
            color: #365bff;
        }
        @keyframes cardShow {
            from {
                opacity: 0;
                transform: translateY(25px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* =========================================================
           LOGO
        ========================================================= */

        .logo-wrapper {
            width: 100%;

            display: flex;
            flex-direction: column;

            align-items: center;
            justify-content: center;

            margin-bottom: 28px;
        }

        .logo {
            width: 145px;
            height: 145px;

            object-fit: contain;

            display: block;

            margin-bottom: 8px;

            filter:
                drop-shadow(0 8px 12px rgba(22, 101, 52, 0.12));
        }

        /*
         If your image already contains the Romdoul text,
         this section can be hidden.
        */

        .logo-name {
            font-size: 32px;

            font-weight: 800;

            font-style: italic;

            letter-spacing: -1px;

            color: #15803d;

            line-height: 1;
        }

        .logo-subtitle {
            margin-top: 5px;

            color: #15803d;

            font-size: 12px;

            font-weight: 600;

            letter-spacing: 7px;

            padding-left: 7px;
        }

        /* =========================================================
           HEADING
        ========================================================= */

        .heading {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            margin-bottom: 8px;

            color: #0f172a;

            font-size: 25px;

            font-weight: 700;

            text-align: center;
        }

        .heading i {
            font-size: 28px;

            color: #1d4ed8;
        }

        .sub-heading {
            margin-bottom: 28px;

            color: #64748b;

            font-size: 13px;

            text-align: center;
        }

        /* =========================================================
           FORM
        ========================================================= */

        .form {
            width: 100%;

            display: flex;

            flex-direction: column;

            gap: 20px;
        }

        /* =========================================================
           INPUT
        ========================================================= */

        .input-field {
            position: relative;

            width: 100%;
        }

        .input-field input {
            width: 100%;

            height: 58px;

            padding: 15px 16px 15px 48px;

            font-family: 'Poppins', sans-serif;

            font-size: 14px;

            color: #0f172a;

            background: rgba(255, 255, 255, 0.85);

            border: 1.5px solid #cbd5e1;

            border-radius: 13px;

            outline: none;

            transition: all 0.25s ease;
        }

        .input-field input:hover {
            border-color: #94a3b8;
        }

        .input-field input:focus {
            border-color: #2563eb;

            background: #ffffff;

            box-shadow:
                0 0 0 4px rgba(37, 99, 235, 0.10);

            transform: translateY(-1px);
        }

        /* =========================================================
           INPUT ICON
        ========================================================= */

        .input-icon {
            position: absolute;

            left: 16px;

            top: 29px;

            transform: translateY(-50%);

            color: #64748b;

            font-size: 19px;

            transition: 0.25s ease;

            pointer-events: none;

            z-index: 2;
        }

        .input-field input:focus ~ .input-icon {
            color: #2563eb;
        }

        /* =========================================================
           FLOATING LABEL
        ========================================================= */

        .input-field label {
            position: absolute;

            left: 43px;

            top: 29px;

            transform: translateY(-50%);

            padding: 0 6px;

            color: #64748b;

            font-size: 13px;

            background: #ffffff;

            pointer-events: none;

            transition: all 0.2s ease;

            border-radius: 5px;
        }

        .input-field input:focus + label,
        .input-field input:valid + label {
            top: 0;

            left: 14px;

            transform: translateY(-50%);

            color: #2563eb;

            font-size: 11px;

            font-weight: 600;
        }

        /* =========================================================
           ERROR
        ========================================================= */

        .error-message {
            margin-top: 7px;

            padding-left: 3px;

            display: flex;

            align-items: center;

            gap: 5px;

            color: #dc2626;

            font-size: 11px;

            font-weight: 500;
        }

        .error-message i {
            font-size: 13px;
        }

        /* =========================================================
           SHOW PASSWORD
        ========================================================= */

        .remember {
            display: flex;

            align-items: center;

            gap: 9px;

            margin-top: -3px;

            color: #64748b;

            font-size: 12px;

            cursor: pointer;
        }

        .remember input {
            width: 16px;

            height: 16px;

            accent-color: #2563eb;

            cursor: pointer;
        }

        .remember label {
            cursor: pointer;

            user-select: none;
        }

        /* =========================================================
           BUTTON
        ========================================================= */

        .login-btn {
            width: 100%;

            height: 54px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            border: none;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #2563eb 0%,
                    #1d4ed8 100%
                );

            color: #ffffff;

            font-family: 'Poppins', sans-serif;

            font-size: 14px;

            font-weight: 600;

            letter-spacing: 0.5px;

            cursor: pointer;

            box-shadow:
                0 10px 25px rgba(37, 99, 235, 0.25);

            transition: all 0.25s ease;
        }

        .login-btn i {
            font-size: 18px;

            transition: transform 0.25s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);

            box-shadow:
                0 14px 30px rgba(37, 99, 235, 0.35);
        }

        .login-btn:hover i {
            transform: translateX(4px);
        }

        .login-btn:active {
            transform: scale(0.98);
        }
        .forgot-password {
    width: 100%;
    text-align: right;
    margin-top: -10px;
}

.forgot-password a {
    color: #2563eb;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: .2s ease;
}

.forgot-password a:hover {
    color: #1d4ed8;
    text-decoration: underline;
}
        /* =========================================================
           REGISTER
        ========================================================= */

        .acc-text {
            width: 100%;

            text-align: center;

            color: #64748b;

            font-size: 12px;

            margin-top: 2px;
        }

        .acc-text a {
            color: #2563eb;

            font-weight: 600;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            gap: 5px;

            transition: 0.2s ease;
        }

        .acc-text a:hover {
            color: #1d4ed8;

            text-decoration: underline;
        }

        .acc-text a i {
            font-size: 14px;
        }

        /* =========================================================
           DIVIDER
        ========================================================= */

        .divider {
            display: flex;

            align-items: center;

            gap: 12px;

            margin: 2px 0;
        }

        .divider span {
            color: #94a3b8;

            font-size: 11px;

            font-weight: 500;
        }

        .divider::before,
        .divider::after {
            content: "";

            height: 1px;

            flex: 1;

            background: #e2e8f0;
        }

        .google-btn {
            width: 100%;

            min-height: 52px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 12px;

            border: 1px solid #cbd5e1;

            border-radius: 12px;

            background: #ffffff;

            color: #334155;

            font-size: 14px;

            font-weight: 600;

            text-decoration: none;

            transition: border-color 0.2s ease, background-color 0.2s ease;
        }

        .google-btn:hover,
        .google-btn:focus-visible {
            border-color: #94a3b8;

            background: #f8fafc;

            color: #1e293b;
        }

        .google-btn svg {
            width: 20px;

            height: 20px;

            flex: 0 0 auto;
        }

        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 500px) {

            body {
                padding: 15px;
            }

            .login-container {
                padding: 30px 22px;

                border-radius: 24px;
            }

            .logo {
                width: 120px;
                height: 120px;
            }

            .logo-name {
                font-size: 27px;
            }

            .heading {
                font-size: 21px;
            }

            .heading i {
                font-size: 23px;
            }

            .sub-heading {
                font-size: 12px;

                margin-bottom: 24px;
            }

            .form {
                gap: 18px;
            }

            .input-field input {
                height: 54px;
            }

            .input-icon {
                top: 27px;
            }

            .input-field label {
                top: 27px;
            }

            .login-btn {
                height: 52px;
            }
        }

        @media (max-width: 350px) {

            .login-container {
                padding: 25px 17px;
            }

            .heading {
                font-size: 18px;
            }

            .logo {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <a href="<?php echo e(route('home')); ?>" class="back-home">
            <i class="bi bi-arrow-left" aria-hidden="true"></i>
            Back to Home
        </a>

        

        <div class="logo-wrapper">

            <img
                src="<?php echo e(asset('img/product/download.png')); ?>"
                alt="Romdoul Flower Logo"
                class="logo"
            >

            <div class="logo-name">
                Romdoul
            </div>

            <div class="logo-subtitle">
                FLOWER
            </div>

        </div>


        

        <div class="heading">

            <i class="bi bi-box-arrow-in-right"></i>

            <span>
                Login to your account
            </span>

        </div>

        <div class="sub-heading">
            Welcome back! Please enter your details.
        </div>


        

        <form
            class="form"
            action="<?php echo e(route('login')); ?>"
            method="POST"
        >

            <?php echo csrf_field(); ?>


            

            <div class="input-field">

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?php echo e(old('email')); ?>"
                    required
                    autocomplete="email"
                >

                <label for="email">
                    Email
                </label>

                <i class="bi bi-envelope input-icon"></i>


                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                    <div class="error-message">

                        <i class="bi bi-exclamation-circle-fill"></i>

                        <span>
                            <?php echo e($message); ?>

                        </span>

                    </div>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>


            

            <div class="input-field">

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    autocomplete="current-password"
                >

                <label for="password">
                    Password
                </label>

                <i class="bi bi-lock input-icon"></i>


                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                    <div class="error-message">

                        <i class="bi bi-exclamation-circle-fill"></i>

                        <span>
                            <?php echo e($message); ?>

                        </span>

                    </div>

                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>

            <div class="forgot-password">
    <a href="<?php echo e(route('password.request')); ?>">
        Forgot Password?
    </a>
</div>
            

            <div class="remember">

                <input
                    type="checkbox"
                    id="togglePassword"
                >

                <label for="togglePassword">
                    Show password
                </label>

            </div>


            

            <button
                type="submit"
                class="login-btn"
            >

                <span>
                    Login
                </span>

                <i class="bi bi-arrow-right"></i>

            </button>


            

            <div class="acc-text">

                New here?

                <a href="<?php echo e(route('register')); ?>">

                    Create Account

                    <i class="bi bi-person-plus"></i>

                </a>

            </div>

            <div class="divider" aria-hidden="true">
                <span>OR</span>
            </div>

            <a href="<?php echo e(route('google.redirect')); ?>" class="google-btn">
                <svg viewBox="0 0 48 48" aria-hidden="true" focusable="false">
                    <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5Z"/>
                    <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.25 5.48-4.73 7.18l7.64 5.93c4.46-4.13 7.13-10.2 7.13-17.58Z"/>
                    <path fill="#FBBC05" d="M10.53 28.59a14.4 14.4 0 0 1 0-9.18l-7.98-6.19a23.9 23.9 0 0 0 0 21.56l7.98-6.19Z"/>
                    <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.9-5.87l-7.64-5.93c-2.13 1.43-4.86 2.28-8.26 2.28-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48Z"/>
                </svg>
                <span>Continue with Google</span>
            </a>

        </form>

    </div>


    

    <script>

        const passwordInput =
            document.getElementById('password');

        const toggleCheckbox =
            document.getElementById('togglePassword');


        toggleCheckbox.addEventListener(
            'change',
            function () {

                if (this.checked) {

                    passwordInput.type = 'text';

                } else {

                    passwordInput.type = 'password';

                }

            }
        );

    </script>

</body>

</html><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/Auth/login.blade.php ENDPATH**/ ?>