<?php if ( have_rows( 'accordion' ) ) : ?>
	<div class="khd-accordion">
    <ul class="khd-accordion__list">
	<?php while ( have_rows( 'accordion' ) ) : the_row(); ?>
	    <li class="khd-accordion_item">
            <button class="khd-accordion__button">
                <span class="khd-accordion__title"><?php the_sub_field( 'title' ); ?></span>
                <span class="khd-accordion__icon"></span>
            </button>
            <section class="khd-accordion__panel">
				<?php $image = get_sub_field( 'image' ); ?>
				<?php if ( $image ) : ?>
					<img class="khd-accordion__image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
				<?php endif; ?>
				<?php the_sub_field( 'description' ); ?>
				<?php $button = get_sub_field( 'button' ); ?>
				<?php if ( $button ) : ?>
					<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
				<?php endif; ?>
            </section>
        </li>
	<?php endwhile; ?>
    </ul>
</div>
<?php endif; ?>