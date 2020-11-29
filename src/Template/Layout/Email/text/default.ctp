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

echo $this->fetch('content');
echo "\n\n\n";
echo "--\n\n";
echo "The Digital Humanities Course Registry: \n";
// because emails are being sent from commandline, Router::baseURL would be 'localhost'!
if(Configure::read('App.consoleBaseUrl')) echo Configure::read('App.consoleBaseUrl');
else echo Router::url('/', true);
?>
