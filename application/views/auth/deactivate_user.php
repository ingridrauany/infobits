<h2 class="content__title"><?php echo lang('deactivate_heading');?></h2>

<?php echo form_open("auth/deactivate/".$user->id, 'class="form form--deactive" id="form-deactive"');?>
  
  <?php echo sprintf(lang('deactivate_subheading'), $user->username);?>

  <div class="form__group">
    <div class="form__group--checkbox">
      <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
      <input type="radio" name="confirm" value="yes" checked="checked" /></br>
      <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
      <input type="radio" name="confirm" value="no" />
    </div>
  </div>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>

  <div class="form_buttons">
    <a href="<?= base_url("/auth") ?>" alt="Listar Clientes" class="btn btn--cancel">Cancelar</a>
    <button type="submit" class="btn btn-submit">Confirmar</button>
  </div>

<?php echo form_close();?>