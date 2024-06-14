<?php if (is_array($tutorialList) && count($tutorialList) > 0) {
    foreach ($tutorialList as $tutorial) {
        ?>

        <div style="padding:10px;">
            <table style="padding:5px; float: left">
                <tr style="height:20px">
                    <td style="border:inset" colspan=2 align="center"><iframe width="256" height="160"
                            src="<?php echo $tutorial['tutorial_link']; ?>" frameborder="0" allowfullscreen></iframe></td>
                </tr>
            </table>
        </div>

    <?php }
} else { ?>
    <div style="font-weight: bold;">
        </br></br></br></br>
        <p style="text-align:center">No tutorials are added for this category yet. Stay connected, it
            will be added...</p>
    </div>

<?php } ?>