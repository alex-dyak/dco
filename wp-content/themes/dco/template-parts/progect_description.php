<div class="projectDescription">
  <?php if ( get_sub_field( 'header' ) ): ?>
      <h1 class="projectDescription-title">
        <?php echo the_sub_field( 'header' ); ?>
      </h1>
  <?php endif; ?>

  <?php if ( get_sub_field( 'subheader' ) ): ?>
      <h3 class="projectDescription-subtitle">
        <?php echo the_sub_field( 'subheader' ); ?>
      </h3>
  <?php endif; ?>

  <?php if ( get_sub_field( 'body' ) ): ?>
      <div class="projectDescription-description">
        <?php echo the_sub_field( 'body' ); ?>
      </div>
  <?php endif; ?>
</div>


