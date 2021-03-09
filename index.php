<?php get_header();?>

<?php
function is_empty($var)
{
    return !($var || (is_scalar($var) && strlen($var)));
}
?>

<section class="bl news bl-info" id="news">
    <div class="container">
        <?php
        $news_title = get_field('news_title');
        if (!is_empty($news_title)):
        ?>
        <h2 class="title"><?php echo $news_title?></h2>
        <div class="bl-in scrolled">

            <?php
            // параметры по умолчанию
            $posts = get_posts( array(
                'numberposts' => 5,
                'category'    => 3,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );

            foreach( $posts as $post ){
                setup_postdata($post);
                ?>
                <article class="bl-info-item">
                    <div class="bl-info-img">
                        <a href="<?php the_permalink();?>"><?php the_post_thumbnail('news_thumb')?></a>
                    </div>
                    <div class="bl-info-descr">
                        <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                        <div class="bl-info-date">
                            <span class="date-label">Дата:</span>
                            <span class="date"><?php the_time('d.m.Y'); ?></span>
                        </div>
                        <p class="bl-info-text">
                            <?php the_excerpt();?>
                        </p>

                    </div>
                </article>
                <?php
            }

            wp_reset_postdata(); // сброс?>

        </div>
        <div class="flag-wrap flag-wrap-left">
            <span class="flag red"></span>
            <span class="flag orange"></span>
            <span class="flag yellow"></span>
            <span class="flag light-green"></span>
            <span class="flag white"></span>
            <span class="flag blue"></span>
            <span class="flag violet"></span>
            <span class="string"><svg width="800" height="230" viewBox="0 0 800 230"><path fill="none" d="M0,0 C100,100 700,200 800,100" /></svg></span>
        </div>
        <div class="flag-wrap flag-wrap-right">
            <span class="flag light-green"></span>
            <span class="flag blue"></span>
            <span class="flag white"></span>
            <span class="flag orange"></span>
            <span class="flag aqua"></span>
            <span class="flag violet"></span>
            <span class="flag yellow"></span>
            <span class="flag light-green"></span>
            <span class="flag red"></span>
            <span class="string"><svg width="800" height="230" viewBox="0 0 800 230"><path fill="none" d="M0,0 C100,100 700,200 800,100" /></svg></span>
        </div>
        <div class="ball-ic red"><svg class="ball"><use xlink:href="#ball"/></svg></div>
        <div class="ball-ic green"><svg class="ball"><use xlink:href="#ball"/></svg></div>
        <div class="ball-ic yellow"><svg class="ball"><use xlink:href="#ball"/></svg></div>
        <div class="ball-ic violet"><svg class="ball"><use xlink:href="#ball"/></svg></div>
        <?endif;?>
    </div>
</section>
<main class="bl bl-sm aboutus" id="about">
    <div class="container">
        <?php
            $about_title = get_field('about_title');
            if (!is_empty($about_title)):
        ?>
        <h2 class="title"><?php echo $about_title?></h2>
        <div class="bl-in">


            <div class="aboutus-item"><?php the_field('about1'); ?></div>
            <div class="aboutus-item"><?php the_field('about2'); ?></div>

            <?php
            $list=get_field('about_list');
            if ($list) {
                $a_list = explode(";", $list);?>
                <ul class="aboutus-item">
                    <?
                    foreach ($a_list as $item) {?>
                        <li><?echo $item;?></li>
                    <?}?>
                </ul>
            <?}
            ?>


            <div class="aboutus-item">
                <?php the_field('about3'); ?>
            </div>
            <div class="aboutus-item">
                <?php the_field('about4'); ?>
            </div>
            <div class="aboutus-item">
                <?php the_field('about4'); ?>
            </div>
        </div>
        <div class="ball-ic orange"><svg class="ball"><use xlink:href="#ball"/></svg></div>
        <div class="ball-ic aqua"><svg class="ball"><use xlink:href="#ball"/></svg></div>
        <?endif;?>
    </div>
</main>
<section class="bl team bl-info" id="team">
    <div class="container">
        <?php
        $team_title = get_field('team_title');
        if (!is_empty($team_title)):
        ?>
        <h2 class="title"><?echo $team_title?></h2>
        <div class="bl-in scrolled">
            <?php
            $employees = get_field('employee');
            if( $employees ):
                ?>

                    <?php foreach( $employees as $person ):
                        $full_name = get_the_title($person->ID);
                        $photo_url = get_field('photo', $person->ID);
                        $position = get_field('position', $person->ID);
                        $permalink = get_permalink( $person->ID );
                    ?>

                        <div class="bl-info-item">
                            <div class="bl-info-img"><img src="<?php echo esc_url($photo_url)?>" alt=""></div>
                            <div class="bl-info-descr">
                                <h3 class="title"><?php echo esc_html($full_name)?></h3>
                                <div class="subtitle">Должность: <span class="team-position"><?php echo esc_html($position)?></span></div>
                                <div class="team-info">
                                    <div class="team-info-title">Образование:</div>
                                    <?php
                                    $education = get_field('education', $person->ID);
                                    $count=0;
                                    if( $education ):
                                    ?>
                                    <ol>
                                        <?php foreach ( $education as $item ):
                                            $univer = get_the_title($item->ID);
                                            ?>
                                        <li><?php echo esc_html($univer)?></li>
                                        <?php
                                        if ($count == 1) {
                                            break;
                                        }

                                        $count = $count + 1;
                                        endforeach;?>
                                    </ol>
                                    <?php endif;?>
                                </div>
                                <a href="<?php echo esc_url( $permalink ); ?>" class="bl-info-detail">Подробнее..</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <?endif;?>
    </div>
</section>
<div class="bl bl-sm bl-slider rooms" id="rooms">
    <div class="container">
        <?php
        $rooms_title = get_field('rooms_block_title');
        if (!is_empty($rooms_title)):
        ?>
        <h2 class="title"><?echo esc_html($rooms_title);?></h2>
        <div class="bl-in">
            <div class="slider">
                <div class="slider-wrapper">
                    <div class="slider-items">
                        <?php
                        $rooms_slider = get_field('rooms_slider');

                        echo do_shortcode($rooms_slider);
                        ?>
                        <!--<div class="slider-item">
                            <img src="#" alt="" class="slider-img">
                            <div class="slider-text">
                                <div class="">
                                    <h3 class="title">Наименование помещения</h3>
                                    <div>Описание: Площадь - 20кв.м.; Расчитано на 15 детей;</div>
                                </div>
                                <div class="slider-indic">
                                    <span>1</span>/<span>20</span>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
                <a href="#" class="slider-control slider-control_prev" href="#" role="button"></a>
                <a href="#" class="slider-control slider-control_next" href="#" role="button"></a>
            </div>
        </div>
        <div class="ball-ic red"><svg class="ball"><use xlink:href="#ball"/></svg></div>
        <div class="ball-ic violet"><svg class="ball"><use xlink:href="#ball"/></svg></div>
        <?endif;?>
    </div>
</div>
<div class="bl bl-sm bl-slider territory" id="territory">
    <div class="container">
        <?php
        $territory_title = get_field('territory_title');
        if (!is_empty($territory_title)):
        ?>
        <h2 class="title"><?echo esc_html($territory_title);?></h2>
        <div class="bl-in">
            <div class="slider">
                <div class="slider-wrapper">
                    <div class="slider-items">
                        <!--<div class="slider-item">
                            <img src="#" alt="" class="slider-img">
                            <div class="slider-text">
                                <div class="">
                                    <h3 class="title">Игровая площадка “Грибок”</h3>
                                    <div>Описание: Площадь - 40кв.м.; Игровой инвентарь: качеля, горка, карусель.</div>
                                </div>
                                <div class="slider-indic">
                                    <span>1</span>/<span>20</span>
                                </div>
                            </div>
                        </div>-->
                        <?php
                        $territory_slider = get_field('territory_slider');
                        echo do_shortcode($territory_slider);
                        ?>
                    </div>
                </div>
                <a href="#" class="slider-control slider-control_prev" href="#" role="button"></a>
                <a href="#" class="slider-control slider-control_next" href="#" role="button"></a>
            </div>
        </div>
        <div class="ball-ic yellow"><svg class="ball "><use xlink:href="#ball"/></svg></div>
        <div class="ball-ic light-blue"><svg class="ball "><use xlink:href="#ball"/></svg></div>
        <?endif;?>
    </div>
</div>
<div class="bl bl-sm group" id="groups">
    <div class="container">
        <?php
        $group_title= get_field('group_title');
        if (!is_empty($group_title)):
        ?>
        <h2 class="title"><?echo esc_html($group_title);?></h2>
        <div class="bl-in">
            <h3 class="title"><?php the_field('group_text');?></h3>
            <div class="group-wrap">
                <?php
                $groups = get_field('groups');
                if ($groups) :
                    foreach($groups as $group):
                        $group_name = get_the_title($group->ID);

                        $group_age = get_field('group_age', $group->ID);
                        $group_age_array = explode("-", $group_age);
                        $group_age_min = $group_age_array[0] ? $group_age_array[0] : 1.5;
                        $group_age_max = $group_age_array[1] ? $group_age_array[1] : 6.5;

                        $group_amount = get_field('group_amount', $group->ID);
                        //$group_amount_array = explode("-", $group_amount);
                        //$group_amount_min = $group_amount_array[0] ? $group_amount_array[0] : 10;
                        //$group_amount_max = $group_amount_array[1] ? $group_amount_array[1] : 20;
                    ?>
                        <div class="group-item">
                            <h3 class="title">Группа “<?php echo esc_html($group_name)?>”</h3>
                            <ul class="group-info">
                                <li>
                                    <span class="group-label">Возраст:</span>
                                    <span>от <?php echo esc_html($group_age_min)?> до <?php echo esc_html($group_age_max)?> лет</span>
                                </li>
                                <li>
                                    <span class="group-label">Количество детей:</span>
                                    <span><?php echo esc_html($group_amount)?></span>
                                </li>
                            </ul>
                        </div>

                <?php
                    endforeach;
                endif?>

            </div>
        </div>
        <div class="ball-ic pink"><svg class="ball "><use xlink:href="#ball"/></svg></div>
        <div class="ball-ic green"><svg class="ball "><use xlink:href="#ball"/></svg></div>
        <?endif;?>
    </div>
</div>
<div class="bl bl-sm contacts" id="contacts">
    <div class="container">
        <?php
        $contact_title= get_field('contact_title');
        if (!is_empty($contact_title)):
        ?>
        <h2 class="title"><?echo esc_html($contact_title);?></h2>
        <div class="bl-in">
            <div class="contacts-map">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ab871e7a79a013dcde4231e130d73addaed7e2df8fca1f1de5099864877e54799&amp;width=850&amp;height=350&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
            <div class="contacts-address">
                <ul>
                    <li>
                        <h3 class="title">Адрес:</h3>
                        <address>123<?php the_field("address");?></address>
                    </li>
                    <li>
                        <h3 class="title">Телефон:</h3>
                        <a href="tel:<?php the_field("phone");?>" class="phone"><?php the_field("phone");?></a>
                    </li>
                    <li>
                        <h3 class="title">E-mail:</h3>
                        <a href="mailto:<?php the_field("email");?>"><?php the_field("email");?></a>
                    </li>
                    <li>
                        <h3 class="title">Web: </h3>
                        <a href="<?php the_field("web");?>"><?php the_field("web");?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ball-ic aqua"><svg class="ball"><use xlink:href="#ball"/></svg></div>
        <?endif;?>
    </div>
</div>
<div class="bl bl-sm feedback" id="feedback">
    <div class="container">
        <?php
        $form_title= get_field('form_title');
        if (!is_empty($form_title)):
        ?>
        <h2 class="title"><?echo esc_html($form_title);?></h2>
        <div class="bl-in">
            <form action="" class="form">

                <?php
                $contact_form = get_field('contact_form');
                echo do_shortcode($contact_form);
                ?>
                <!--<div class="row">
                    <div class="col">
                        <div class="field-group">
                            <label for="uname" class="field-label">Имя:</label>
                            <input type="text" id="uname" class="field" placeholder="Ваше имя">
                        </div>
                        <div class="field-group">
                            <label for="uphone" class="field-label">Телефон:</label>
                            <input type="text" id="uphone" class="field" placeholder="Номер Вашего телефона">
                        </div>
                        <div class="field-group mb-10">
                            <label for="uemail" class="field-label">E-mail:</label>
                            <input type="text" id="uemail" class="field" placeholder="Ваш e-mail">
                        </div>
                    </div>
                    <div class="col msg">
                        <div class="field-group">
                            <label for="umassage" class="field-label">Сообщение:</label>
                            <textarea id="umassage" class="field" placeholder="Ваше сообщение"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="field-group send-wrap">
                        <button type="button" class="btn send">Отправить</button>
                    </div>
                </div>-->
            </form>
        </div>
        <div class="ball-ic blue"><svg class ="ball"><use xlink:href="#ball"/></svg></div>
        <?php endif;?>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="triangle" viewBox="0 0 47 54">
        <path d="M8.44616 13.5598L46.2608 28.6199L14.3111 53.8383L8.44616 13.5598Z"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="ball" viewBox="0 0 232 258">
        <circle r="70" transform="matrix(-0.886526 0.462679 0.462679 0.886526 95.5818 94.7007)"/>
        <path d="M39.0576 136.609C18.5315 108.518 24.6725 80.9484 33.9599 62.0012C49.9419 29.3965 112.723 0.0267171 148.694 49.4974C177.471 89.074 163.017 123.05 152.193 135.091C123.034 147.301 59.5837 164.699 39.0576 136.609Z" fill="white" fill-opacity="0.2"/>
        <path d="M40.6494 73.7379C39.1643 65.489 38.2955 54.0985 48.1815 43.8629C68.6859 22.6335 107.444 18.0094 136.415 37.8575C165.386 57.7055 168.937 94.7684 163.157 109.629C133.997 121.839 46.814 107.978 40.6494 73.7379Z" fill="white" fill-opacity="0.25"/>
        <path d="M33.5943 66.7041C30.6345 71.4072 29.2788 80.0484 28.9709 83.7811C28.669 86.4448 33.3663 92.2031 31.7469 89.1002C30.4514 86.6179 35.1878 68.3164 37.718 59.476C37.5767 59.9257 36.5542 62.0009 33.5943 66.7041Z" fill="white"/>
        <path d="M128.147 38.225C134.793 39.7198 146.054 52.0033 150.854 57.9582C144.5 52.7012 128.136 50.4508 120.747 49.9828L128.147 38.225Z" fill="white"/>
        <path d="M110.607 32.715C116.343 33.331 123.495 36.5167 126.354 38.0325L123.29 41.8876C119.847 41.0528 112.821 39.1174 112.265 38.0535C111.71 36.9897 110.929 34.0512 110.607 32.715Z" fill="white"/>
        <path d="M113.422 40.2699L122.655 43.9114C121.945 44.2815 120.188 47.8307 119.398 49.559C119.026 49.5654 118.01 49.4936 116.931 49.1545C115.852 48.8155 114.142 43.0901 113.422 40.2699Z" fill="white"/>
        <path d="M129.801 159.186L125.753 157.914L122.631 158.416L121.379 163.581L129.801 159.186Z"/>
        <path d="M125.753 157.914L122.207 159.765C122.259 162.746 123.395 168.958 127.528 169.96C132.693 171.212 134.505 172.522 133.908 176.782C133.311 181.041 128.128 191.643 135.164 197.559C142.199 203.475 151.97 199.503 156.539 205.015C161.107 210.526 162.534 215.422 162.188 221.242C161.842 227.063 160.224 236.931 161.632 240.709" stroke="#8D8D8D" fill="none"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="flag" viewBox="0 0 68 1120" >
        <path d="M18.4462 14.5598L56.2608 29.6199L24.3111 54.8383L18.4462 14.5598Z" fill="#FF05E6"/>
        <path d="M19.4462 591.975L57.2608 607.035L25.3111 632.253L19.4462 591.975Z" fill="#FF05E6"/>
        <path d="M11.8409 121.908L52.4965 119.94L33.8732 156.133L11.8409 121.908Z" fill="#FFF960"/>
        <path d="M12.8409 699.323L53.4965 697.354L34.8732 733.547L12.8409 699.323Z" fill="#FFF960"/>
        <path d="M55.5263 221.601L28.5247 252.059L15.6485 213.446L55.5263 221.601Z" fill="#29AEFA"/>
        <path d="M56.5263 799.016L29.5247 829.474L16.6485 790.861L56.5263 799.016Z" fill="#29AEFA"/>
        <path d="M56.7129 317.242L22.337 339.038L20.6495 298.37L56.7129 317.242Z" fill="#06FF20"/>
        <path d="M57.7129 894.657L23.337 916.453L21.6495 875.784L57.7129 894.657Z" fill="#06FF20"/>
        <path d="M57.0776 396.788L40.2364 433.844L16.5658 400.731L57.0776 396.788Z" fill="#FF0B0B"/>
        <path d="M58.0776 974.203L41.2364 1011.26L17.5658 978.146L58.0776 974.203Z" fill="#FF0B0B"/>
        <path d="M58.66 522.045L17.9568 522.108L38.2532 486.827L58.66 522.045Z" fill="#051EFF"/>
        <path d="M59.66 1099.46L18.9568 1099.52L39.2532 1064.24L59.66 1099.46Z" fill="#051EFF"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="flag-left" viewBox="0 0 459 177" >
        <path d="M1 130.744C84.0931 121.5 291.944 82.4086 458.605 0" stroke="#8D8D8D" stroke-width="1.5"/>
        <path d="M57.0195 123.578C44.9043 132.838 24.4412 132.187 18.8295 130.064L47.5845 174.238L57.0195 123.578Z" fill="#FF0B0B"/>
        <path d="M119.72 110.63C108.105 120.51 87.6358 120.929 81.9208 119.102L112.945 161.714L119.72 110.63Z" fill="#FF710B"/>
        <path d="M183.319 98.8964C171.894 108.995 151.436 109.801 145.687 108.082L177.512 150.1L183.319 98.8964Z" fill="#FFF960"/>
        <path d="M247.65 81.2962C236.568 91.7713 216.149 93.2614 210.346 91.7361L243.559 132.665L247.65 81.2962Z" fill="#06FF20"/>
        <path d="M306.915 62.8578C296.182 73.6897 275.822 75.8468 269.973 74.512L304.506 114.333L306.915 62.8578Z" fill="white"/>
        <path d="M366.626 40.229C356.658 51.7691 336.494 55.3126 330.567 54.3808L367.741 91.7485L366.626 40.229Z" fill="#2963FA"/>
        <path d="M429.606 15.0859C419.502 26.5072 399.297 29.8118 393.382 28.8099L430.111 66.615L429.606 15.0859Z" fill="#B10BFF"/>
    </symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="flag-right" viewBox="0 0 747 144" >
        <path d="M746.162 98.8964C610.717 91.9037 271.912 62.3347 0.248308 0" stroke="#8D8D8D" stroke-width="1.5"/>
        <path d="M684.142 94.0336C697.178 102.081 717.633 99.4556 723.057 96.8001L698.461 143.549L684.142 94.0336Z" fill="#FF0B0B"/>
        <path d="M366.622 64.5341C379.143 73.3503 399.72 71.9591 405.294 69.6341L377.901 114.823L366.622 64.5341Z" fill="#07EEFD"/>
        <path d="M283.23 53.1751C295.567 62.2482 316.168 61.2826 321.789 59.0733L293.468 103.686L283.23 53.1751Z" fill="#FF710B"/>
        <path d="M520.648 79.62C533.347 88.1742 553.89 86.3554 559.415 83.915L532.956 129.665L520.648 79.62Z" fill="#FFF506"/>
        <path d="M38.4396 10.114C50.187 19.929 70.8074 20.2324 76.5552 18.3731L45.5115 61.1604L38.4396 10.114Z" fill="#06FF20"/>
        <path d="M195.227 38.5528C207.52 47.668 228.123 46.7704 233.753 44.5796L205.234 89.1042L195.227 38.5528Z" fill="white"/>
        <path d="M112.536 23.4669C124.296 33.2493 144.914 33.4928 150.658 31.6165L119.682 74.5008L112.536 23.4669Z" fill="#2963FA"/>
        <path d="M442.083 72.9151C454.595 81.7179 475.166 80.2994 480.74 77.9664L453.326 123.205L442.083 72.9151Z" fill="#B10BFF"/>
        <path d="M602.479 88.001C614.783 97.0915 635.381 96.1504 641.008 93.9473L612.552 138.538L602.479 88.001Z" fill="#33E906"/>
    </symbol>
</svg>

<?php get_footer();?>
