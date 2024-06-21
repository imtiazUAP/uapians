<?php if (($userInfo['group_id'] == 1)) { ?>
    <a href="<?= BASE_URL . '/course/add?keepThis=true&TB_iframe=true&height=212&width=auto&modal=true' ?>" title="New Course"
        class="thickbox">Create New Course</a>
<?php } ?>

<?php
// Define a set of colors
$colors = [
    "#588C73", "#F2AE72", "#D96459", "#8C4646", "#4B3832",
    "#A8A7A7", "#CC527A", "#E8175D", "#474747", "#363636"
];

// Create an associative array to map SMName to a color
$colorMap = [];
$colorIndex = 0;

?>

<table class="hoverTable" border="1" style="padding-bottom:40px;padding-left:40px;padding-right:40px">
    <tr align="center">
        <td width="50" height="50" bgcolor="588C73">Course Code</td>
        <td width="150" bgcolor="588C73">Course Name</td>
        <td width="150" bgcolor="588C73">References</td>
        <td width="150" bgcolor="588C73">Semester</td>
        <?php if (($userInfo['group_id'] == '1')) { ?>
            <td width="150" bgcolor="588C73">Admin actions</td>
        <?php } ?>
    </tr>
    <?php foreach ($courseList as $course) { 
        // Assign a color to each unique SMName
        if (!isset($colorMap[$course['SMName']])) {
            $colorMap[$course['SMName']] = $colors[$colorIndex % count($colors)];
            $colorIndex++;
        }
        $bgColor = $colorMap[$course['SMName']];
    ?>
        <tr align="center" style="background-color: <?php echo $bgColor; ?>;">
            <td height="40"><?php echo $course['CCode']; ?></td>
            <td><?php echo $course['CName']; ?></td>
            <td><a href="<?= BASE_URL . '/reference/list?CID=' . $course['CID'] ?>">Reference Source</a>></td>
            <td><?php echo $course['SMName'] ?></td>
            <?php if ($userInfo['group_id'] == '1') { ?>
                <td>
                    <a href="<?= BASE_URL . '/course/edit?CID=' . $course['CID'] . '&keepThis=true&TB_iframe=true&height=212&width=auto&do=edit&modal=true' ?>" class='thickbox' title='Edit Course - " . $course['CID'] . "'> edit </a>
                    <a href="<?= BASE_URL . '/course/delete-confirm?CID=' . $course['CID'] . '&keepThis=true&TB_iframe=true&height=163&width=auto&do=edit&modal=true' ?>" class='thickbox' title="Confirm Delete Course"> delete </a>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>