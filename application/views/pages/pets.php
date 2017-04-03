<main>
    <div class="container">
<div class="row"></div>
        <div class="row"></div>
        <div class="row">
            <div class="col s12">
                <?php foreach ($pets as $pet): ?>
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
                                <img alt="sheep" src=<?php echo base_url("asset/img/".$img)?> >
                               </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="row">
            <div class="col s4"></div>
            <div class="col s3">

                <!--<button type="submit" name="submit" class="col s12 btn btn-large waves-effect"><?php echo lang('see_more_pets')?></button>-->


            </div>
            <div class="col s4"></div>
        </div>
    </div>
</main>