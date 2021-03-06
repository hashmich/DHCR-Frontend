<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Router;

$this->layout = false;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->Element('meta') ?>

        <?= $this->Html->css('static_page.css') ?>
        <?= $this->Html->meta('icon') ?>
    </head>
    <body class="info">
        <div class="wrapper">
            <?= $this->Html->link('Back to Start', '/', ['class' => 'blue back button']); ?>
            <div id="page-head">
                <h1>
                    Digital Humanities Course Registry
                    <?= $this->Html->image('logo-500.png', [
                        'alt' => 'logo',
                        'width' => 500,
                        'height' => 114,
                        'url' => '/']) ?>
                </h1>

                <?= $this->Html->image('CLARIN-DARIAH-joint-logo-big.png', [
                    'alt' => 'CLARIN-DARIAH joint logo',
                    'width' => 256,
                    'height' => 200,
                    'class' => 'joint-logo']) ?>

                <div class="title intent">
                    <p>
                        The Digital Humanities Course Registry is a curated platform that provides
                        an overview of the growing range of teaching activities in the field
                        of digital humanities worldwide.
                    </p>
                    <p>
                        The platform is a joint effort of two European research infrastructures: <br />
                        <?= $this->Html->link('CLARIN-ERIC', 'https://www.clarin.eu/', ['target' => '_blank']); ?> and
                        <?= $this->Html->link('DARIAH-EU', 'https://www.dariah.eu/', ['target' => '_blank']); ?>.
                    </p>
                </div>
            </div>



            <div id="accordeon">
                <div class="accordeon-item" id="how-to-use">
                    <h2><span>How to Use</span></h2>
                    <div class="item-content">
                        <?= $this->Element('info/how_to_use') ?>
                    </div>
                </div>

                <div class="accordeon-item" id="contact">
                    <h2><span>Contact Us</span></h2>
                    <div class="item-content">
                        <?= $this->Element('info/contact'); ?>
                    </div>
                </div>

                <div class="accordeon-item" id="publications">
                    <h2><span>Publications and Dissemination</span></h2>
                    <div class="item-content">
                        <?= $this->Element('info/publications') ?>
                    </div>
                </div>

                <div class="accordeon-item" id="data">
                    <h2><span>Data Export and API</span></h2>
                    <div class="item-content">
                        <?= $this->Element('info/data-api') ?>
                    </div>
                </div>

                <div class="accordeon-item" id="clarin-dariah">
                    <h2><span>CLARIN and DARIAH</span></h2>
                    <div class="item-content">
                        <?= $this->Element('info/clarin-dariah') ?>
                    </div>
                </div>

                <div class="accordeon-item" id="credits">
                    <h2><span>Credits</span></h2>
                    <div class="item-content">
                        <?= $this->Element('info/credits'); ?>
                    </div>
                </div>

                <div class="accordeon-item" id="imprint">
                    <h2><span>Imprint</span></h2>
                    <div class="item-content" id="imprint-content"></div>
                </div>

            </div>

            <div id="footer" class="footer">
                <p class="imprint"><?= $this->Html->link('Imprint',
                        '/pages/info/#imprint') ?></p>
                <p class="license"><?= $this->Html->link('CC-BY 4.0',
                        'https://creativecommons.org/licenses/by/4.0/',
                        ['target' => '_blank']) ?></p>
                <p class="copyright">&copy;2014-<?= date('Y') ?></p>
            </div>
        </div>


        <?= $this->Flash->render('flash') ?>


        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
        <?= $this->Html->script('jquery-3.4.1.min.js') ?>
        <?= $this->Html->script(['accordeon','hash']) ?>

        <script type="application/javascript">
            $(document).ready( function() {
                let accordeon = new Accordeon('accordeon');
                $('#imprint-content').load('https://shared.acdh.oeaw.ac.at/acdh-common-assets/api/imprint.php?serviceID=7435');
                $('#footer .imprint').on('click', function(e) {
                    e.preventDefault();
                    accordeon.openHash('imprint');
                });
                if($('.flash-message').length) {
                    $('.flash-message').slideDown('fast').delay(8000).fadeOut('slow');
                }
            });

            function recaptchaCallback(token) {
                $(".captcha-form").first().submit();
            }
        </script>

        <script src="https://www.google.com/recaptcha/api.js" type="application/javascript"/>
        <?= $this->element('matomo') ?>

    </body>
</html>
