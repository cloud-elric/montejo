<?php
use yii\helpers\Url;
?>
<div data-value="<?=$model->id?>"
					class="item">
					<img src="<?=Url::base()?>/uploads/<?=$model->txt_url?>"
						alt="">
					<!-- <p><i class='ion ion-android-done'></i></p> -->
				</div>