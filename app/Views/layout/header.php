<nav id="nav-top" class="main-header navbar navbar-expand navbar-<?= config('Application')->theme['navbar']['bg'] ?> navbar-<?= config('Application')->theme['navbar']['type'] ?> <?= config('Application')->theme['navbar']['type'] ? '' : 'border-bottom-0' ?>">
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="nav-link sidebar-toggle" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->
        <?php if (config('Application')->theme['navbar']['user']['visible']) { ?>
            <li class="nav-item">
                <a href="<?= route_to('user-profile') ?>" class="nav-link d-flex align-items-center">
                    <img src="/assets/images/logo-tp.png" class="avatar-img img-circle bg-gray mr-2 elevation-<?= config('Application')->theme['navbar']['user']['shadow'] ?>" alt="<?= user()->username ?>" height="32">
                    <?= user()->username ?>
                </a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <input type="checkbox" name="dark-mode-switch" id="dark-mode-switch" style="display: none;">
            <label class="nav-link" for="dark-mode-switch" id="dark-mode-switch-label" style="cursor: pointer;" title="Dark Mode">
                <i class="far fa-moon"></i>
            </label>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Full Screen">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <?php if (config('Application')->theme['navbar']['dropdown-logout']) { ?>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-power-off"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="/assets/images/logo-tp.png" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= user()->username ?></h3>

                            <p class="text-muted text-center"><?= user()->email ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <span><?= lang('boilerplate.user.fields.join') ?></span>
                                    <div class="float-right">
                                        <?= user()->created_at->toLocalizedString('MMM d, yyyy') ?>
                                    </div>
                                </li>
                            </ul>

                            <a href="<?= route_to('logout') ?>" class="btn btn-primary btn-block"><b><?= lang('boilerplate.global.logout') ?></b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <button type="button" class="btn nav-link btn-logout" title="Log Out">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </li>
        <?php } ?>
    </ul>
</nav>