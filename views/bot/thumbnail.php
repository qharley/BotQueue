<div class="span<?=$size?> bot_thumbnail bot_thumbnail_<?=$size?>">
  <div class="bot_thumbnail_content">
    <div class="bot_thumbnail_stretcher"></div>
    <div class="real_bot_thumbnail_content">
    	<div class="bot_header">
    	  <h3>
    	    <?=$b->getLink()?>
    	    <span class="muted">- <?=$b->getLastSeenHTML()?>
    	    <? if ($j->isHydrated() && $j->get('status') == 'taken' && $size > 3): ?>
      		  - Runtime: <?=$j->getElapsedText()?>
          <? endif ?>
          </span>
    	  </h3>
      	<?=$b->getStatusHTML()?>
      	<div class="clearfix"></div>
    	</div>
  	
      <a href="<?=$b->getUrl()?>">
        <? if ($webcam->isHydrated()): ?>
          <img class="webcam" src="<?=$webcam->getRealUrl()?>">
        <? else: ?>
          <img class="webcam" src="/img/colorbars.gif">
        <? endif ?>
      </a>

    	<? if ($j->isHydrated()): ?>
        <div class="bot_info_container">
          <div class="bot_info">
        	  <div class="bot_info_title">
          	  <?=$j->getStatusHTML()?>
          		<?=$j->getLink()?>
          		<? if ($j->get('status') == 'taken'): ?>
            		<span class="muted pull-right">
            		  <? if ($size == 6): ?>
              		  <? $temps = JSON::decode($b->get('temperature_data')) ?>
                    <? if ($temps->extruder): ?>
              		      E: <?=$temps->extruder?>C /
              		  <? endif ?>
              		  <? if ($temps->bed): ?>
              		    B: <?=$temps->bed?>C /
              		  <? endif ?>
              		<? endif ?>
              		<? if ($size >= 4): ?>
              			ETA: <?=$j->getEstimatedText()?> /
                	<? endif ?>
              	  <?= round($j->get('progress'), 2) ?>%
            		</span>
          		<? elseif ($j->get('status') == 'qa'): ?>
            		<div class="manage-job pull-right">
                  <a class="btn btn-success btn-mini" href="<?=$j->getUrl()?>/qa/pass">PASS</a>
                  <a class="btn btn-primary btn-mini" href="<?=$j->getUrl()?>/qa">VIEW</a>
                  <a class="btn btn-danger btn-mini" href="<?=$j->getUrl()?>/qa/fail">FAIL</a>
                </div>
              <? elseif ($j->get('status') == 'slicing' && $sj->get('status') == 'pending'):?>
            		<div class="manage-job pull-right">
                  <a class="btn btn-success" href="<?=$sj->getUrl()?>/pass">PASS</a>
                  <a class="btn btn-primary" href="<?=$sj->getUrl()?>">VIEW</a>
                  <a class="btn btn-danger" href="<?=$sj->getUrl()?>/fail">FAIL</a>
                </div>
            	<? endif ?>
            	<div class="clearfix"></div>
            </div>
        		<? if ($j->get('status') == 'taken' || $j->get('status') == 'slicing'): ?>
              <div class="bot_info_meta">
          			<div class="progress progress-striped active pull-right" style="width: 100%">
          			  <div class="bar" style="width: <?=round($j->get('progress'))?>%;"></div>
          			</div>
              </div>
          	<? endif ?>
        	</div>
        </div>
      <? elseif ($b->get('status') == 'error'): ?>
        <div class="bot_info_container">
          <div class="bot_info">
        	  <span class="text-error">Error: <?=$b->get('error_text')?></span>
          </div>
        </div>
    	<? endif ?>
    </div>
  </div>
</div>