<main>

    <div class="container">
    <div class="row"></div>
        <div class="row">
            <div class="col s12">
                <h3><?php echo lang('your_pets')?></h3>
                <div>

                    <?php foreach($user_pets as $pet):?>
                    <div class="row">
                        <div class="col s4">
                            <div> <?php echo $pet['name'];?></div>
                        </div>
                        <div class="col s4">
                            <div><?php echo $pet['description'];?></div>
                        </div>
                        <div class="col s4">
                            <div>
                                <?php $img =$pet['imgname']; ?>
                                <img alt="pet" src=<?php echo base_url("asset/img/".$img)?> >
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <div class="row">
            <h3><?php echo lang('other_pets')?></h3>
            <div class="col s12">
                <div id="petDiv">
                    <script>loadMore();</script>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s4"></div>
            <div class="col s3">

            </div>
            <div class="col s4"></div>
        </div>
    </div>
</main>