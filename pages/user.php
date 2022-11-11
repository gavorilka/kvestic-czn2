        <?php if(isset($_SESSION["user"]) && $_SESSION["user"]->status == 1): ?>
        <section class="article-container">
            <form class="post">
                <h3>Администрирование</h3>
                <input class="form-input" type="text" name="siteName" placeholder="Новое название сайта">

                <input class="form-input" type="number" name="paginationCount" placeholder="Количество отображаемых постов на странице">
                <div class="file-container">
                    <label class="file-label" for="siteLogo">
                      <i class="material-icons">attach_file</i>
                      <span class="title">Новый логотип</span>
                      <input class="form-input" type="file" name="siteLogo" id="siteLogo">
                    </label>
                </div>
                <button class="form-button primary">Изменить</button>
            </form>
        </section>
        <?php endif; ?>
        <section class="article-container">
            <article class="post">
                <div>
                    <a class="form-button info" href="add.html">Редактировать</a>
                    <a class="form-button danger" href="?del">Удалить</a>
                </div>
                <header class="post__heading">
                    <h2 class="post__title">Title example</h2>
                    <h3 class="post__subtitle">Subtitle example</h3>
                    <p class="post__login">login@loginovich</p>
                    <p class="post__date">12.12.2012</p>
                </header>
                <figure class="post__img">
                    <img class="post__img" alt="example" src="img/posts/1.jpeg">
                </figure>
                <p class="post__annotation">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid architecto aspernatur delectus deserunt eaque eos in maxime neque perspiciatis quas quia quidem quis, quos, reiciendis sunt tempore tenetur. Numquam?</p>
            </article>
        </section>
