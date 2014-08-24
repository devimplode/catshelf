<?php use UI\Form; ?>
<h1><?=$thread->title ?></h1>
<div>
	<small>By: <a href="<?=to('@user.detail', array($thread->created_by))?>"><?=$thread->created_by?></a> - <?=CCDate::format( $thread->created_at )?></small>
	<p><?=$thread->description ?></p>
</div>
<?php foreach( $conversations as $post ) : ?>
<div>
	<small>By: <a href="<?=to('@user.detail', array($post->created_by))?>"><?=$post->created_by?></a> - <?=CCDate::format( $post->created_at )?></small>
	<p><?=$post->text?></p>
</div>
<?php endforeach; ?>

<div class="create-post-form-container">
	<?php echo Form::start( 'post-create', array( 'method' => 'post', 'class' => 'form-horizontal' ) ); ?>
	<div class="form-group">
        <div class="col-sm-12">
              <?php echo Form::textarea( 'text' ); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>

<?php echo Form::end(); ?>
</div>
