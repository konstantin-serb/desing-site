<?php
/**
 * @var $questions \app\models\Question
 */

?>

<div class="wrap">
    <?php foreach($questions as $question):?>
        <?php $model->answer = $question->answer?>
        <div id="oneItem-<?=$question->id?>" class="oneItem <?php
        if($question->answer) {
            echo 'green-fill';
        }
        ?>">
            <?php $form = \yii\widgets\ActiveForm::begin()?>
            <p class="question"><b><?=$question->question?></b></p>
            <?php if ($question->description): ?>
                <span class="description qustionsDescription"><?= '(' . $question->description . ')' ?></span>
            <?php endif; ?>

            <?=$form->field($model, 'answer', [
                'inputOptions' => [
                    'id' => 'uniqueID-'.$question->id,
                    'class' => 'form-input',
                ],
            ])->textarea(['rows' => 3])->label(false)?>
            <?php \yii\widgets\ActiveForm::end()?>
            <div class="link">
                <a id="addAnswer-<?=$question->id?>" data-id="<?=$question->id?>" class="answer a-link cancel"><?php
                    if($question->answer) {
                        echo 'Изменить ответ';
                    } else { echo 'Добавить ответ';}
                    ?></a><div class="check-svg"><span id="checkAnswer-<?=$question->id?>"><?php
                    if($question->answer) {
                        echo ' <svg width="110" height="98" viewBox="0 0 110 98" fill="none" xmlns="http://www.w3.org/2000/svg">
<ellipse cx="51.8953" cy="82.8181" rx="51.5336" ry="6.47059" transform="rotate(-9.48803 51.8953 82.8181)" fill="url(#paint0_radial)"/>
<path d="M40.6723 45.2941C30.5042 39.5168 23.5714 46.6807 20.5672 50.3782L26.8067 53.3824L40.6723 45.2941Z" fill="url(#paint1_linear)"/>
<path d="M37.8992 44.8319C33.2773 45.2017 28.4244 50.3782 26.5756 52.9202C28.9636 53.8445 34.5714 57.3109 37.8992 63.7815C41.2269 70.2521 45.2941 80.6513 46.9118 85.042C49.6849 82.2689 56.0784 77.2619 58.9286 75.105C74.2731 41.0882 99.8319 10.8613 110 3.0042L107.689 0C84.5798 14.0504 61.0854 47.2969 52.2269 62.1639L47.3739 52.458C46.1414 49.7619 42.521 44.4622 37.8992 44.8319Z" fill="url(#paint2_linear)"/>
<path d="M107.689 0C84.5798 14.0504 61.0854 47.2969 52.2269 62.1639L48.0672 53.8445C48.6219 52.1807 56.4636 41.1345 60.3151 35.8193C70.6681 22.5084 88.2773 6.2395 97.2899 0.92437L107.689 0Z" fill="url(#paint3_radial)"/>
<path d="M37.8991 63.7815C41.2269 70.2521 45.2941 80.6513 46.9118 85.042C46.6807 85.2731 46.4496 85.1961 46.2185 85.042L39.8103 81.1513C39.8084 81.187 39.7854 81.1698 39.7479 81.1135L39.8103 81.1513C39.8239 80.8944 38.7472 77.8936 34.2017 67.0168C29.0252 54.6303 23.5714 52.6891 20.7983 50.6093L26.5756 52.9202C28.9636 53.8445 34.5714 57.3109 37.8991 63.7815Z" fill="url(#paint4_linear)"/>
<defs>
<radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(51.8953 82.8181) rotate(92.7263) scale(4.85844 38.694)">
<stop stop-color="#D7D7D7"/>
<stop offset="1" stop-color="#C4C4C4" stop-opacity="0"/>
</radialGradient>
<linearGradient id="paint1_linear" x1="39.7479" y1="40.6723" x2="24.0336" y2="51.5336" gradientUnits="userSpaceOnUse">
<stop stop-color="#1BD10D"/>
<stop offset="1" stop-color="#0EA605"/>
</linearGradient>
<linearGradient id="paint2_linear" x1="68.2878" y1="0" x2="68.2878" y2="85.042" gradientUnits="userSpaceOnUse">
<stop stop-color="#1CB213"/>
<stop offset="1" stop-color="#1BAA12"/>
</linearGradient>
<radialGradient id="paint3_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(49.2227 58.9286) rotate(-49.887) scale(44.1169 43.2777)">
<stop stop-color="#0A5506"/>
<stop offset="1" stop-color="#1CF10D"/>
</radialGradient>
<linearGradient id="paint4_linear" x1="24.2647" y1="50.3782" x2="46.6807" y2="85.042" gradientUnits="userSpaceOnUse">
<stop stop-color="#87F37D"/>
<stop offset="1" stop-color="#2BD81E"/>
</linearGradient>
</defs>
</svg>
';
                    }
                        ?></span>
                </div>
                &nbsp;<span class="time" id="date-time-<?= $question->id ?>">
                    <?=$question->getDateTime()?>
                    </span>
            </div>
        </div>
    <?php endforeach;?>
</div>
