<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.8/webfont.js"></script>
<script type="text/javascript">
WebFont.load({
google: {
families: [ 'Tangerine', 'Cantarell' ]
}
});
</script>
<script type="text/javascript">
<!--
function getGeoLocation(){
    if (navigator.geolocation && typeof navigator.geolocation.getCurrentPosition == 'function') {
        /*位置情報を取得可能な場合*/
        navigator.geolocation.getCurrentPosition(showMap, handleError);
    }
    else {
        /*位置情報を取得不可能な場合*/
        handleError();
    }
}

function showMap(position) {
    /*位置情報を表示する*/
    var coords = position.coords;
    
    // var form = document.createElement('form');
    // document.body.appendChild(form);
    // var input = document.createElement('input');
    // input.setAttribute('type', 'hidden');
    // input.setAttribute('name', 'lat');
    // input.setAttribute('value', coords.latitude);
    // form.appendChild(input);
    // var input2 = document.createElement('input');
    // input2.setAttribute('type', 'hidden');
    // input2.setAttribute('name', 'lng');
    // input2.setAttribute('value', coords.longitude);
    // form.appendChild(input2);
    // form.setAttribute('action', '/stations/latlon' );
    // form.setAttribute('method', 'post');
    // form.submit();
    
    $.ajax( {
        url: '/ajax/latlon',
        type: 'POST',
        dataType: 'HTML',
        data: {"lat":coords.latitude, "lng":coords.longitude},
        success: function(data) {
            $("#latlonval").html(data);
        }
     } );
}

function handleError(error) {
    /*取得失敗のアラートを表示する*/
    alert('位置情報を使用可能に設定して下さい。');
}
//-->
</script>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
        </div>
        <div id="content">

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
        </div>
        <div id="footer">
            <?php echo $this->Html->link(
                    $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
                    'http://www.cakephp.org/',
                    array('target' => '_blank', 'escape' => false)
                );
            ?>
        </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
