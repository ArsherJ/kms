<style>
    .card-body {
        position: relative;
    }

    .logo-img:nth-child(2) {
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .logo-img:nth-child(2) img {
        width: 50px; /* Adjust size as needed */
    }
</style>

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src={{ asset('import/assets/images/logos/cms-logo.png') }} width="180" alt="">
                            </a>
                            <a href="/" class="text-nowrap logo-img text-center d-block py-3">
                                <img src={{ asset('import/assets/images/buttons/back_button.png') }} width="120" alt="">
                            </a>
                            <p class="text-center">LittleLife: Children Nutrition Monitoring System</p>
                            <form id="loginForm">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                    In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
