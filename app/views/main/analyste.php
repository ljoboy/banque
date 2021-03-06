<?php load::view("template::head") ?>
<?php load::view("template::navbar") ?>
    <div class="inner_content">
        <div class="inner_content_w3_agile_info">
            <!-- /agile_top_w3_grids-->
            <div class="agile_top_w3_grids">
                <ul class="ca-menu">
                    <li>
                        <a href="<?= site::site_url("analyst/list_clients") ?>">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <div class="ca-content">
                                <h4 class="ca-main two"><?= $nbClient ?></h4>
                                <h3 class="ca-sub two">Liste des clients</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site::site_url("analyst/list_demandes") ?>">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <div class="ca-content">
                                <h4 class="ca-main four"><?= $nbDemande ?></h4>
                                <h3 class="ca-sub four">Liste des demandes</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site::site_url("analyst/list_comptes") ?>">
                            <i class="fa fa-list-ol" aria-hidden="true"></i>
                            <div class="ca-content">
                                <h4 class="ca-main three"><?= $nbCompte ?></h4>
                                <h3 class="ca-sub three">Liste des comptes</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site::site_url("analyst/list_credits") ?>">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <div class="ca-content">
                                <h4 class="ca-main four"><?= $nbCredit ?></h4>
                                <h3 class="ca-sub four">Liste des cr&eacute;dits</h3>
                            </div>
                        </a>
                    </li>
                    <div class="clearfix"></div>
                </ul>
            </div>
        </div>
    </div>
<?php load::view("template::foot") ?>