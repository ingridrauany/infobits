<h2 class="content__title"><?php echo lang('index_heading');?></h2>

<?php if($this->session->flashdata("success")): ?>
    <p class='alert alert-success'><?= $this->session->flashdata("success"); ?></p>
<?php endif; ?>

<?php if($this->session->flashdata("danger")): ?>
    <p class='alert alert-danger'><?= $this->session->flashdata("danger"); ?></p>
<?php endif; ?>

<a href="<?= base_url("auth/create_user") ?>" class="btn btn--new">Cadastrar Usuário</a>

<div id="infoMessage"><?php echo $message;?></div>
<div class="table__container">
<table class="table table_usuarios">
	<thead> 
		<tr>
			<th class="tab__title"><?php echo lang('index_fname_th');?></th>
			<th class="tab__title">E-mail</th>
			<th class="tab__title">Grupo</th>
			<th class="tab__title">Status</th>
			<th class="tab__title">Matrícula</th>
			<th class="tab__title">CPF</th>
			<th class="tab__title">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user):?>
			<tr>
				<td class="tab__content"><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
				<td class="tab__content"><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
				<td class="tab__content">
					<?php foreach ($user->groups as $group):?>
						<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
					<?php endforeach?>
				</td>
				<td class="tab__content"><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
				<td class="tab__content"><?php echo htmlspecialchars($user->matricula,ENT_QUOTES,'UTF-8');?></td>
				<td class="tab__content"><?php echo htmlspecialchars($user->cpf,ENT_QUOTES,'UTF-8');?></td>
				<td class="tab__actions">
					<?php echo anchor("auth/edit_user/".$user->id, '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>') ;?>
					<a href="<?= base_url("/auth/delete/{$user->id}") ?>" onclick="return confirm('Confirma exclusão do registro?')" alt="Excluir Usuário"><i class='fa fa-trash' aria-hidden='true'></i></a>
                </td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>
</div>