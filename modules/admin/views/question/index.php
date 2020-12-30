<?php
/**
 * @var $questionsTemplates \app\models\templates\QuestionsTemplates
 * @var $question \app\models\templates\QuestionsTemplates
 */

use yii\helpers\Url;

$this->title = 'Шаблоны анкет и техзаданий';
?>

<div class="mainContent">
    <div class="myContainer">
        <div class="top">
            <h2>Шаблоны техзадания</h2>
        </div>

        <section class="adminPanel">
            <div class="myContainer">
                <div class="wrap">
                    <div class="itemBlock decor">
                        <div class="svg-icon">
                            <svg width="77" height="74" viewBox="0 0 77 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d)">
                                    <rect x="9.09677" y="6.10547" width="55.8026" height="58.3091" rx="2" fill="#01618A" stroke="black" stroke-width="2"/>
                                    <path d="M9.09677 8.10547C9.09677 7.0009 9.9922 6.10547 11.0968 6.10547H62.8993C64.0039 6.10547 64.8993 7.0009 64.8993 8.10547V15.1554H9.09677V8.10547Z" fill="#CAC8C9" stroke="black" stroke-width="2"/>
                                    <rect x="2.37994" y="1.52515" width="55.8026" height="58.3091" rx="2" fill="#0072BA" stroke="black" stroke-width="2"/>
                                    <path d="M2.37994 3.52515C2.37994 2.42058 3.27538 1.52515 4.37994 1.52515H56.1825C57.2871 1.52515 58.1825 2.42058 58.1825 3.52515V10.5751H2.37994V3.52515Z" fill="#E6E6E6" stroke="black" stroke-width="2"/>
                                    <rect x="5.85123" y="5.14819" width="2.24554" height="2.20841" fill="black"/>
                                    <rect x="10.3045" y="5.14819" width="2.24554" height="2.20841" fill="black"/>
                                    <rect x="14.7578" y="5.14819" width="2.24554" height="2.20841" fill="black"/>
                                    <rect x="7.02951" y="17.384" width="17.8092" height="13.357" fill="#C4C4C4" stroke="black" stroke-width="2"/>
                                    <rect x="7.02951" y="39.9033" width="17.8092" height="13.357" fill="#C4C4C4" stroke="black" stroke-width="2"/>
                                    <path d="M28.4197 19.6104H32.3558" stroke="black" stroke-width="2"/>
                                    <path d="M28.4197 42.0051H34.7598" stroke="black" stroke-width="2"/>
                                    <path d="M28.4197 46.5818H31.5898" stroke="black" stroke-width="2"/>
                                    <path d="M28.4197 50.9456H30.4755" stroke="black" stroke-width="2"/>
                                    <path d="M28.1112 24.0625H48.1614" stroke="black" stroke-width="2"/>
                                    <path d="M28.1112 28.5591H43.797" stroke="black" stroke-width="2"/>
                                    <path d="M6.02951 35.2598H40.309" stroke="black" stroke-width="2"/>
                                    <path d="M56.7182 13.0501L58.7579 10.8123C60.2461 9.17958 62.776 9.06243 64.4087 10.5506L65.2511 11.3184C66.8838 12.8066 67.001 15.3365 65.5128 16.9692L63.4731 19.207L56.7182 13.0501Z" fill="#CC1A8C" stroke="black" stroke-width="2"/>
                                    <path d="M53.954 16.126L56.7517 13.0567L63.5065 19.2136L60.7089 22.283L53.954 16.126Z" fill="#FF8642" stroke="black" stroke-width="2"/>
                                    <path d="M39.424 44.5585L32.2653 46.891L33.7729 39.4023L39.424 44.5585Z" fill="#FF8642" stroke="black" stroke-width="2"/>
                                    <path d="M41.3706 44.9734L33.142 37.4795L30.974 48.3822L41.3706 44.9734Z" fill="black"/>
                                    <path d="M40.2375 43.5385L34.8679 38.7634L33.2693 45.9618L40.2375 43.5385Z" fill="#FFC666"/>
                                    <path d="M34.542 37.4229L56.7516 13.0564L63.5065 19.2134L41.2968 43.5799L34.542 37.4229Z" fill="#B90000" stroke="black" stroke-width="2"/>
                                    <path d="M37.9266 40.5081L60.1363 16.1415L63.5066 19.2135L41.2969 43.58L37.9266 40.5081Z" fill="#B90000" stroke="black" stroke-width="2"/>
                                </g>
                                <defs>
                                    <filter id="filter0_d" x="0.379944" y="0.525146" width="76.2401" height="72.8894" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dx="3" dy="4"/>
                                        <feGaussianBlur stdDeviation="2"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                                    </filter>
                                </defs>
                            </svg>

                        </div>
                        <h4>Анкеты</h4>
                        <div class="wrap">
                            <div class="chapter1 chapter">
                                <?php foreach($questionsTemplates as $question):?>
                                <p><a href="<?=Url::to(['questions-view', 'id' => $question->id])?>" class="a-link"><?=$question->title?></a></p>
                                <?php endforeach;?>

                            </div>
                            <div class="chapter2 chapter">
                                <div class="button-admin">
                                    <a class="a-link" href="<?=Url::to(['/admin/question/create-question-type'])?>">Добавить новый тип</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="itemBlock decor">
                        <div class="svg-icon">
                            <svg width="77" height="74" viewBox="0 0 77 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d)">
                                    <rect x="9.09677" y="6.10547" width="55.8026" height="58.3091" rx="2" fill="#01618A" stroke="black" stroke-width="2"/>
                                    <path d="M9.09677 8.10547C9.09677 7.0009 9.9922 6.10547 11.0968 6.10547H62.8993C64.0039 6.10547 64.8993 7.0009 64.8993 8.10547V15.1554H9.09677V8.10547Z" fill="#CAC8C9" stroke="black" stroke-width="2"/>
                                    <rect x="2.37994" y="1.52515" width="55.8026" height="58.3091" rx="2" fill="#0072BA" stroke="black" stroke-width="2"/>
                                    <path d="M2.37994 3.52515C2.37994 2.42058 3.27538 1.52515 4.37994 1.52515H56.1825C57.2871 1.52515 58.1825 2.42058 58.1825 3.52515V10.5751H2.37994V3.52515Z" fill="#E6E6E6" stroke="black" stroke-width="2"/>
                                    <rect x="5.85123" y="5.14819" width="2.24554" height="2.20841" fill="black"/>
                                    <rect x="10.3045" y="5.14819" width="2.24554" height="2.20841" fill="black"/>
                                    <rect x="14.7578" y="5.14819" width="2.24554" height="2.20841" fill="black"/>
                                    <rect x="7.02951" y="17.384" width="17.8092" height="13.357" fill="#C4C4C4" stroke="black" stroke-width="2"/>
                                    <rect x="7.02951" y="39.9033" width="17.8092" height="13.357" fill="#C4C4C4" stroke="black" stroke-width="2"/>
                                    <path d="M28.4197 19.6104H32.3558" stroke="black" stroke-width="2"/>
                                    <path d="M28.4197 42.0051H34.7598" stroke="black" stroke-width="2"/>
                                    <path d="M28.4197 46.5818H31.5898" stroke="black" stroke-width="2"/>
                                    <path d="M28.4197 50.9456H30.4755" stroke="black" stroke-width="2"/>
                                    <path d="M28.1112 24.0625H48.1614" stroke="black" stroke-width="2"/>
                                    <path d="M28.1112 28.5591H43.797" stroke="black" stroke-width="2"/>
                                    <path d="M6.02951 35.2598H40.309" stroke="black" stroke-width="2"/>
                                    <path d="M56.7182 13.0501L58.7579 10.8123C60.2461 9.17958 62.776 9.06243 64.4087 10.5506L65.2511 11.3184C66.8838 12.8066 67.001 15.3365 65.5128 16.9692L63.4731 19.207L56.7182 13.0501Z" fill="#CC1A8C" stroke="black" stroke-width="2"/>
                                    <path d="M53.954 16.126L56.7517 13.0567L63.5065 19.2136L60.7089 22.283L53.954 16.126Z" fill="#FF8642" stroke="black" stroke-width="2"/>
                                    <path d="M39.424 44.5585L32.2653 46.891L33.7729 39.4023L39.424 44.5585Z" fill="#FF8642" stroke="black" stroke-width="2"/>
                                    <path d="M41.3706 44.9734L33.142 37.4795L30.974 48.3822L41.3706 44.9734Z" fill="black"/>
                                    <path d="M40.2375 43.5385L34.8679 38.7634L33.2693 45.9618L40.2375 43.5385Z" fill="#FFC666"/>
                                    <path d="M34.542 37.4229L56.7516 13.0564L63.5065 19.2134L41.2968 43.5799L34.542 37.4229Z" fill="#B90000" stroke="black" stroke-width="2"/>
                                    <path d="M37.9266 40.5081L60.1363 16.1415L63.5066 19.2135L41.2969 43.58L37.9266 40.5081Z" fill="#B90000" stroke="black" stroke-width="2"/>
                                </g>
                                <defs>
                                    <filter id="filter0_d" x="0.379944" y="0.525146" width="76.2401" height="72.8894" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                        <feOffset dx="3" dy="4"/>
                                        <feGaussianBlur stdDeviation="2"/>
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                                    </filter>
                                </defs>
                            </svg>

                        </div>
                        <h4>Характеристики</h4>
                        <div class="wrap">
                            <div class="chapter1 chapter">
                                <p><a href="#" class="a-link">Для квартир</a></p>
                                <p><a href="#" class="a-link">Для домов</a></p>
                                <p><a href="#" class="a-link">для офисов</a></p>
                                <p><a href="#" class="a-link">Для магазинов</a></p>
                            </div>
                            <div class="chapter2 chapter">
                                <div class="button-admin">
                                    <a class="a-link" href="<?=Url::to(['/admin/question/create-characteristic-type'])?>">Добавить новый тип</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </section>


    </div>
</div>
