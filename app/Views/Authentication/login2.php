<?= $this->extend('App\Views\Authentication\index') ?>
<?= $this->section('content') ?>
<div class="card card-outline card-primary">
  <div class="card-header text-center">
    <a href="<?= base_url() ?>" class="h1"><?= config('Application')->appName ?></a>
  </div>
  <div class="card-body">
    <p class="login-box-msg"><?= lang('Auth.loginTitle') ?></p>
    <?= $this->include('App\Views\Authentication\message_block') ?>
    <form action="<?= route_to('login') ?>" method="post" id="form-login">
      <?php if ($config->validFields === ['email']) { ?>
        <div class="input-group mb-3">
          <input type="email" name="login" class="form-control <?= session('error.login') || session('errors.login') ? 'is-invalid' : '' ?>" placeholder="<?= lang('Auth.email') ?>" value="<?= old('login') ?>" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <div class="invalid-feedback">
            <?= session('errors.login') ?>
          </div>
        </div>
      <?php } else { ?>
        <div class="input-group mb-3">
          <input type="text" name="login" class="form-control <?= session('error.login') || session('errors.login') ? 'is-invalid' : '' ?>" placeholder="<?= lang('Auth.emailOrUsername') ?>" value="<?= old('login') ?>" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <div class="invalid-feedback">
            <?= session('errors.login') ?>
          </div>
        </div>
      <?php } ?>

      <div class="input-group mb-3">
        <input type="password" name="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" placeholder="<?= lang('Auth.password') ?>">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
        <div class="invalid-feedback">
          <?= session('errors.password') ?>
        </div>
      </div>

      <?php if ($config->allowRemembering) { ?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
        </div>
      <?php } ?>
      <div class="d-flex justify-content-between">
        <div class="icheck-primary">
          <input type="checkbox" id="password-visibility">
          <label for="password-visibility">
            Show Password
          </label>
        </div>
      </div>
    </form>

    <div class="social-auth-links text-center mt-2 mb-3">
      <button type="submit" form="form-login" class="btn btn-block btn-primary">
        <?= lang('Auth.signIn') ?>
      </button>
    </div>
    <!-- /.social-auth-links -->

    <p class="mb-1">
      <a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
    </p>
    <?php if ($config->allowRegistration) { ?>
      <p class="mb-0">
        <a href="<?= route_to('register') ?>" class="text-center"><?= lang('Auth.needAnAccount') ?></a>
      </p>
    <?php } ?>
  </div>
  <!-- /.card-body -->
</div>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
  $('#password-visibility').change(function() {
    const password = $('[name=password]')

    // password toggle
    if (this.checked) {
      password.attr('type', 'text')
    } else {
      password.attr('type', 'password')
    }
  })
</script>
<?= $this->endSection() ?>