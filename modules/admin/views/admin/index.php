<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Админпанель | Главная';
?>

<div class="mainContent">
    <section class="top">
        <div class="myContainer">
            <h2>Личный кабинет администратора</h2>
            <h5>Добрый день Иван Иванович!
                <wbr>
                Добро пожаловать в ваш личный кабинет!
            </h5>
            <hr>
        </div>
    </section>
    <section class="">
        <div class="myContainer">
            <h2>Сообщения</h2>
            <h5>Иван Иванович! У Вас есть непрочитанные сообщения!</h5>
            <div class="button">
                <a href="#" class="a-link">Просмотреть сообщения</a>
            </div>
            <hr>
        </div>
    </section>

    <section class="adminPanel">
        <div class="myContainer">
            <h2>Панель управления</h2>
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
                    <h4><a href="<?=Url::to(['/admin/project'])?>" class="a-link">Проекты</a></h4>
                    <div class="wrap">
                        <div class="chapter1 chapter">
                            <p><a href="#" class="a-link">Недооформленные: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Проекты в работе: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Проекты на паузе: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Законченные проекты: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Горящие проекты: <span class="">2</span></a></p>
                        </div>
                        <div class="chapter2 chapter">
                            <div class="button-admin">
                                <a class="a-link" href="#">Добавить проект</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="itemBlock work">
                    <div class="svg-icon">
                        <svg width="73" height="74" viewBox="0 0 73 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d)">
                                <path d="M2.13186 41.4495L2.13188 41.4495L2.13155 41.4441C2.04117 39.9727 2.83106 36.0178 7.08641 33.2806C8.32956 32.4809 10.3945 31.911 12.9691 31.5573C15.5097 31.2082 18.4185 31.0851 21.2507 31.0975C24.0794 31.11 26.8099 31.2575 28.9858 31.4433C31.1957 31.632 32.7518 31.8537 33.2807 31.9953C34.1183 32.2196 34.972 32.7029 35.7203 33.2534C36.3115 33.6884 36.8008 34.1385 37.1234 34.4735L39.4535 64.0765H32.762H10.8475H3.39899L2.13186 41.4495Z"
                                      fill="#F49998" stroke="black" stroke-width="2"/>
                                <path d="M21.5934 46.9924C21.435 47.2564 16.6434 36.1905 14.2674 30.6245L29.5793 31.6145C26.9833 36.6305 21.7518 46.7285 21.5934 46.9924Z"
                                      fill="#FDB784" stroke="black" stroke-width="2"/>
                                <path d="M21.5934 46.9924C21.5032 47.1427 19.9116 43.6214 18.1189 39.5332H25.4774C23.4793 43.3866 21.6851 46.8395 21.5934 46.9924Z"
                                      fill="#45BBEA" stroke="black" stroke-width="2"/>
                                <path d="M6.59209 14.5895C6.59209 10.061 8.45625 6.7318 11.2319 4.51605C14.0334 2.27965 17.8134 1.14276 21.6399 1.15513C25.4664 1.1675 29.249 2.3289 32.0533 4.57361C34.8326 6.79826 36.6942 10.1163 36.6942 14.5895V33.8257C34.9682 32.6761 32.2149 31.5785 28.4392 31.5375C23.1224 31.4797 17.3226 31.5123 15.0004 31.5366C13.8438 31.3707 11.9353 31.4279 10.0463 31.8814C8.88927 32.1592 7.65741 32.6054 6.59209 33.3009V14.5895Z"
                                      fill="#44546D" stroke="black" stroke-width="2"/>
                                <path d="M12.4115 14.1092C12.4801 13.956 12.5472 13.8106 12.6121 13.6727C13.5624 14.9045 14.6139 15.7027 15.6774 16.1808C17.1324 16.835 18.5276 16.8533 19.5726 16.6688L20.3898 16.5246L20.3987 15.6948C20.4139 14.2807 20.4321 12.1487 20.4381 10.2968C22.1372 12.702 24.0144 14.2548 25.8799 15.208C28.0766 16.3304 30.1988 16.5916 31.8933 16.49C32.1678 17.8053 32.3295 19.8937 32.0152 22.2593C31.632 25.1429 30.5533 28.346 28.2094 31.0122C25.9482 33.5843 23.3838 34.1273 21.0559 33.8014C18.69 33.4703 16.5479 32.2301 15.3031 31.1776C10.9035 26.6102 10.4385 22.0508 11.029 18.5443C11.3285 16.7655 11.9043 15.2412 12.4115 14.1092Z"
                                      fill="#FDB784" stroke="black" stroke-width="2"/>
                                <path d="M17.227 26.2234C18.673 27.5963 22.4895 29.5184 26.1877 26.2234M16.0439 19.9575C16.3287 19.0373 17.5469 18.0821 18.5635 19.9575M24.7856 20.308C25.0704 19.3878 26.2885 18.4326 27.3051 20.308"
                                      stroke="black" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="46.4233" cy="45.7244" r="18.4517" fill="#FF9E2D" stroke="black"
                                        stroke-width="2"/>
                                <circle cx="46.4233" cy="45.7243" r="14.0083" fill="#DB8E00" stroke="black"
                                        stroke-width="2"/>
                                <path d="M50.4038 39.8081H46.4773M42.3326 52.7173C43.3039 52.7173 44.9635 52.7173 46.4773 52.7173M46.4773 39.8081H44.4119C43.0862 39.8081 41.9908 40.4928 41.9908 42.1041C41.9908 44.3134 41.5526 46.1761 43.8055 46.1761H48.9982C49.2903 46.1761 49.5891 46.1833 49.8552 46.3037C50.3429 46.5244 50.9098 47.0382 50.9098 48.0389C50.9098 49.3558 50.9098 50.6958 50.9098 51.2012C50.9676 51.7066 50.7106 52.7173 49.2204 52.7173C48.5943 52.7173 47.5741 52.7173 46.4773 52.7173M46.4773 39.8081V36.0396M46.4773 52.7173V56.4197"
                                      stroke="black" stroke-width="2" stroke-linecap="round"/>
                            </g>
                            <defs>
                                <filter id="filter0_d" x="0.125046" y="0.155029" width="72.7499" height="73.021"
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
                    <h4><a href="<?=Url::to(['/admin/clients'])?>" class="a-link">Заказчики</a></h4>
                    <div class="wrap">
                        <div class="chapter1 chapter">
                            <p><a href="#" class="a-link">Недооформленные: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Постоянные заказчики: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Активные: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Спящие: <span class="">2</span></a></p>
                        </div>
                        <div class="chapter2 chapter">
                            <div class="button-admin">
                                <a class="a-link" href="<?=Url::to(['/admin/client/create'])?>">Добавить нового</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="itemBlock work">
                    <div class="svg-icon">
                        <svg width="79" height="66" viewBox="0 0 79 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d)">
                                <path d="M36.3975 1.99268C42.3706 1.99268 47.0761 6.45113 47.0761 11.789V15.009V21.5057C47.0761 26.8435 42.3706 31.302 36.3975 31.302C30.4245 31.302 25.719 26.8435 25.719 21.5057V14.5225V11.789C25.719 6.45113 30.4245 1.99268 36.3975 1.99268Z"
                                      fill="#FFC48E" stroke="black" stroke-width="2"/>
                                <path d="M47.0761 15.009V15.9873C46.0554 15.3547 44.8938 14.6134 43.839 13.9282C43.0254 13.3997 42.2808 12.908 41.7196 12.5297C41.4386 12.3402 41.2069 12.1814 41.0368 12.0617C40.9147 11.9757 40.8473 11.9255 40.8174 11.9033C40.7988 11.8895 40.7947 11.8864 40.8011 11.8923L39.9366 11.0917L39.2872 12.0749C38.0611 13.9315 35.5618 14.9453 32.6422 15.3784C30.1716 15.7449 27.5957 15.6654 25.719 15.4595V14.5225V11.789C25.719 6.45113 30.4245 1.99268 36.3975 1.99268C42.3706 1.99268 47.0761 6.45113 47.0761 11.789V15.009Z"
                                      fill="#F7B662" stroke="black" stroke-width="2"/>
                                <circle cx="31.8142" cy="19.7006" r="1.29457" fill="black"/>
                                <circle cx="41.0455" cy="19.7006" r="1.29457" fill="black"/>
                                <path d="M34.2546 24.2847C34.9196 25.1618 36.6909 26.3899 38.4565 24.2847"
                                      stroke="black" stroke-width="2" stroke-linecap="round"/>
                                <path d="M18.1088 7.56543C22.4368 7.56543 25.8222 10.8173 25.8222 14.682V17.1027V21.9869C25.8222 25.8517 22.4368 29.1035 18.1088 29.1035C13.7808 29.1035 10.3954 25.8517 10.3954 21.9869V16.737V14.682C10.3954 10.8173 13.7808 7.56543 18.1088 7.56543Z"
                                      fill="#FFC48E" stroke="black" stroke-width="2"/>
                                <path d="M25.7153 13.4947C24.8088 14.4403 23.5226 15.1599 21.9986 15.6908C20.3143 16.2776 18.4144 16.6079 16.5919 16.7796C14.774 16.9508 13.0638 16.9616 11.7726 16.9232C11.2293 16.907 10.7624 16.8822 10.3954 16.8574V16.737V14.682C10.3954 10.8173 13.7808 7.56543 18.1088 7.56543C21.9822 7.56543 25.1095 10.1774 25.7153 13.4947Z"
                                      fill="#C4C4C4" stroke="black" stroke-width="2"/>
                                <path d="M22.5399 50.4687H8.85032V42.344C8.85032 41.7917 8.40261 41.344 7.85032 41.344C7.29804 41.344 6.85032 41.7917 6.85032 42.344V50.4687H2.2984V39.1978C2.3414 38.2306 2.76224 36.6678 3.91902 35.2825C5.05957 33.9168 6.95809 32.6717 10.0658 32.3798L10.1115 32.3755L10.1567 32.367C13.6977 31.7028 16.5414 31.3582 19.5014 31.5183C22.4566 31.6782 25.5795 32.3444 29.6599 33.7617V50.4687H22.5399Z"
                                      fill="#79D2FA" stroke="black" stroke-width="2" stroke-linecap="round"/>
                                <path d="M14.5143 28.3772C14.4473 28.3469 14.3699 28.395 14.3699 28.4685V32.2275C14.3699 32.2416 14.3729 32.2556 14.3788 32.2685L17.8033 39.8721C17.8381 39.9495 17.9474 39.9511 17.9844 39.8747L21.6708 32.2696C21.6774 32.256 21.6808 32.2411 21.6808 32.226V28.4776C21.6808 28.4019 21.6007 28.3528 21.5327 28.386C20.3091 28.983 17.4424 29.7064 14.5143 28.3772Z"
                                      fill="#FFC48E" stroke="black" stroke-width="2"/>
                                <path d="M54.7083 7.56543C59.0363 7.56543 62.4217 10.8173 62.4217 14.682V17.1027V21.9869C62.4217 25.8517 59.0363 29.1035 54.7083 29.1035C50.3803 29.1035 46.9949 25.8517 46.9949 21.9869V16.737V14.682C46.9949 10.8173 50.3803 7.56543 54.7083 7.56543Z"
                                      fill="#FFC48E" stroke="black" stroke-width="2"/>
                                <path d="M47.1018 13.4947C48.0083 14.4403 49.2945 15.1599 50.8185 15.6908C52.5028 16.2776 54.4027 16.6079 56.2252 16.7796C58.0431 16.9508 59.7532 16.9616 61.0445 16.9232C61.5878 16.907 62.0547 16.8822 62.4216 16.8574V16.737V14.682C62.4216 10.8173 59.0362 7.56543 54.7083 7.56543C50.8349 7.56543 47.7076 10.1774 47.1018 13.4947Z"
                                      fill="#C4C4C4" stroke="black" stroke-width="2"/>
                                <path d="M50.4601 50.4687H64.1496V42.344C64.1496 41.7917 64.5973 41.344 65.1496 41.344C65.7019 41.344 66.1496 41.7917 66.1496 42.344V50.4687H70.7015V39.1978C70.6585 38.2306 70.2377 36.6678 69.0809 35.2825C67.9404 33.9168 66.0418 32.6717 62.9341 32.3798L62.8884 32.3755L62.8433 32.367C59.3022 31.7028 56.4586 31.3582 53.4986 31.5183C50.5433 31.6782 47.4205 32.3444 43.3401 33.7617V50.4687H50.4601Z"
                                      fill="#34E830" stroke="black" stroke-width="2" stroke-linecap="round"/>
                                <path d="M58.4857 28.3772C58.5527 28.3469 58.6301 28.395 58.6301 28.4685V32.2275C58.6301 32.2416 58.6271 32.2556 58.6212 32.2685L55.1967 39.8721C55.1619 39.9495 55.0526 39.9511 55.0156 39.8747L51.3292 32.2696C51.3226 32.256 51.3192 32.2411 51.3192 32.226V28.4776C51.3192 28.4019 51.3993 28.3528 51.4673 28.386C52.6909 28.983 55.5576 29.7064 58.4857 28.3772Z"
                                      fill="#FFC48E" stroke="black" stroke-width="2"/>
                                <path d="M23.3789 48.1938C23.3789 47.6415 22.9312 47.1938 22.3789 47.1938C21.8267 47.1938 21.3789 47.6415 21.3789 48.1938V56.1299H14.6603V47.7007C14.7507 44.9034 16.7094 38.8548 23.8835 37.2151C27.6489 36.3544 28.3175 36.1452 28.7226 36.0184C28.7345 36.0147 28.7461 36.0111 28.7575 36.0075C29.0527 35.9153 29.1407 35.889 32.2507 35.2965L32.0635 34.3143L32.2507 35.2965L32.2508 35.2965L32.2512 35.2964L32.2527 35.2962L32.2564 35.2958C32.257 35.2957 32.2574 35.2957 32.2577 35.2957H41.1424L50.5672 37.7873C51.8895 38.5114 53.7841 39.7148 55.3386 41.3935C56.89 43.0688 58.0508 45.1578 58.0508 47.6851V56.1299L51.3758 56.1299V48.1938C51.3758 47.6415 50.9281 47.1938 50.3758 47.1938C49.8235 47.1938 49.3758 47.6415 49.3758 48.1938V56.1299H23.3789V48.1938Z"
                                      fill="#FF5959" stroke="black" stroke-width="2" stroke-linecap="round"/>
                                <path d="M31.604 35.3464L31.6517 30.5516C31.6532 30.4019 31.8136 30.3069 31.9481 30.3727C35.7219 32.2197 39.3753 31.257 41.0354 30.398C41.1744 30.3261 41.3463 30.4254 41.3448 30.582L41.2974 35.343C41.2971 35.3739 41.2897 35.4043 41.2756 35.4318L36.3174 45.1646C36.241 45.3145 36.025 45.3089 35.9565 45.1552L31.6213 35.4298C31.6096 35.4035 31.6037 35.3751 31.604 35.3464Z"
                                      fill="#FFB08F" stroke="black" stroke-width="2"/>
                            </g>
                            <defs>
                                <filter id="filter0_d" x="0.298401" y="0.992676" width="78.4031" height="64.1372"
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
                    <h4><a href="<?=Url::to(['/admin/staff'])?>" class="a-link">Сотрудники</a></h4>
                    <div class="wrap">
                        <div class="chapter1 chapter">
                            <p><a href="#" class="a-link">Недооформленные: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Занятые: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Свободные: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Уволенные: <span class="">2</span></a></p>
                        </div>
                        <div class="chapter2 chapter">
                            <div class="button-admin">
                                <a class="a-link" href="#">Добавить сотрудника</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="itemBlock decor">
                    <div class="svg-icon">
                        <svg width="69" height="60" viewBox="0 0 69 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d)">
                                <rect x="2.11957" y="9.51929" width="58.7609" height="40.6645" rx="5" fill="#D2E2F2"
                                      stroke="black" stroke-width="2"/>
                                <path d="M6.43559 9.51929H55.9464C58.6714 9.51929 60.8804 11.7283 60.8804 14.4533C60.8804 17.4546 59.3332 19.4083 57.3019 20.6817C55.2433 21.9723 52.7366 22.5194 51.0589 22.6171H12.4144C10.6624 22.5379 8.03939 21.983 5.88402 20.6103C3.76333 19.2597 2.11957 17.1454 2.11957 13.8353C2.11957 11.4516 4.05192 9.51929 6.43559 9.51929Z"
                                      fill="#C28C60" stroke="black" stroke-width="2"/>
                                <path d="M17.761 9.15988V4.7268C17.761 3.06995 19.1042 1.72681 20.761 1.72681H42.0715C43.7284 1.72681 45.0715 3.06995 45.0715 4.72681V9.15988"
                                      stroke="black" stroke-width="2"/>
                                <rect x="24.7745" y="20.1047" width="13.5125" height="7.23727" rx="1" fill="#D2E2F2"
                                      stroke="black" stroke-width="2"/>
                                <path d="M27.8274 31.2555V28.0898C27.8274 27.8137 28.0513 27.5898 28.3274 27.5898H34.5223C34.7984 27.5898 35.0223 27.8137 35.0223 28.0898V31.2414C35.0223 31.4089 34.9383 31.5654 34.7987 31.658L31.5445 33.8172C31.3702 33.9328 31.1424 33.9277 30.9734 33.8045L28.0328 31.6595C27.9037 31.5653 27.8274 31.4152 27.8274 31.2555Z"
                                      fill="#C28C60" stroke="black" stroke-width="2"/>
                            </g>
                            <defs>
                                <filter id="filter0_d" x="0.119568" y="0.726807" width="68.7609" height="58.457"
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
                    <h4><a href="#" class="a-link">Портфолио</a></h4>
                    <div class="wrap">
                        <div class="chapter1 chapter">
                            <p><a href="#" class="a-link">Статей в портфолио: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Изображений в портфолио: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Черновиков в портфолио: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Комментариев: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Новых комментариев: <span class="">2</span></a></p>
                        </div>
                        <div class="chapter2 chapter">
                            <div class="button-admin">
                                <a class="a-link" href="#">Добавить проект</a>
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
                    <h4><a href="#" class="a-link">Образец проекта</a></h4>
                    <div class="wrap">
                        <div class="chapter1 chapter">
                            <p><a href="#" class="a-link">Недооформленные: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Постоянные заказчики: <span class="">2</span></a></p>

                        </div>
                        <div class="chapter2 chapter">
                            <div class="button-admin">
                                <a class="a-link" href="#">Редактировать</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="itemBlock decor">
                    <div class="svg-icon">
                        <svg width="68" height="68" viewBox="0 0 68 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d)">
                                <path d="M20.0394 10.0103C22.5928 12.6234 22.5444 16.8117 19.9313 19.3651C17.3182 21.9185 13.13 21.8701 10.5766 19.257C10.4309 19.0982 7.1462 15.737 3.79188 12.3072C3.40756 13.5762 3.20093 14.9224 3.20093 16.3169C3.20093 23.9458 9.38533 30.1302 17.0142 30.1302C19.3583 30.1302 21.5661 29.5463 23.5 28.5159L48.1459 56.5462C49.2999 57.7977 50.9534 58.5817 52.7899 58.5817C56.2779 58.5817 59.1054 55.7541 59.1054 52.2662C59.1054 49.891 57.7942 47.8221 55.8562 46.7437C55.3685 46.5072 38.4314 31.6324 28.9481 23.2776C30.1428 21.2337 30.8275 18.8552 30.8275 16.3169C30.8275 8.68807 24.643 2.50366 17.0142 2.50366C15.6983 2.50366 14.4255 2.68765 13.2199 3.03131L20.0394 10.0103Z" fill="#038A00"/>
                                <path d="M14.3744 55.0697L6.79645 47.0297L51.3155 2.20911L59.4227 10.2281L14.3744 55.0697Z" fill="white"/>
                                <path d="M14.3744 55.0697L6.79645 47.0297L51.3155 2.20911L59.4227 10.2281L14.3744 55.0697Z" fill="white"/>
                                <path d="M14.3744 55.0697L6.79645 47.0297L51.3155 2.20911L59.4227 10.2281L14.3744 55.0697Z" stroke="black" stroke-width="2"/>
                                <path d="M14.3746 55.0698L11.2715 51.7775L51.086 11.9161L54.4283 15.2221L14.3746 55.0698ZM49.664 10.5096L9.89913 50.3215L6.79618 47.0293L46.3217 7.20354L49.664 10.5096Z" fill="white"/>
                                <path d="M14.3746 55.0698L11.2715 51.7775L51.086 11.9161L54.4283 15.2221L14.3746 55.0698ZM49.664 10.5096L9.89913 50.3215L6.79618 47.0293L46.3217 7.20354L49.664 10.5096Z" fill="#FFE600"/>
                                <path d="M14.3746 55.0698L11.2715 51.7775L51.086 11.9161L54.4283 15.2221L14.3746 55.0698ZM49.664 10.5096L9.89913 50.3215L6.79618 47.0293L46.3217 7.20354L49.664 10.5096Z" stroke="black" stroke-width="2"/>
                                <path d="M1.87361 59.514C1.73479 59.5486 4.17269 51.2431 5.40899 47.0859L14.3451 56.5209C10.2458 57.5041 2.01242 59.4793 1.87361 59.514Z" fill="black"/>
                                <path d="M1.87361 59.514C1.73479 59.5486 4.17269 51.2431 5.40899 47.0859L14.3451 56.5209C10.2458 57.5041 2.01242 59.4793 1.87361 59.514Z" fill="black"/>
                                <path d="M4.08592 57.3016C3.9471 57.3363 5.49573 52.5661 6.73203 48.4089L13.0654 55.111C4.08592 57.3016 4.22474 57.267 4.08592 57.3016Z" fill="#E8D3B1"/>
                            </g>
                            <defs>
                                <filter id="filter0_d" x="0.86792" y="0.796387" width="66.9745" height="66.7177" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                    <h4><a href="#" class="a-link">Сайт</a></h4>
                    <div class="wrap">
                        <div class="chapter1 chapter">
                            <p><a href="#" class="a-link">Редактировать заголовок: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Редактировать футер: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Редактировать контакты: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Редактировать слайдер: <span class="">2</span></a></p>
                            <p><a href="#" class="a-link">Редактировать цены: <span class="">2</span></a></p>
                        </div>
                        <div class="chapter2 chapter">
                            <div class="button-admin">
                                <a class="a-link" href="#">Перейти на сайт</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>

    <section class="noFormalizes cardProjects">
        <div class="myContainer">
            <h2>Недооформленные проекты:</h2>
            <div class="blockWrap">
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img src="../files/img/int1.jpg" title="" class="image">
                            <h5>Дизайн интерьера квартиры по улице Петровского 45</h5>
                            <p>
                                <b>ID Проекта:</b> 00182820<br>
                                <b>Дата начала проекта:</b> 18.01.2020<br>
                                <b>Дата завершения проекта:</b> 18.03.2020<br>
                                <b>Исполнители:</b> Степан Иванов, Иван Степанов, Мария Курганская
                            </p>
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
                        </div>
                    </a>
                </div>
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img src="../files/img/int1.jpg" title="" class="image">
                            <h5>Дизайн интерьера квартиры по улице Петровского 45</h5>
                            <p>
                                <b>ID Проекта:</b> 00182820<br>
                                <b>Дата начала проекта:</b> 18.01.2020<br>
                                <b>Дата завершения проекта:</b> 18.03.2020<br>
                                <b>Исполнители:</b> Степан Иванов, Иван Степанов, Мария Курганская
                            </p>
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
                        </div>
                    </a>
                </div>
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img src="../files/img/int1.jpg" title="" class="image">
                            <h5>Дизайн интерьера квартиры по улице Петровского 45</h5>
                            <p>
                                <b>ID Проекта:</b> 00182820<br>
                                <b>Дата начала проекта:</b> 18.01.2020<br>
                                <b>Дата завершения проекта:</b> 18.03.2020<br>
                                <b>Исполнители:</b> Степан Иванов, Иван Степанов, Мария Курганская
                            </p>
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
                        </div>
                    </a>
                </div>
            </div>
            <div class="button">
                <a href="#" class="a-link">Все недоофоормленные</a>
            </div>
            <hr>
        </div>
    </section>
    <section class="activProjects cardProjects">
        <div class="myContainer">
            <h2>Активные проекты:</h2>
            <div class="blockWrap">
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img src="../files/img/int1.jpg" title="" class="image">
                            <h5>Дизайн интерьера квартиры по улице Петровского 45</h5>
                            <p>
                                <b>ID Проекта:</b> 00182820<br>
                                <b>Дата начала проекта:</b> 18.01.2020<br>
                                <b>Дата завершения проекта:</b> 18.03.2020<br>
                                <b>Исполнители:</b> Степан Иванов, Иван Степанов, Мария Курганская
                            </p>
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
                        </div>
                    </a>
                </div>
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img src="../files/img/int1.jpg" title="" class="image">
                            <h5>Дизайн интерьера квартиры по улице Петровского 45</h5>
                            <p>
                                <b>ID Проекта:</b> 00182820<br>
                                <b>Дата начала проекта:</b> 18.01.2020<br>
                                <b>Дата завершения проекта:</b> 18.03.2020<br>
                                <b>Исполнители:</b> Степан Иванов, Иван Степанов, Мария Курганская
                            </p>
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
                        </div>
                    </a>
                </div>
                <div class="itemWrap">
                    <a href="#" class="block-link">
                        <div class="item">
                            <img src="../files/img/int1.jpg" title="" class="image">
                            <h5>Дизайн интерьера квартиры по улице Петровского 45</h5>
                            <p>
                                <b>ID Проекта:</b> 00182820<br>
                                <b>Дата начала проекта:</b> 18.01.2020<br>
                                <b>Дата завершения проекта:</b> 18.03.2020<br>
                                <b>Исполнители:</b> Степан Иванов, Иван Степанов, Мария Курганская
                            </p>
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
                        </div>
                    </a>
                </div>
            </div>
            <div class="button">
                <a href="#" class="a-link">Все активные</a>
            </div>
            <hr>
        </div>
    </section>

</div>