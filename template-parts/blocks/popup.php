<?php if ( have_rows( 'popup' ) ) : ?>
	<?php while ( have_rows( 'popup' ) ) : the_row(); ?>
		<div class="khd-popup" data-toggable>
        <button class="khd-popup__open-button" data-toggable_open>Open Popup</button>
        <div class="khd-popup__background">
            <button class="khd-popup__close-button" data-toggable_close>Close</button>
            <div class="khd-popup__content">
				<h2><?php the_sub_field( 'title' ); ?></h2>
				<?php the_sub_field( 'description' ); ?>
				<?php $image = get_sub_field( 'image' ); ?>
				<?php if ( $image ) : ?>
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
				<?php endif; ?>
				<?php $button = get_sub_field( 'button' ); ?>
				<?php if ( $button ) : ?>
					<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
				<?php endif; ?>
            </div>
        </div>
    </div>
	<?php endwhile; ?>
<?php endif; ?>