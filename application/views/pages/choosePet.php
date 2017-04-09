<main>

    <div class="container">

        <div class="col s12 center-align">
            <h3><?php echo lang('choose_pet') ?></h3>
            <br>
        </div>
            <div class="col s12">


                    <ul class="collapsible" data-collapsible="accordion">
                    <?php foreach ($pets as $pet): ?>
                        <li>
                            <div class="col s12 m6 offset-6 collapsible-header">
                                <?php $img =$pet['imgname']; ?>
                                <img style='height: 20%; width: 20%; object-fit: contain;display: block;
                                         margin: 0 auto;' src=<?php echo base_url("asset/img/".$img)?> >
                            </div>

                            <div class="col s12 m6 l6 offset-20 collapsible-body right-align">
                                <form method="post" action="<?php echo site_url('ChoosePet/insertPet/') ?>">
                                <?php echo $pet['name'];?>
                                <input type="hidden" name="pet" value="<?php echo $pet['id'] ?>" />
                                <input type="submit" name="submit" value=<?php echo lang('edasi') ?> class="waves-effect waves-light btn"/>
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    </ul>


            </div>
    </div>
</main>

                    <!--<ul class="collapsible" data-collapsible="accordion">
                        <li>

                            <div class="collapsible-header">
                                <object data="<?php echo base_url('/asset/img/loom1.svg') ?>"  type="image/svg+xml"></object>
                            </div>

                            <div class="collapsible-body">
                                <input type="submit" name="submit" value="Next" class="waves-effect waves-light btn"/>
                            </div>
                        </li>


                        <li>
                            <div class="collapsible-header">
                                <object data="<?php echo base_url('/asset/img/loom2.svg') ?>"  type="image/svg+xml"></object>
                            </div>
                            <div class="collapsible-body">
                                <input type="submit" name="submit" value="Next" class="waves-effect waves-light btn"/>
                            </div>
                        </li>
                    </ul>
-->

