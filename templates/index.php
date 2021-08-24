<h1>TeleLog</h1>
<form action="options.php" method="post">
    <?php
    settings_fields('telelog_options');
    do_settings_sections('telelog');
    submit_button();
    ?>
</form>