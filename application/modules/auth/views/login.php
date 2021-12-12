<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta4
* @link https://tabler.io
* Copyright 2018-2021 The Tabler Authors
* Copyright 2018-2021 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="<?= base_url('assets') ?>/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets') ?>/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets') ?>/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets') ?>/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets') ?>/dist/css/demo.min.css" rel="stylesheet" />
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="."><img src="<?= base_url('assets') ?>/static/logo.svg" height="36" alt=""></a>
            </div>
            <?= form_open('login') ?>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Login to your account</h2>
                    <?php if ($this->session->flashdata('failed')) : ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <div class="d-flex">
                                <div>
                                    <h4 class="alert-title"><?= $this->session->flashdata('failed') ?></h4>
                                </div>
                            </div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter email">
                        <div class="text-danger mt-1"><?= form_error('email') ?></div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-flat">
                            <input name="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
                        </div>
                        <div class="text-danger mt-1"><?= form_error('password') ?></div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
            <div class="text-center text-muted mt-3">
                Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('assets') ?>/dist/js/tabler.min.js"></script>
</body>

</html>