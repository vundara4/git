<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create Account | Romdul Delivery</title>

    
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>

        /* =========================================================
           RESET
        ========================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =========================================================
           BODY
        ========================================================== */

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
                    circle at top left,
                    rgba(148, 163, 255, 0.35),
                    transparent 35%
                ),
                radial-gradient(
                    circle at bottom right,
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


        /* =========================================================
           BACKGROUND DECORATION
        ========================================================== */

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
           REGISTER CONTAINER
        ========================================================== */

        .register-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 470px;

            padding: 40px;

            background: rgba(255, 255, 255, 0.70);

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

                transform:
                    translateY(25px)
                    scale(0.98);
            }

            to {
                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);
            }

        }


        /* =========================================================
           LOGO
        ========================================================== */

        .logo-wrapper {

            width: 100%;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            margin-bottom: 25px;
        }


        .logo {

            width: 125px;

            height: 125px;

            object-fit: contain;

            display: block;

            margin-bottom: 7px;

            filter:
                drop-shadow(
                    0 8px 12px
                    rgba(22, 101, 52, 0.12)
                );
        }


        .logo-name {

            font-size: 31px;

            font-weight: 800;

            font-style: italic;

            letter-spacing: -1px;

            color: #15803d;

            line-height: 1;
        }


        .logo-subtitle {

            margin-top: 5px;

            color: #15803d;

            font-size: 11px;

            font-weight: 600;

            letter-spacing: 7px;

            padding-left: 7px;
        }


        /* =========================================================
           HEADING
        ========================================================== */

        .heading {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 9px;

            margin-bottom: 7px;

            color: #0f172a;

            font-size: 23px;

            font-weight: 700;

            text-align: center;
        }


        .heading i {

            color: #2563eb;

            font-size: 25px;
        }


        .sub-heading {

            margin-bottom: 25px;

            color: #64748b;

            font-size: 12px;

            text-align: center;

            line-height: 1.6;
        }


        /* =========================================================
           FORM
        ========================================================== */

        .form {

            width: 100%;

            display: flex;

            flex-direction: column;

            gap: 17px;
        }


        /* =========================================================
           INPUT FIELD
        ========================================================== */

        .input-field {

            position: relative;

            width: 100%;
        }


        .input-field input {

            width: 100%;

            height: 55px;

            padding:
                14px
                16px
                14px
                47px;

            font-family: 'Poppins', sans-serif;

            font-size: 13px;

            color: #0f172a;

            background: rgba(255, 255, 255, 0.90);

            border: 1.5px solid #cbd5e1;

            border-radius: 12px;

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
                0 0 0 4px
                rgba(37, 99, 235, 0.10);

            transform: translateY(-1px);
        }


        /* =========================================================
           INPUT ICON
        ========================================================== */

        .input-icon {

            position: absolute;

            left: 16px;

            top: 27.5px;

            transform: translateY(-50%);

            color: #64748b;

            font-size: 18px;

            transition: 0.25s ease;

            pointer-events: none;

            z-index: 2;
        }


        .input-field input:focus ~ .input-icon {

            color: #2563eb;
        }


        /* =========================================================
           FLOATING LABEL
        ========================================================== */

        .input-field label {

            position: absolute;

            left: 42px;

            top: 27.5px;

            transform: translateY(-50%);

            padding: 0 6px;

            color: #64748b;

            font-size: 12px;

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

            font-size: 10px;

            font-weight: 600;
        }


        /* =========================================================
           ERROR MESSAGE
        ========================================================== */

        .error-message {

            margin-top: 6px;

            padding-left: 3px;

            display: flex;

            align-items: center;

            gap: 5px;

            color: #dc2626;

            font-size: 10px;

            font-weight: 500;
        }


        .error-message i {

            font-size: 12px;
        }


        /* =========================================================
           SHOW PASSWORD
        ========================================================== */

        .remember {

            display: flex;

            align-items: center;

            gap: 8px;

            margin-top: -2px;

            color: #64748b;

            font-size: 11px;

            cursor: pointer;
        }


        .remember input {

            width: 15px;

            height: 15px;

            accent-color: #2563eb;

            cursor: pointer;
        }


        .remember label {

            cursor: pointer;

            user-select: none;
        }


        /* =========================================================
           REGISTER BUTTON
        ========================================================== */

        .register-btn {

            width: 100%;

            height: 53px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 9px;

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

            letter-spacing: 0.4px;

            cursor: pointer;

            box-shadow:
                0 10px 25px
                rgba(37, 99, 235, 0.25);

            transition: all 0.25s ease;
        }


        .register-btn i {

            font-size: 17px;

            transition: transform 0.25s ease;
        }


        .register-btn:hover {

            transform: translateY(-2px);

            box-shadow:
                0 14px 30px
                rgba(37, 99, 235, 0.35);
        }


        .register-btn:hover i {

            transform: translateX(4px);
        }


        .register-btn:active {

            transform: scale(0.98);
        }


        /* =========================================================
           LOGIN LINK
        ========================================================== */

        .acc-text {

            width: 100%;

            text-align: center;

            color: #64748b;

            font-size: 11px;

            margin-top: 1px;
        }


        .acc-text a {

            color: #2563eb;

            font-weight: 600;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            gap: 4px;

            transition: 0.2s ease;
        }


        .acc-text a:hover {

            color: #1d4ed8;

            text-decoration: underline;
        }


        .acc-text a i {

            font-size: 13px;
        }


        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 500px) {

            body {

                padding: 15px;
            }


            .register-container {

                padding: 28px 21px;

                border-radius: 24px;
            }


            .logo {

                width: 105px;

                height: 105px;
            }


            .logo-name {

                font-size: 27px;
            }


            .logo-subtitle {

                font-size: 10px;

                letter-spacing: 6px;
            }


            .heading {

                font-size: 20px;
            }


            .heading i {

                font-size: 22px;
            }


            .sub-heading {

                font-size: 11px;

                margin-bottom: 22px;
            }


            .form {

                gap: 15px;
            }


            .input-field input {

                height: 53px;
            }


            .input-icon {

                top: 26.5px;
            }


            .input-field label {

                top: 26.5px;
            }


            .register-btn {

                height: 51px;
            }
        }


        @media (max-width: 350px) {

            .register-container {

                padding: 24px 16px;
            }


            .heading {

                font-size: 18px;
            }


            .logo {

                width: 90px;

                height: 90px;
            }
        }

    </style>

</head>


<body>

    <div class="register-container">

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

            <i class="bi bi-person-plus"></i>

            <span>
                Create Your Account
            </span>

        </div>


        <div class="sub-heading">

            Register as a customer to place orders and track them.

        </div>


        

        <form
            class="form"
            action="<?php echo e(route('register')); ?>"
            method="POST"
        >

            <?php echo csrf_field(); ?>


            

            <div class="input-field">

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?php echo e(old('name')); ?>"
                    required
                    autocomplete="name"
                >

                <label for="name">
                    Full Name
                </label>

                <i class="bi bi-person input-icon"></i>


                <?php $__errorArgs = ['name'];
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
                    autocomplete="new-password"
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


            

            <div class="input-field">

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                >

                <label for="password_confirmation">
                    Confirm Password
                </label>

                <i class="bi bi-shield-lock input-icon"></i>


                <?php $__errorArgs = ['password_confirmation'];
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
                class="register-btn"
            >

                <span>
                    Create Account
                </span>

                <i class="bi bi-arrow-right"></i>

            </button>


            

            <div class="acc-text">

                Already have an account?

                <a href="<?php echo e(route('login')); ?>">

                    Login

                    <i class="bi bi-box-arrow-in-right"></i>

                </a>

            </div>


        </form>

    </div>


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    

    <script>

        const passwordInput =
            document.getElementById('password');

        const confirmInput =
            document.getElementById('password_confirmation');

        const toggleCheckbox =
            document.getElementById('togglePassword');


        toggleCheckbox.addEventListener(
            'change',
            function () {

                const type =
                    this.checked
                        ? 'text'
                        : 'password';

                passwordInput.type = type;

                confirmInput.type = type;

            }
        );

    </script>

</body>

</html><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/Auth/register.blade.php ENDPATH**/ ?>