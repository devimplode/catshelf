<?php use UI\Form; ?>
<div class="create-post-form-container">
<?php echo Form::start( 'post-create', array( 'method' => 'post', 'class' => 'form-horizontal' ) ); ?>

    <div class="form-group">
        <?php echo Form::label( 'title', 'Title' )->add_class( 'col-sm-2' ); ?>
        <div class="col-sm-7">
              <?php echo Form::input( 'title' ); ?>
        </div>
        <div class="col-sm-3">
              <?php echo Form::select( 'type', array(
				'conversation' => 'Unterhaltung',
				'poll' => 'Umfrage',
				'file' => 'Datei',
				) ); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo Form::label( 'description', 'Text' )->add_class( 'col-sm-2' ); ?>
        <div class="col-sm-10">
              <?php echo Form::textarea( 'description' ); ?>
        </div>
    </div>

    <!-- buttons -->
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>

<?php echo Form::end(); ?>
</div>
