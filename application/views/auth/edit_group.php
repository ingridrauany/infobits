
<h2 class="content__title">Editar Grupo</h2>
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url(), 'class="form form--editgroup" id="form-editgroup"');?>

      <div class="form__title">Dados</div>

      <div class="form__group">
        <div class="form__group--2">
            <label for="group_name">Nome</label>
            <?php echo form_input(['name' => 'group_name', 'class' => 'input', 'value' => $group_name['value'] ]);?>
        </div>

        <div class="form__group--2">
            <label for="description">Descrição</label>
            <?php echo form_input(['name' => 'group_description', 'class' => 'input', 'value' => $group_description['value'] ]);?> 
        </div>
      </div>

      <div class="form_buttons">
        <a href="<?= base_url("auth") ?>" alt="Listar Usuarios" class="btn btn--cancel">Cancelar</a>
        <button type="submit" class="btn btn-submit">Salvar</button>
      </div>

<?php echo form_close();?>