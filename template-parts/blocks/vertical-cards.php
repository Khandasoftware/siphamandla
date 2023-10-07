<?php if ( have_rows( 'vertical_cards' ) ) : ?>
	<?php while ( have_rows( 'vertical_cards' ) ) : the_row(); ?>
		<?php the_sub_field( 'title' ); ?>
		<?php $image = get_sub_field( 'image' ); ?>
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
		<?php endif; ?>
		<?php the_sub_field( 'description' ); ?>
		<?php $button = get_sub_field( 'button' ); ?>
		<?php if ( $button ) : ?>
			<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>