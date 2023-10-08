<?php if ( have_rows( 'tabs' ) ) : ?>
	<!--tab widget-->
	<div class="khd-tabs">
		<!--tab container-->
		<div class="khd-tabs__content">
			<!-- Tab Nav -->
			<?php $i = 0; ?>
			<nav class="khd-tabs__navigation">
				<?php while ( have_rows( 'tabs' ) ) : the_row(); ?>
				<?php $i++; ?>
				<button class="khd-tabs__button <? if( $i <= 1 ) echo "khd-tabs__button--active"; ?>"><?php the_sub_field( 'title' ); ?></button>
				<?php endwhile; ?>
			</nav>
			
			<!-- Tab Content -->
			<ul class="khd-tabs__panels">
				<?php $i = 0; ?>
				<?php while ( have_rows( 'tabs' ) ) : the_row(); ?>
				<?php $i++; ?>
					<li class="khd-tabs__panel <? if( $i <= 1 ) echo "khd-tabs__panel--active"; ?>">
						<h3><?php the_sub_field( 'title' ); ?></h3>
						<?php $image = get_sub_field( 'image' ); ?>
						<?php if ( $image ) : ?>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
						<?php endif; ?>
						<?php the_sub_field( 'description' ); ?>
						<?php $button = get_sub_field( 'button' ); ?>
						<?php if ( $button ) : ?>
							<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
						<?php endif; ?>
					</li>
				<?php endwhile; ?>
			</ul>

		</div>
	</div>
<?php endif; ?>