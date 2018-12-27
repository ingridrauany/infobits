<div class="content content__forgotpass">
      <?php echo form_open('auth/forgot_password', 'class="form form__forgotpass"', 'id="form-pass"'); ?>
            <h1 class="content__title"><a href="<?= base_url("auth/login") ?>" alt="Infobits - Início" class="title__image"><img src="<?= base_url("assets/images/logo-branca.png") ?>"></a><?php echo lang('forgot_password_heading');?></h1>
            <p class="form__aviso"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

            <div id="infoMessage"><?php echo $message;?></div>

            <label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label>
            <?php echo form_input($identity);?>

            <?php echo form_submit('submit', lang('forgot_password_submit_btn'));?>

      <?php echo form_close();?>
</div>