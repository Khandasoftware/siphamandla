

<?php if ( have_rows( 'horizontal_card' ) ) : ?>
	<?php while ( have_rows( 'horizontal_card' ) ) : the_row(); ?>
		<div class="khd-horizontal-card">
			<?php
				$image = get_sub_field( 'image' ); 	
				if ( !$image ){
					$image["url"] ="https://placehold.co/1920x900/png";
					$image["alt"]="Placeholder";
				}
			?>
			<img src="<?= $image["url"]; ?>" alt="" class="khd-horizontal-card__image">
			<div class="khd-horizontal-card__column">
				<section class="khd-horizontal-card__description">
				<h2 class="khd-horizontal-card__title"><?php the_sub_field( 'title' ); ?></h2>
				<div class="khd-horizontal-card__text"><?php the_sub_field( 'description' ); ?></div>
					<?php $button = get_sub_field( 'button' ); ?>
					<?php if ( $button ) : ?>
						<a class="khd-horizontal-card__button" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
					<?php endif; ?>
				</section>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>