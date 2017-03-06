    <footer class="page-footer" id="upper-footer">
        <div class="container">
            <div class="row">

                <!--column 1-->
                <div class="col s4">
                    <h5>Facebook</h5>
                    <h5>Instagram</h5>
                    <h5>Twitter</h5>
                </div>

                <!--column 2-->
                <div class="col s4">
                    <h5><a href="#">Subscribe</a></h5>
                    <ul>
                        <li><a href="<?php echo site_url('Pages/about') ?>">About us</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>

                <!--column 3-->
                <div class="col s4">
                    <h5><a href="#">Sitemap</a></h5>
                    <ul>
                        <li><a href="#">Donate now (siia tuleks mingi pilt ka)</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="container">
                © 2017 Veebirakendajad
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