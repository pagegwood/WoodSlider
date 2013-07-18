<div class="wrap">
    <h2>Wood Slider</h2>
    <form method="post" action="options.php"> 
        <?php @settings_fields('Wood_Slider-group'); ?>
        <?php @do_settings_fields('Wood_Slider-group'); ?>

        <?php do_settings_sections('Wood_Slider'); ?>

        <?php @submit_button(); ?>
    </form>
</div>