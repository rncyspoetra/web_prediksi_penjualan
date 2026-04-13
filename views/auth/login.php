<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

<link href="/web_prediksi_penjualan/public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="/web_prediksi_penjualan/public/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-6 col-md-8">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                        </div>

                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endif; ?>

                        <form method="POST">

                            <div class="form-group">
                                <input type="text" name="username"
                                    class="form-control form-control-user"
                                    placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password"
                                    class="form-control form-control-user"
                                    placeholder="Password" required>
                            </div>

                            <button class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

</body>
</html>