<!-- <h1><?php echo lang('edit_user_heading');?></h1>
<p><?php echo lang('edit_user_subheading');?></p> -->

<h2 class="content__title"><?php echo lang('edit_user_heading');?></h2>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string(), 'class="form form--edituser" id="form-edituser"');?>


      <div class="form__group">
        <div class="form__group--2">
            <label for="group_name">Nome</label>
            <?php echo form_input(['name' => 'first_name', 'class' => 'input', 'value' => $first_name['value'] ]);?>
        </div>

        <div class="form__group--2">
            <label for="description">E-mail</label>
            <?php echo form_input(['name' => 'email', 'class' => 'input', 'value' => $email['value'] ]);?>
        </div>
      </div>

      <div class="form__group">
        <div class="form__group--2">
            <label for="description">Telefone</label>
            <?php echo form_input(['name' => 'phone', 'id' => 'telefone', 'class' => 'input', 'id' => 'telefone', 'value' => $phone['value'] ]);?>
        </div>

        <div class="form__group--2">
            <label for="group_name">CPF</label>
            <?php echo form_input(['name' => 'cpf', 'class' => 'input', 'id' => 'cpf', 'value' => $cpf['value'] ]);?>
        </div>
      </div>

      <div class="form__group">
        <div class="form__group--2">
            <label for="group_name">Matrícula</label>
            <?php echo form_input(['name' => 'matricula', 'class' => 'input', 'value' => $matricula['value'] ]);?>
        </div>
      </div>


      <div class="form__group">
        <div class="form__group--2">
            <label for="group_name">Senha</label>
            <?php echo form_input(['name' => 'password', 'class' => 'input', 'type' => 'password']);?>
        </div>

        <div class="form__group--2">
            <label for="description">Confirmar Senha</label>
            <?php echo form_input(['name' => 'password_confirm', 'class' => 'input', 'type' => 'password']);?>
        </div>
      </div>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="radio" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <div class="form_buttons">
        <a href="<?= base_url("auth") ?>" alt="Listar Usuarios" class="btn btn--cancel">Cancelar</a>
        <button type="submit" class="btn btn-submit">Salvar</button>
      </div>

<?php echo form_close();?>

<script>
//mascara de inputs
VMasker(document.querySelector('#telefone')).maskPattern('(99) 99999-9999');
VMasker(document.querySelector('#cpf')).maskPattern('999.999.999-99');
</script>