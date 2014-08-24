<?php foreach( $entities as $entity ) : ?>
<div>
    <a href="<?=to('@shelf.item', array($entity->id)) ?>"><h2><?php echo $entity->type . ": " . $entity->title; ?></h2></a>
    <div><?php echo $entity->description; ?></div>
    <small><?php echo CCDate::format( $entity->created_at ); ?></small>
</div>
<?php endforeach; ?>
