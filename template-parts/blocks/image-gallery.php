<?php if ( have_rows( 'image_gallery' ) ) : ?>
	<div class="khd-gallery">
    <ul class="khd-gallery__list">
		<?php while ( have_rows( 'image_gallery' ) ) : the_row(); ?>
			<?php $button = get_sub_field( 'button' ); ?>
			<?php $image = get_sub_field( 'image' ); ?>
				<li class="khd-gallery__item">
					<a class="khd-gallery__link" data-fslightbox="gallery" href="<?php echo esc_url( $image['url'] ); ?>">
						<img class="khd-gallery__thumbnail" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
					</a>
				</li>
		<?php endwhile; ?>
    </ul>
</div>
<?php endif; ?>


<!-- data-caption="
					<h3><?php //the_sub_field( 'title' ); ?></h3>
					<p><?php //the_sub_field( 'description' ); ?></p>
					<a href='<?php //echo esc_url( $button['url'] ); ?>' target='<?php //echo esc_attr( $button['target'] ); ?>'><?php //echo esc_html( $button['title'] ); ?></a>
					"  -->