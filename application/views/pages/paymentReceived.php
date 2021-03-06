<?php
// STEP 1. Setup bank certificate
// ==============================
    $public_key = openssl_pkey_get_public(
            ""
    );
    //copy-paste public key here


// STEP 2. Define payment information
// ==================================
$fields = array ();
  foreach ((array)$_REQUEST as $f => $v) {
            if (substr ($f, 0, 3) == 'VK_') {
                    $fields[$f] = $v;
            }
  }

//STEP 3. Generate data to be verified
// ====================================

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .
            str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .
            str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .
            str_pad (mb_strlen($fields["VK_REC_ID"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_REC_ID"] .
            str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .
            str_pad (mb_strlen($fields["VK_T_NO"], "UTF-8"),      3, "0", STR_PAD_LEFT) . $fields["VK_T_NO"] .
            str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .
            str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),      3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .
            str_pad (mb_strlen($fields["VK_REC_ACC"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_REC_ACC"] .
            str_pad (mb_strlen($fields["VK_REC_NAME"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_REC_NAME"] .
            str_pad (mb_strlen($fields["VK_SND_ACC"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_SND_ACC"] .
            str_pad (mb_strlen($fields["VK_SND_NAME"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_NAME"] .
            str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),       3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .
            str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),       3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .
            str_pad (mb_strlen($fields["VK_T_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_T_DATETIME"];

// STEP 4. Verify the data with RSA-SHA1
// =====================================
if (openssl_verify ($data, base64_decode($fields["VK_MAC"]), $public_key) !== 1) {
        $signatureVerified = false;
    }else{
        $signatureVerified = true;
    }
// STEP 5. Display output of the received payment
// =====================================

?>
<main>
    <div class="container">
        <div class="col s12 m6 l3">
            <h3><?php echo lang('payment_completed_ok') ?></h3>
            <div class="row">
                <div class= "col s12 m6 l3">
                    <?php if($fields["VK_SERVICE"] == "1111" and $signatureVerified):?>

                        <p><?php echo lang('maksja') ?>  <?php echo $fields["VK_SND_NAME"]?></p>
                        <p><?php echo lang('maksja_konto') ?>  <?php echo $fields["VK_SND_ACC"]?></p>
                        <p><?php echo lang('maksekorraldus') ?>  <?php echo $fields["VK_T_NO"]?></p>
                        <p><?php echo lang('sum') ?>  <?php echo $fields["VK_AMOUNT"]." ".$fields["VK_CURR"]?></p>
                    <?php endif; ?>
                    </div>
                </div>

        </div>
        <div class="col s12 m6 l3">
            <a href="<?php echo site_url('Home/index') ?>" class="waves-effect waves-light btn"><?php echo lang('back') ?></a>
        </div>
    </div>
</main>