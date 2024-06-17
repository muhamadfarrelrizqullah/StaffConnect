<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../" />
    <title>Register - StaffConnect</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" action="{{ route('register-process') }}" method="POST"
                            id="registerForm">
                            @csrf
                            <div class="text-center mb-11">
                                <h1 class="text-gray-900 fw-bolder mb-3">Create Your Account!</h1>
                                <div class="text-gray-500 fw-semibold fs-6">Please register to get started</div>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Enter your name" name="name"
                                    class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-8">
                                <input type="email" placeholder="Enter your email" name="email"
                                    class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Enter your password" name="password"
                                    class="form-control bg-transparent" />
                                <div class="text-muted mt-2">Use 5 or more characters with a mix of letters, numbers &
                                    symbols.</div>
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Confirm your password" name="confirmPassword"
                                    class="form-control bg-transparent" />
                                <div class="text-muted mt-2">Password and confirm password must match.</div>
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <div class="text-gray-500 text-center fw-semibold fs-6">Have an account yet?
                                <a href="{{ route('login') }}" class="link-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
                    <div class="me-10">
                        <a href="/"><img alt="Logo" src="assets/media/logos/default.png"
                                class="theme-light-show h-30px app-sidebar-logo-default" /></a>
                        <a href="/"><img alt="Logo" src="assets/media/logos/default-dark.png"
                                class="theme-dark-show h-30px app-sidebar-logo-default" /></a>
                    </div>
                    <div class="d-flex fw-semibold text-primary fs-base gap-5">
                        <a>Terms</a>
                        <a>Plans</a>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url(assets/media/misc/bg.png)">
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Streamline Your
                        Workforce Management</h1>
                    <div class="d-none d-lg-block text-white fs-base text-center">
                        Our application ensures quick, efficient, and productive
                        <a class="opacity-75-hover text-warning fw-bold me-1">employee data recording</a>.
                        <br> Seamlessly add or update employee profiles and gain instant access to comprehensive
                        <br> background information.
                        <a class="opacity-75-hover text-warning fw-bold me-1">Effortlessly track </a>
                        and <a class="opacity-75-hover text-warning fw-bold me-1">manage your team's
                            details </a> <br> in a user-friendly format, enhancing your HR
                        operations and boosting productivity.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/js/custom/authentication/sign-in/general.js"></script>
    <script>
        $('#registerForm').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            let formData = form.serialize();

            const swalMixinSucces = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            });

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    swalMixinSucces.fire({
                        icon: 'success',
                        title: 'Registration Successful!',
                        text: 'Please log in.',
                    }).then(() => {
                        window.location.href = response.redirect;
                    });
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);

                    let errorMessage = 'Unknown error occurred. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMessage = Object.values(xhr.responseJSON.errors).join('<br>');
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Registration Failed!',
                        html: errorMessage
                    });
                }
            });
        });
    </script>
</body>

</html>
