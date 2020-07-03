<?php
if (!empty($alert_type)) {
    ?>
    <div class="alert alert-<?php echo $alert_type; ?>">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $alert_message; ?>
    </div>
    <?php
} ?>
