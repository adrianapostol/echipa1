<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <link href='http://fonts.googleapis.com/css?family=Magra' rel='stylesheet' type='text/css'>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap/css/bootstrap.min') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    
    <?= $this->Html->css('site.css') ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->script('jQuery') ?>
</head>
<body>
    <header>
        <div class="header-title">
            <a href="<?php echo $this->Url->build('/groups', true); ?>"><?=  $this->Html->image('logo.jpg', array('alt' => 'lunch logo')); ?></a>
            <div class="header-helper">
                <span> Logged in as <?= $currentUser['username'] ?> </span>
                <span>|</span>
                <span>
                    <?php
                        echo $this->Html->link(
                            'Logout',
                            '/users/logout',
                            array('class' => '')
                        );
                     ?>
                </span>
            </div>            
        </div>
        <div class="header-title">
            <span style="color: black"><?= $this->fetch('title') ?></span>
        </div>

    </header>
    <div id="container">

        <div id="content">
            <?= $this->Flash->render() ?>
            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
            © Copyright Softvision  - Hackathon Iasi 2015
        </footer>
    </div>
</body>
</html>
