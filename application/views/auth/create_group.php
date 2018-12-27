<!-- <h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p> -->

<h2 class="content__title"><?php echo lang('create_group_heading');?></h2>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_group", 'class="form form--creategroup" id="form-creategroup"');?>
      <div class="form__title">Dados</div>

      <div class="form__group">
        <div class="form__group--2">
            <label for="group_name">Nome</label>
            <input name="group_name" class="input input-name" value="" required="required"/>
        </div>

        <div class="form__group--2">
            <label for="description">Descrição</label>
            <input name="description" class="input input-name" value=""  required="required"/>    
        </div>
      </div>

      <div class="form_buttons">
        <a href="<?= base_url("/auth") ?>" alt="Listar Clientes" class="btn btn--cancel">Cancelar</a>
        <button type="submit" class="btn btn-submit">Salvar</button>
      </div>
<!-- 
      <p><?php echo form_submit('submit', lang('create_group_submit_btn'));?></p> -->

<?php echo form_close();?>