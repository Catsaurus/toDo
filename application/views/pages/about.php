 <main>
     <div class="container">
         <div class="row">
             <div class="col s12 m6">
                 <h3><?php echo lang('about') ?> </h3>
             </div>
         </div>
         <div class="row">
            <div class="col s6 m6 l6">
                <a class="waves-effect btn-flat " id = "click"><?php echo lang('support') ?></a>
                    <div id="donation">
                    <form method="post" action="<?php echo site_url('About/Payment') ?>">
                                        <!-- include all values as hidden form fields -->

                        <!-- <?php foreach($fields as $key => $val):?>
                            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
                        <?php endforeach; ?>-->


                            <div class="input-field">
                                <input name="payment_name" id="payment_name" type="text">
                                <label for="payment_name"><?php echo lang('payment_name') ?></label>
                            </div>

                            <div class="input-field">
                                <input name="payment_nr" id="payment_nr" type="text">
                                <label for="payment_nr"><?php echo lang('payment_nr') ?></label>
                            </div>
                            <p><?php echo lang('summa') ?></p>
                            <div class="container">
                                <p>
                                    <input name="amount" type="radio" id="test1" value="20"/>
                                    <label for="test1"><?php echo lang('amount1') ?></label>
                                </p>
                                <p>
                                    <input name="amount" type="radio" id="test2" value="500" />
                                    <label for="test2"><?php echo lang('amount2') ?></label>
                                </p>
                                <p>
                                    <input name="amount" type="radio" id="test3" checked="checked" value="3000"/>
                                    <label for="test3"><?php echo lang('amount3') ?></label>
                                </p>
                            </div>
                            <div class="col s12 m6 offset-l9">
                                <input type="submit" name="submit" value=<?php echo lang('payment')?> class="waves-effect btn"/>
                            </div>

                    </form>
                    </div>
            </div>
            <div class="col s6 l6">
                <div id="googleMap">
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnbcCUfwLZEDJOeqGm9VRfJSKeqETl40I&callback=myMap"></script>
                </div>
                <p class="petData"></p>

            </div>
        </div>
    </div>

</main>