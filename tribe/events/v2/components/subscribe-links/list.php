<?php
/**
 * Component: Subscribe To Calendar List
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/components/subscribe-links/list.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.12.0
 *
 * @var array<Tribe\Events\Views\V2\iCalendar\Links\Link_Abstract> $items Array containing subscribe/export objects.
 *
 */
if ( empty( $items ) ) {
	return;
}
?>
<div class="tribe-events-c-subscribe-dropdown__container">
	<div class="tribe-events-c-subscribe-dropdown">
		<div class="tribe-common-c-btn-border tribe-events-c-subscribe-dropdown__button" tabindex="0">
			<button class="tribe-events-c-subscribe-dropdown__button-text">
				<?php echo esc_html__( 'Subscribe/Export List', 'the-events-calendar' ); ?>
				<?php $this->template( 'components/icons/caret-down', [ 'classes' => [ 'tribe-events-c-subscribe-dropdown__button-icon' ] ] ); ?>
			</button>
		</div>
		<div class="tribe-events-c-subscribe-dropdown__content">
			<ul class="tribe-events-c-subscribe-dropdown__list" tabindex="0">
				<li class="tribe-events-c-subscribe-dropdown__list-item"><a class="tribe-events-c-subscribe-dropdown__list-item-link" href="https://rishows.com/shows/feed"><?php esc_html_e( 'RSS Feed', 'rishows-din' ); ?></a></li>
				<li class="tribe-events-c-subscribe-dropdown__list-item"><a class="tribe-events-c-subscribe-dropdown__list-item-link" href="mailto:admin@rishows.com?subject=sign&nbsp;me&nbsp;up&nbsp;for&nbsp;rishows&nbsp;emails"><?php esc_html_e( 'Weekly Email Digest', 'rishows-din' ); ?></a></li>
				<?php foreach ( $items as $item ) : ?>
					<?php $this->template( 'components/subscribe-links/item', [ 'item' => $item ] ); ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
