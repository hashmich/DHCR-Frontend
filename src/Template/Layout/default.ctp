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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;
use Cake\Routing\Router;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <?= $this->Html->css('styles.css') ?>
        <?= $this->Html->css('/leaflet/leaflet.css') ?>
        
        
        <title>Digital Humanities Course Registry</title>
        <?= $this->Html->meta('icon') ?>
    </head>
    
    <body class="<?= $this->request->getParam('action') ?>">
        <div id="header">
            <div id="logo">
                <?= $this->Html->image('logo-500.png', ['url' => '/','width' => '300px']); ?>
            </div>
            <div id="menu">
                <?= $this->Html->link('Info', '/pages/info', ['class' => 'blue button', 'id' => 'info-button']) ?>
                <?= $this->Html->link('Login', Configure::read('ops.baseUrl').'users/login',
                    ['class' => 'button', 'id' => 'login-button']) ?>
            </div>
        </div>
        
        <div id="container">
            
            <?= $this->fetch('content') ?>
        
        </div>
        
        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
        <?= $this->Html->script('jquery-3.4.1.min.js') ?>
        
        <!-- https://github.com/js-cookie/js-cookie -->
        <!--<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>-->
        <?= $this->Html->script('cookie') ?>
        
        <!--<script src="<?= Router::url('/leaflet/leaflet.js', true) ?>" type="application/javascript"></script>-->
        <?= $this->Html->script('/leaflet/leaflet') ?>
        <!--<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>-->
        <?= $this->Html->script('/leaflet/leaflet.markercluster') ?>
        
        <?= $this->Html->script(['scroll','slide','map','filter','filter_helper','view','view_helper','app']) ?>
        
        <?= $this->element('script') ?>
    </body>
</html>
