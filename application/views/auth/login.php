<div class="content content__login">
  <?php echo form_open('auth/login', 'class="form form__login"', 'id="form-login"');?>
    <h1 class="content__title"><a href="<?= base_url("auth/login") ?>" alt="Infobits - Início"><img src="<?= base_url("assets/images/logo-branca.png") ?>"></a></h1>
    <p class="form__aviso"><?php echo lang('login_subheading');?></p>

    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>

    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>

    <div class="remember_pass">
      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"', 'class="label__remember"');?>
      <?php echo lang('login_remember_label', 'remember');?>
    </div>

    <?php echo form_submit('submit', 'Entrar', lang('login_submit_btn'));?>

    <a href="forgot_password" class="forgot_password"><?php echo lang('login_forgot_password');?></a>
  <?php echo form_close();?>
</div>
