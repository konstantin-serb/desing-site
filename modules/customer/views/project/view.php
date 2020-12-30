<?php
/**
 * @var $project \app\models\Project
 * @var $assignment
 */

use yii\helpers\Url;

$this->title = 'Проект: ID ' . $project->project_id;
?>

<div class="mainContent userPage">

    <section class="top">
        <div class="myContainer">
            <div class="topFrame frame">
                <h2 class="inFrame">Проект: ID <?=$project->project_id?></h2>
            </div>
            <h5><?=$project->nameProject?></h5>
        </div>
    </section>
    <?php if ($project->project_status == \app\models\Project::STATUS_FULL):?>
    <section class="topInfo">
        <div class="myContainer">
            <div class="frame">
                <div class="stringBlock">
                    <div class="stringWrap">
                        <div class="stringBold">Заказчик:</div>
                        <div class="stringRegular"><?=$project->getClientSurname()?></div>
                    </div>
                    <div class="stringWrap">
                        <div class="stringBold">Дата начала проекта:</div>
                        <div class="stringRegular"><?=$project->getDate($project->date_start)?></div>
                    </div>
                    <div class="stringWrap">
                        <div class="stringBold">На разработку проектка выделено:</div>
                        <div class="stringRegular"><?=$project->length?> рабочих дней</div>
                    </div>
                    <div class="stringWrap">
                        <div class="stringBold">Площадь дизайна:</div>
                        <div class="stringRegular"><?=$project->area?> кв. м.</div>
                    </div>
                </div>
                <div class="stringBlock">
                    <div class="stringWrap">
                        <div class="stringBold">Стоимость проекта:</div>
                        <div class="stringRegular"><?=$project->price_digital?> <?=$project->valut->currency?></div>
                    </div>
                    <div class="stringWrap">
                        <div class="stringBold">Прописью:</div>
                        <div class="stringRegular"><?=$project->price_words?></div>
                    </div>
                    <div class="stringWrap">
                        <div class="stringBold">Распределение взносов:</div>
                        <div class="stringRegular">20%, 20%, 20%, 20%, 20%</div>
                    </div>
                </div>
                <div class="stringBlock buttonBlock">
                    <div class="stringWrap">
                        <div class="leftButton"><a href="#" class="a-link">Утвердить</a></div>
                        <div class="rightButton"><a href="#" class="a-link">Написать замечания</a></div>
                    </div>
                </div>
            </div>
            <div class="projectPhoto">
                <img src="<?=$project->getImage()?>" title="project photo" alt="project photo">
            </div>
            <div class="graphicBlock">
                <div class="graphic">
                    <div class="startDate">
                        18.01
                    </div>
                    <div class="endDate">
                        18.08
                    </div>
                    <div class="done" style="width: 70%;">
                        <div class="textBlock">
                            <div class="now">
                                20.04
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <section class="stages">
        <div class="myContainer">
            <h2>Предлагаемые стадии проекта</h2>
            <div class="wrap">
                <div class="stagesItem stageDone">
                    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
                    </svg>
                    <div class="top">
                        <h3>1</h3>
                        <h4>Обмеры квартиры</h4>
                    </div>
                    <div class="bottom">
                        <div class="stringBlock">
                            <div class="stringWrap">
                                <div class="stringRegular">Исполнитель:</div>
                                <div class="stringRegular">Иванов И.И.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Начало:</div>
                                <div class="stringRegular">12.01.2020 г.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Окончание:</div>
                                <div class="stringRegular">12.05.2020 г.</div>
                            </div>
                        </div>
                        <p class="doneDay">
                            Всего дней: 1
                        </p>
                    </div>
                </div>
                <div class="stagesItem stageDone">
                    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
                    </svg>
                    <div class="top">
                        <h3>2</h3>
                        <h4>Вычерчивание планов квартиры и анализ ситуации</h4>
                    </div>
                    <div class="bottom">
                        <div class="stringBlock">
                            <div class="stringWrap">
                                <div class="stringRegular">Исполнитель:</div>
                                <div class="stringRegular">Иванов И.И.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Начало:</div>
                                <div class="stringRegular">12.01.2020 г.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Окончание:</div>
                                <div class="stringRegular">12.05.2020 г.</div>
                            </div>
                        </div>
                        <p class="doneDay">
                            Всего дней: 2
                        </p>
                    </div>
                </div>
                <div class="stagesItem stageInWork">
                    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
                    </svg>
                    <div class="top">
                        <h3>3</h3>
                        <h4>Эскизные предложения по планировке и расстановке мебели в помещениях</h4>
                    </div>
                    <div class="bottom">
                        <div class="stringBlock">
                            <div class="stringWrap">
                                <div class="stringRegular">Исполнитель:</div>
                                <div class="stringRegular">Иванов И.И.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Начало:</div>
                                <div class="stringRegular">12.01.2020 г.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Окончание:</div>
                                <div class="stringRegular">12.05.2020 г.</div>
                            </div>
                        </div>
                        <p class="doneDay">
                            Всего дней: 1
                        </p>
                    </div>
                </div>
                <div class="stagesItem stageWait">
                    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
                    </svg>
                    <div class="top">
                        <h3>4</h3>
                        <h4>Вычерчивание планов розеток и потолков</h4>
                    </div>
                    <div class="bottom">
                        <div class="stringBlock">
                            <div class="stringWrap">
                                <div class="stringRegular">Исполнитель:</div>
                                <div class="stringRegular">Иванов И.И.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Начало:</div>
                                <div class="stringRegular">12.01.2020 г.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Окончание:</div>
                                <div class="stringRegular">12.05.2020 г.</div>
                            </div>
                        </div>
                        <p class="doneDay">
                            Статус : в очереди
                        </p>
                    </div>
                </div>
                <div class="stagesItem stageDone">
                    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
                    </svg>
                    <div class="top">
                        <h3>1</h3>
                        <h4>Обмеры квартиры</h4>
                    </div>
                    <div class="bottom">
                        <div class="stringBlock">
                            <div class="stringWrap">
                                <div class="stringRegular">Исполнитель:</div>
                                <div class="stringRegular">Иванов И.И.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Начало:</div>
                                <div class="stringRegular">12.01.2020 г.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Окончание:</div>
                                <div class="stringRegular">12.05.2020 г.</div>
                            </div>
                        </div>
                        <p class="doneDay">
                            Всего дней: 1
                        </p>
                    </div>
                </div>
                <div class="stagesItem stageWait">
                    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
                    </svg>
                    <div class="top">
                        <h3>1</h3>
                        <h4>Обмеры квартиры</h4>
                    </div>
                    <div class="bottom">
                        <div class="stringBlock">
                            <div class="stringWrap">
                                <div class="stringRegular">Исполнитель:</div>
                                <div class="stringRegular">Иванов И.И.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Начало:</div>
                                <div class="stringRegular">12.01.2020 г.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Окончание:</div>
                                <div class="stringRegular">12.05.2020 г.</div>
                            </div>
                        </div>
                        <p class="doneDay">
                            Всего дней: 1
                        </p>
                    </div>
                </div>
                <div class="stagesItem stageDone">
                    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
                    </svg>
                    <div class="top">
                        <h3>1</h3>
                        <h4>Обмеры квартиры</h4>
                    </div>
                    <div class="bottom">
                        <div class="stringBlock">
                            <div class="stringWrap">
                                <div class="stringRegular">Исполнитель:</div>
                                <div class="stringRegular">Иванов И.И.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Начало:</div>
                                <div class="stringRegular">12.01.2020 г.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Окончание:</div>
                                <div class="stringRegular">12.05.2020 г.</div>
                            </div>
                        </div>
                        <p class="doneDay">
                            Всего дней: 1
                        </p>
                    </div>
                </div>
                <div class="stagesItem stageDone">
                    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
                    </svg>
                    <div class="top">
                        <h3>1</h3>
                        <h4>Обмеры квартиры</h4>
                    </div>
                    <div class="bottom">
                        <div class="stringBlock">
                            <div class="stringWrap">
                                <div class="stringRegular">Исполнитель:</div>
                                <div class="stringRegular">Иванов И.И.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Начало:</div>
                                <div class="stringRegular">12.01.2020 г.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Окончание:</div>
                                <div class="stringRegular">12.05.2020 г.</div>
                            </div>
                        </div>
                        <p class="doneDay">
                            Всего дней: 1
                        </p>
                    </div>
                </div>
                <div class="stagesItem stageWait">
                    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
                    </svg>
                    <div class="top">
                        <h3>1</h3>
                        <h4>Обмеры квартиры</h4>
                    </div>
                    <div class="bottom">
                        <div class="stringBlock">
                            <div class="stringWrap">
                                <div class="stringRegular">Исполнитель:</div>
                                <div class="stringRegular">Иванов И.И.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Начало:</div>
                                <div class="stringRegular">12.01.2020 г.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Окончание:</div>
                                <div class="stringRegular">12.05.2020 г.</div>
                            </div>
                        </div>
                        <p class="doneDay">
                            Всего дней: 1
                        </p>
                    </div>
                </div>
                <div class="stagesItem stageWait">
                    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
                    </svg>
                    <div class="top">
                        <h3>1</h3>
                        <h4>Обмеры квартиры</h4>
                    </div>
                    <div class="bottom">
                        <div class="stringBlock">
                            <div class="stringWrap">
                                <div class="stringRegular">Исполнитель:</div>
                                <div class="stringRegular">Иванов И.И.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Начало:</div>
                                <div class="stringRegular">12.01.2020 г.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Окончание:</div>
                                <div class="stringRegular">12.05.2020 г.</div>
                            </div>
                        </div>
                        <p class="doneDay">
                            Всего дней: 1
                        </p>
                    </div>
                </div>
                <div class="stagesItem stageDone">
                    <svg width="60" height="60" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M41.6232 0.923828H0.350342V42.8424L41.6232 0.923828Z" fill="#34E830"/>
                    </svg>
                    <div class="top">
                        <h3>1</h3>
                        <h4>Обмеры квартиры</h4>
                    </div>
                    <div class="bottom">
                        <div class="stringBlock">
                            <div class="stringWrap">
                                <div class="stringRegular">Исполнитель:</div>
                                <div class="stringRegular">Иванов И.И.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Начало:</div>
                                <div class="stringRegular">12.01.2020 г.</div>
                            </div>
                            <div class="stringWrap">
                                <div class="stringRegular">Окончание:</div>
                                <div class="stringRegular">12.05.2020 г.</div>
                            </div>
                        </div>
                        <p class="doneDay">
                            Всего дней: 1
                        </p>
                    </div>
                </div>

            </div>
            <div class="stringBlock buttonBlock">
                <div class="stringWrap">
                    <div class="leftButton"><a href="#" class="a-link">Утвердить все</a></div>
                    <div class="rightButton"><a href="#" class="a-link">Написать замечания</a></div>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <?php endif;?>
    <section class="doc">
        <div class="myContainer">
            <h2>Техническое задание на проектирование</h2>



            <div class="button">
                <?php if(!$assignment):?>
                <a href="<?=Url::to(['/customer/assignment/create', 'id' => $project->id])?>" class="a-link">Создать</a>

                <?php endif;?>
                <a href="<?=Url::to(['/customer/assignment/view', 'id' => $project->id])?>" class="a-link">Смотреть</a>
            </div>

<!--            <div class="doc_content">-->
<!--                <p>В первой половине мая 2020 г. ассоциация «Руссофт» провела опрос среди российских ИТ-фирм, согласно которому 15% готовятся сократить свой персонал более чем на 10%. В целом, к массовым увольнениям в ближайшем будущем могут прийти 42% отечественных компаний из ИТ-сферы.</p>-->
<!--                <p>«Индустрия разработки ПО – высокоинтеллектуальная отрасль с высоким порогом входа, создающая технически сложные продукты, на разработку которых уходят годы, и в случае банкротства компаний восстановление их будет крайне затруднено либо невозможно. Принимая во внимание, что фонд оплаты труда составляет порядка 80% расходов ИТ-компаний, спад в отрасли приведет к сокращению персонала», – сказано в направленном Мишустину письме Касперской и Макарова.</p>-->
<!---->
<!--                <p> Глава ассоциации Валентин Макаров, ссылаясь на другой отчет, сообщил РБК, что в работу могут потерять от 20 тыс. до 25 тыс. ИТ-специалистов, тогда как ежегодный прирост, к примеру, программистов, осуществляемый, по большей части, за счет выпускников, составляет в пределах от 15 тыс. до 17 тыс. человек.</p>-->
<!---->
<!--                <p>«Годовой прирост числа программистов на две трети будет нивелирован отъездом опытных разработчиков. Это означает, что в 2020 г. мы впервые за все 17 лет измерений можем увидеть снижение экспорта и, конечно, снижение объема продаж на внутреннем рынке», – сказал Валентин Макаров.</p>-->
<!---->
<!--                <p>По оценке Минкомсвязи России, чистая прибыль ИТ-компаний по итогам II квартала 2020 г. может сократиться до нуля, а к убыточности бизнес могут привести различные отчисления, в том числе и выплаты процентов по кредитам. По итогам всего 2020 г. прибыль отрасли в целом может снизиться на 30 млрд руб. в сравнении с 2019 г. и составить 93 млрд руб.</p>-->
<!---->
<!--                <p>В первой половине мая 2020 г. ассоциация «Руссофт» провела опрос среди российских ИТ-фирм, согласно которому 15% готовятся сократить свой персонал более чем на 10%. В целом, к массовым увольнениям в ближайшем будущем могут прийти 42% отечественных компаний из ИТ-сферы.</p>-->
<!---->
<!--                <p>«Индустрия разработки ПО – высокоинтеллектуальная отрасль с высоким порогом входа, создающая технически сложные продукты, на разработку которых уходят годы, и в случае банкротства компаний восстановление их будет крайне затруднено либо невозможно. Принимая во внимание, что фонд оплаты труда составляет порядка 80% расходов ИТ-компаний, спад в отрасли приведет к сокращению персонала», – сказано в направленном Мишустину письме Касперской и Макарова.</p>-->
<!---->
<!--                <p>Глава ассоциации Валентин Макаров, ссылаясь на другой отчет, сообщил РБК, что в работу могут потерять от 20 тыс. до 25 тыс. ИТ-специалистов, тогда как ежегодный прирост, к примеру, программистов, осуществляемый, по большей части, за счет выпускников, составляет в пределах от 15 тыс. до 17 тыс. человек.</p>-->
<!---->
<!--                <p>«Годовой прирост числа программистов на две трети будет нивелирован отъездом опытных разработчиков. Это означает, что в 2020 г. мы впервые за все 17 лет измерений можем увидеть снижение экспорта и, конечно, снижение объема продаж на внутреннем рынке»-->
<!--                </p>-->
<!---->
<!--                <div class="stringBlock buttonBlock">-->
<!--                    <div class="stringWrap">-->
<!--                        <div class="leftButton"><a href="#" class="a-link">Утвердить</a></div>-->
<!--                        <div class="rightButton"><a href="#" class="a-link">Написать замечания</a></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <br>-->
<!--            </div>-->
            <?php if ($project->project_status == \app\models\Project::STATUS_FULL):?>
            <h2>Договор на разработку проекта</h2>
            <div class="doc_content">
                <p>В первой половине мая 2020 г. ассоциация «Руссофт» провела опрос среди российских ИТ-фирм, согласно которому 15% готовятся сократить свой персонал более чем на 10%. В целом, к массовым увольнениям в ближайшем будущем могут прийти 42% отечественных компаний из ИТ-сферы.</p>
                <p>«Индустрия разработки ПО – высокоинтеллектуальная отрасль с высоким порогом входа, создающая технически сложные продукты, на разработку которых уходят годы, и в случае банкротства компаний восстановление их будет крайне затруднено либо невозможно. Принимая во внимание, что фонд оплаты труда составляет порядка 80% расходов ИТ-компаний, спад в отрасли приведет к сокращению персонала», – сказано в направленном Мишустину письме Касперской и Макарова.</p>

                <p> Глава ассоциации Валентин Макаров, ссылаясь на другой отчет, сообщил РБК, что в работу могут потерять от 20 тыс. до 25 тыс. ИТ-специалистов, тогда как ежегодный прирост, к примеру, программистов, осуществляемый, по большей части, за счет выпускников, составляет в пределах от 15 тыс. до 17 тыс. человек.</p>

                <p>«Годовой прирост числа программистов на две трети будет нивелирован отъездом опытных разработчиков. Это означает, что в 2020 г. мы впервые за все 17 лет измерений можем увидеть снижение экспорта и, конечно, снижение объема продаж на внутреннем рынке», – сказал Валентин Макаров.</p>

                <p>По оценке Минкомсвязи России, чистая прибыль ИТ-компаний по итогам II квартала 2020 г. может сократиться до нуля, а к убыточности бизнес могут привести различные отчисления, в том числе и выплаты процентов по кредитам. По итогам всего 2020 г. прибыль отрасли в целом может снизиться на 30 млрд руб. в сравнении с 2019 г. и составить 93 млрд руб.</p>

                <p>В первой половине мая 2020 г. ассоциация «Руссофт» провела опрос среди российских ИТ-фирм, согласно которому 15% готовятся сократить свой персонал более чем на 10%. В целом, к массовым увольнениям в ближайшем будущем могут прийти 42% отечественных компаний из ИТ-сферы.</p>

                <p>«Индустрия разработки ПО – высокоинтеллектуальная отрасль с высоким порогом входа, создающая технически сложные продукты, на разработку которых уходят годы, и в случае банкротства компаний восстановление их будет крайне затруднено либо невозможно. Принимая во внимание, что фонд оплаты труда составляет порядка 80% расходов ИТ-компаний, спад в отрасли приведет к сокращению персонала», – сказано в направленном Мишустину письме Касперской и Макарова.</p>

                <p>Глава ассоциации Валентин Макаров, ссылаясь на другой отчет, сообщил РБК, что в работу могут потерять от 20 тыс. до 25 тыс. ИТ-специалистов, тогда как ежегодный прирост, к примеру, программистов, осуществляемый, по большей части, за счет выпускников, составляет в пределах от 15 тыс. до 17 тыс. человек.</p>

                <p>«Годовой прирост числа программистов на две трети будет нивелирован отъездом опытных разработчиков. Это означает, что в 2020 г. мы впервые за все 17 лет измерений можем увидеть снижение экспорта и, конечно, снижение объема продаж на внутреннем рынке»
                </p>

                <div class="stringBlock buttonBlock">
                    <div class="stringWrap">
                        <div class="leftButton"><a href="#" class="a-link">Утвердить</a></div>
                        <div class="rightButton"><a href="#" class="a-link">Написать замечания</a></div>
                    </div>
                </div>
                <br>
            </div>
            <?php endif;?>
            <br>
<!--            <div class="stringBlock buttonBlock">-->
<!--                <div class="stringWrap">-->
<!--                    <div class="leftButton"><a href="#" class="a-link">Утвердить все</a></div>-->
<!--                    <div class="rightButton"><a href="#" class="a-link">Написать замечания</a></div>-->
<!--                </div>-->
<!--            </div>-->

        </div>
    </section>


</div>
