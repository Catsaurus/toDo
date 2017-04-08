<main>

    <div class="container">

        <div class="col s12">
            <h3>Choose your creature</h3>
        </div>
            <div class="col s12">
                <form method="post" action="<?php echo site_url('ChoosePet/insertPet/') ?>">
                    <ul class="collapsible" data-collapsible="accordion">
                    <?php foreach ($pets as $pet): ?>

                        <input type="hidden" name="pet" value="<?php echo $pet['id'] ?>" />
                        <li>
                                <div class="col s6 collapsible-header">
                                    <?php $img =$pet['imgname']; ?>
                                    <img src=<?php echo base_url("asset/img/".$img)?> >
                                </div>

                            <div class="col s6 collapsible-body">
                                <?php echo $pet['name'];?>

                                <div class="col s12 offset-2">
                                    <input type="submit" name="submit" value="Next" class="waves-effect waves-light btn"/>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </form>
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

