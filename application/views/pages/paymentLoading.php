<?php
?>
<main>
    <form method="post" id = "post1" action="http://localhost:8080/banklink/ipizza">
        <!-- include all values as hidden form fields -->
        <?php foreach($fields as $key => $val):?>
        <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val);?>" />
        <?php endforeach; ?>
        <input type="submit" id="post2" name="send"  value="<?php echo lang('submit') ?>"/>
    </form>
</main>