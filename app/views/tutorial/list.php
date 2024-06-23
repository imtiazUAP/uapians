<div style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: space-around;">
<?php
foreach ($tutorialList as $tutorial) { ?>
    <div style="flex: 0 1 calc(50% - 20px); margin: 10px 0;">
        <object width="100%" height="315" data="<?= $tutorial['tutorial_link'] ?>">
        </object>
    </div>
<?php } ?>
</div>

