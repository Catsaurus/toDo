    <footer class="page-footer" id="upper-footer">
        <div class="container">
            <div class="row" >

                <!--column 1-->
                <div class="col s4">
                    <ul>
                        <li><a href="<?php echo site_url('Tasks/index') ?>"><?php echo lang('tasks') ?></a></li>
                        <li><a href="<?php echo site_url('Settings/index') ?>"><?php echo lang('settings') ?></a></li>
                        <li><a href="<?php echo site_url('Pets/index') ?>"><?php echo lang('pets') ?></a></li>
                    </ul>
                </div>

                <!--column 2-->
                <div class="col s4">
                    <ul>
                        <li><a href="<?php echo site_url('About/index') ?>"><?php echo lang('about') ?></a></li>
                        <li><a href="#"><?php echo lang('contact') ?></a></li>
                    </ul>
                </div>

                <!--column 3-->
                <div class="col s4">
                    <div class="row">
                                <?php
                                $link = base_url("/asset/img/ee.svg");
                                $link2 = base_url("/asset/img/gb.svg");
                                $link3 = site_url('LanguageSwitcher/switchLang/english');
                                $link4 = site_url('LanguageSwitcher/switchLang/estonian');
                                $uri = "?uri=".urlencode($_SERVER['REQUEST_URI']);


                                if ($this->session->userdata('site_lang') == "estonian"){
                                    echo "<a href='$link3'>";
                                    echo "<img src='$link2'>";
                                    echo "</a>";
                                    }
                                else {
                                    echo "<a href='$link4'>";
                                    echo "<img src='$link' >";
                                    echo "</a>";
                                }?>
                    </div>

                </div>

            </div>
        </div>

        <div class="footer-copyright">
            <div class="container">
                © 2017 Rajasalu, Raju, Randoja
            </div>
        </div>
    </footer>
    <!--Import jQuery before materialize.js-->

    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url("asset/javascript/materialize.js"); ?>"></script>
    <!-- custom skriptis on need js asjad, mis on seotud meie lehekülgedega-->
    <script type="text/javascript" src="<?php echo base_url("asset/javascript/custom.js"); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url("asset/javascript/NewTask.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("asset/javascript/Map.js"); ?>"></script>

    </body>
</html>