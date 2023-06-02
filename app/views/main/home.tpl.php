<div class="quote_container">
    <aside class="quote">
        <dl>
            <div class="author_box">
                <dt class="quote_author">Author:</dt>
                <dd></dd>
            </div>
            <div class="content_box">
                <dd class="quote_content"></dd>
            </div>
        </dl>
    </aside>
</div>
<div class="filters_meteo_container">
    <div class="filter_box_container">
        <div class="filter_box">
            <div class="filter_title_box">
                <p class="filter_title">Filters</p>
                <span class="arrow arrow_filter">&#8679;</span>
            </div>
            <p class="users_label">Users:</p>
            <form action="" method="POST">
                <select name="select_filter" class="filter_select">
                    <option value="-">-</option>
                    <?php foreach ($viewData["findUsers"] as $currentUser) : ?>
                        <option value="<?php echo $currentUser->getId(); ?>"><?php echo ucwords($currentUser->getName()); ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" class="filter_select_submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
    <aside class="meteo">
        <form id="search_bar" action="" method="POST">
            <input type="text" name="search" id="search" placeholder="">
            <button type="submit" class="submit_search_bar"><img src="./assets/images/magnifying_glass.png"></button>
        </form>
        <table>
            <tr>
                <td>Min. Temp.:</td>
                <td class="min_temp"></td>
            </tr>
            <tr>
                <td>Max. Temp.:</td>
                <td class="max_temp"></td>
            </tr>
            <tr>
                <td>Sunrise:</td>
                <td class="sunrise"></td>
            </tr>
            <tr>
                <td>Sunset:</td>
                <td class="sunset"></td>
            </tr>
            <tr>
                <td>Rain mm.:</td>
                <td class="rain"></td>
            </tr>
        </table>
        <p class="table_time"></p>
    </aside>
</div>

<div class="home_messages_container">
    <h2>Home messages</h2>
    <main class="home_messages">
        <?php foreach ($viewData["findMessages"] as $currentMessage) : ?>
            <article>
                <span class="name_message"><?php echo ucwords($currentMessage->name); ?></span><span class="border_span"></span>
                <p class="content_message"><?php echo $currentMessage->getContent(); ?></p>
                <p class="time_message">
                    <time datetime="<?php echo $currentMessage->getDate(); ?>"><?php echo $currentMessage->getDate(); ?></time>
                </p>

                <?php if ($currentMessage->name !== "invite1" && 
                              $currentMessage->name !== "invite2" &&
                              $currentMessage->name !== "invite3" &&
                              $_SESSION["userName"] == $currentMessage->name) :
                ?>
                    <div class="form_delete_box">
                        <form action ="" method="DELETE">
                            <button name="delete_submit" class="button_delete_mess" type="submit">X</button>
                        </form>
                        <span class="span_tick">&#10003;</span>
                        <span class="span_cross">X</span>
                    </div>
                <?php endif; ?>

                <input class ="id_mess" type="hidden" name="id_mess" value="<?php echo base64_encode($currentMessage->getId()); ?>">

            </article>
        <?php endforeach; ?>
        <button type="submit" class="load_more">Load more</button>
    </main>
</div>