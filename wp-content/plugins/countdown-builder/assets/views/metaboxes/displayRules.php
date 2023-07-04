<div class="ycd-bootstrap-wrapper">
    <div class="row">
        <div class="col-md-6">
            <label for="ycd-countdown-end-sound" class="ycd-label-of-switch"><?php _e('Display On', YCD_TEXT_DOMAIN); ?></label>
        </div>
        <div class="col-md-6">
            <label class="ycd-switch">
                <input type="checkbox" id="ycd-countdown-display-on" name="ycd-countdown-display-on" class="ycd-accordion-checkbox" <?php echo esc_attr($this->getOptionValue('ycd-countdown-display-on')); ?>>
                <span class="ycd-slider ycd-round"></span>
            </label>
        </div>
    </div>
    <div class="ycd-accordion-content ycd-hide-content">
        <?php require_once dirname(__FILE__).'/displaySettings.php'; ?>
    </div>
</div>