<html>
   <head>
      <title><?php echo e($game->title); ?></title>
      <meta charset="utf-8">
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
      <link href='/games/Basketball/css/fonts.css' rel='stylesheet' type='text/css'>
      <script src="/games/Basketball/js/lib/createjs-2015.11.26.min.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/classes/GameButton.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/classes/GameBack.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/classes/GameUI.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/classes/GameView.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/classes/GameReels.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/classes/GameLines.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/classes/GameCounters.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/classes/GameRules.js" type="text/javascript"></script>
	
	<?php if($slot->slotGamble): ?>
      <script src="/games/Basketball/js/classes/GameGamble.js" type="text/javascript"></script>
	<?php endif; ?>
	
	<?php if($slot->slotBonus): ?>
      <script src="/games/Basketball/js/classes/GameBonus.js" type="text/javascript"></script>
	<?php endif; ?>
      <script src="/games/Basketball/js/classes/GameMessages.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/utils.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/loader.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/core.js" type="text/javascript"></script>
      <script src="/games/Basketball/js/classes/Sounds.js" type="text/javascript"></script>
	<script>

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }
	
	</script>
         <style>
         body,
         html {
         position: fixed;
         } 
      </style>
   </head>
   <body onload="InitializeGame()" style="margin:0px;background-color:black">
      <canvas id="game" width="750" height="630" cstyle="position: absolute;"></canvas>
   </body>
</html><?php /**PATH /var/www/fastuser/data/www/demo60.2games.pw/resources/views/frontend/games/list/Basketball.blade.php ENDPATH**/ ?>