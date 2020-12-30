<?php
/**
 * @var $countQuestions
 */

$this->title = 'Шаблоны';

use yii\helpers\Url; ?>

<div class="mainContent">
    <h2>Шаблоны</h2>

    <section class="adminPanel">
        <div class="myContainer">

            <div class="wrap">
                <div class="itemBlock work">
                    <div class="svg-icon">
                        <svg width="71" height="72" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d)">
                                <path d="M62.9353 8.7632V53.6823H18.6406V1.48364H55.6405L62.9353 8.7632Z" fill="#45BBEA"
                                      stroke="black" stroke-width="2"/>
                                <path d="M23.5282 13.7217V40.4874H31.2709V13.7217H23.5282Z" fill="#B90000"
                                      stroke="black" stroke-width="2"/>
                                <path d="M27.1675 4.23535L22.5228 12.736H32.2722L27.1675 4.23535Z" fill="black"/>
                                <path d="M27.2551 8.33203L24.8013 12.7357H29.8403L27.2551 8.33203Z" fill="#E8D3B1"/>
                                <path d="M62.9353 53.6098H52.529V17.3538L62.9353 53.6098ZM62.9353 53.6098V24.1735V21.9211L62.9353 17.3538M62.9353 53.6098L62.9353 17.3538M62.9353 17.3538V17.3325V17.3538Z"
                                      fill="#B90000" stroke="black" stroke-width="2"/>
                                <path d="M44.4563 27.26L46.0017 32.4994L44.0322 52.5293H40.2432L37.522 32.518L39.489 27.26H44.4563ZM44.6481 25.26H39.3346L36.7537 21.3357L37.1679 20.662C37.6071 19.9479 38.2046 18.977 38.8636 17.9062C39.856 16.2938 40.988 14.455 41.9302 12.9247L47.0788 21.3498L44.6481 25.26Z"
                                      fill="#B90000" stroke="black" stroke-width="2"/>
                                <path d="M40.9239 21.3315V16.4526L37.9189 21.3315L40.5242 25.2659H43.4695L45.9149 21.3323L42.9159 16.4526V21.3315H40.9239Z"
                                      fill="#C4C4C4"/>
                                <path d="M31.8123 53.7336H34.2124L32.5224 52.0294L12.1414 31.478L10.4314 29.7536V32.1821V52.7336V53.7336H11.4314H31.8123ZM2.20322 10.1664C2.44091 10.4006 2.70173 10.6578 2.98452 10.9371C4.49443 12.428 6.62729 14.5411 9.20319 17.097C10.2057 18.0917 11.2753 19.1535 12.4013 20.2717C13.3788 21.2424 14.3988 22.2556 15.4544 23.3044C16.4801 24.3235 17.5393 25.3761 18.6258 26.4561C19.6539 27.478 20.7065 28.5244 21.7779 29.5898C25.8428 33.6314 30.1803 37.9465 34.4953 42.2404L37.577 45.3073L40.7711 48.4866L43.8773 51.5788L47.0772 54.7647C49.7724 57.4482 52.3215 59.9867 54.6324 62.2885H2.20322V10.1664Z"
                                      fill="#F5A947" stroke="black" stroke-width="2"/>
                            </g>
                            <defs>
                                <filter id="filter0_d" x="0.203217" y="0.483643" width="70.7321" height="70.8048"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                                   values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                    <feOffset dx="3" dy="4"/>
                                    <feGaussianBlur stdDeviation="2"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                                </filter>
                            </defs>
                        </svg>

                    </div>
                    <h4>Все шаблоны</h4>
                    <div class="wrap">
                        <div class="chapter1 chapter">
                            <p><a href="<?=Url::to(['/admin/template/contracts-index'])?>" class="a-link">Шаблоны договоров: <span class=""><?=$countContracts?></span></a></p>
                            <p><a href="<?=Url::to(['/admin/question/question-index'])?>" class="a-link">Шаблоны анкет: <span class=""><?=$countQuestions?></span></a></p>
                            <p><a href="<?=Url::to(['/admin/question/characteristic-index'])?>" class="a-link">Характеристики: <span class=""><?=$countCharacteristic?></span></a></p>
                            <p><a href="" class="a-link">Шаблоны стадий: <span class="">0</span></a></p>
                        </div>

                    </div>
                </div>

            </div>
            <hr>
        </div>
    </section>
</div>
