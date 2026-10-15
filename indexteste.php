<?php get_header(); ?>

    <!-- Menu Secundário / Acesso Rápido Institucional -->
    <aside class="secondary_menu container pb-2 pt-4">
        <div class="row g-3">
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <a href="https://fundart.com.br/pnab/">
                    <article class="text-center text-white p-3 mb-2 rounded shadow-sm bg-light border" style="min-height:115px; display:flex; align-items:center; justify-content:center;">
                        <img src="/wp-content/themes/fundart/images/home/fundart_pnab_logo_home.png" alt="PNAB Aldir Blanc" style="max-width:100%; height:auto;" />
                    </article>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <a href="<?php echo esc_url(get_site_url()); ?>/category/lei-paulo-gustavo/">
                    <article class="bg-purple text-center text-white p-3 mb-2 rounded shadow-sm card-hover">
                        <i class="fas fa-film mb-2"></i>
                        <h3 class="pt-1">Lei Paulo Gustavo</h3>
                    </article>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <a href="<?php echo esc_url(get_site_url()); ?>/transparencia/">
                    <article class="bg-yellow text-center text-white p-3 mb-2 rounded shadow-sm card-hover">
                        <i class="far fa-eye mb-2"></i>
                        <h3 class="pt-1">Portal da Transparência</h3>
                    </article>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <a href="<?php echo esc_url(get_site_url()); ?>/editais/">
                    <article class="bg-blue text-center text-white p-3 mb-2 rounded shadow-sm card-hover">
                        <i class="fas fa-book-open mb-2"></i>
                        <h3 class="pt-1">Editais</h3>
                    </article>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <a href="<?php echo esc_url(get_site_url()); ?>/institucional/conselho-municipal-de-politica-cultural">
                    <article class="bg-green text-center text-white p-3 mb-2 rounded shadow-sm card-hover">
                        <i class="fas fa-pencil-alt mb-2"></i>
                        <h3 class="pt-1">Sistema Municipal de Cultura</h3>
                    </article>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <a href="<?php echo esc_url(get_site_url()); ?>/imprensa/">
                    <article class="bg-red text-center text-white p-3 mb-2 rounded shadow-sm card-hover">
                        <i class="fas fa-bullhorn mb-2"></i>
                        <h3 class="pt-1">Imprensa</h3>
                    </article>
                </a>
            </div>
        </div>
    </aside>

    <!-- Destaque Principal (Última Notícia / Banner) -->
    <section class="main_slider container pb-4 pt-2">
        <div class="row g-0 rounded shadow-sm overflow-hidden bg-white border">
            <?php
                $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 1));
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
            ?>
                <div class="col-md-6 col-12 slide_info p-4 p-md-5 d-flex flex-column justify-content-center">
                    <h2 class="mb-3 fw-bold text-dark"><?php the_title(); ?></h2>
                    <p class="mb-4 text-muted"><?php the_excerpt(); ?></p>
                    <div>
                        <a href="<?php the_permalink(); ?>" class="btn sq-btn">Ver Mais</a>
                    </div>
                </div>
                <div class="col-md-6 col-12 slide_img" style="background: url('<?php the_post_thumbnail_url(); ?>') center/cover no-repeat; min-height: 320px;"></div>
            <?php
                    }
                }
                wp_reset_postdata();
            ?>
        </div>
    </section>

    <!-- Últimas Notícias (Grid de 3 colunas) -->
    <section class="latest_posts container pb-4 pt-3">
        <div class="row">
            <?php
                $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'offset' => 1));
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
            ?>
                <article class="col-md-4 col-sm-12 mb-4">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none h-100 d-block bg-white rounded shadow-sm overflow-hidden border">
                        <div class="post_thumb" style="background-image: url(<?php the_post_thumbnail_url(); ?>);"></div>
                        <div class="p-3">
                            <h2 class="h5 mb-2 text-dark fw-bold"><?php the_title(); ?></h2>
                            <p class="text-muted small mb-0"><?php the_excerpt(); ?></p>
                        </div>
                    </a>
                </article>
            <?php
                    }
                }
                wp_reset_postdata();
            ?>
        </div>
        <div class="row mt-2">
            <div class="container text-center">
                <a href="<?php echo esc_url(get_site_url()); ?>/noticias" class="btn bg-purple text-white text-uppercase sq-btn">Ver Todas</a>
            </div>
        </div>
    </section>

    <!-- Oficinas -->
    <?php
    $the_query = new WP_Query(array(
        'post_type' => 'oficinas',
        'posts_per_page' => 3
    ));
    if ( $the_query->have_posts() ) {
    ?>
    <section class="latest_oficinas container pb-4 pt-3">
        <h3 class="text-center text-uppercase fw-bold mt-4 mb-4 text-dark" style="letter-spacing: 0.5px;">Oficinas</h3>
        <div class="row">
            <?php
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
            ?>
            <article class="col-md-4 col-sm-12 mb-4">
                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                    <div class="oficina_item mb-3 rounded overflow-hidden shadow-sm position-relative border" style="background-image: url(<?php the_post_thumbnail_url() ?>); height: 240px; background-size: cover; background-position: center;">
                        <h2 class="position-absolute bottom-0 w-100 text-white p-3 m-0 fs-6 fw-bold"><?php the_title(); ?></h2>
                    </div>
                </a>
            </article>
            <?php
                }
            ?>
        </div>
        <div class="row">
            <div class="container text-center">
                <a href="<?php echo esc_url(get_site_url()); ?>/oficinas" class="btn bg-purple text-white sq-btn mt-2 mb-4">Ver Todas</a>
            </div>
        </div>
    </section>
    <?php
    }
    wp_reset_postdata();
    ?>

    <!-- Setores Institucionais -->
    <section class="setores text-center pb-4 pt-4 mb-5 rounded shadow-sm text-white" style="background-color: #004a80;">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-md-5 col-sm-6 mb-3 mb-sm-0">
                    <a href="<?php echo esc_url(get_site_url()); ?>/dt_portfolio/banda-lira-padre-anchieta/" class="text-decoration-none">
                        <div class="bg-white setor_item p-3 rounded shadow-sm text-dark fw-bold">
                            <h4>Banda Lira Padre Anchieta</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-5 col-sm-6">
                    <a href="<?php echo esc_url(get_site_url()); ?>/dt_portfolio/projeto-guri" class="text-decoration-none">
                        <div class="bg-white setor_item p-3 rounded shadow-sm text-dark fw-bold">
                            <h4>Projeto Guri</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Associações / Espaços Culturais -->
    <section class="associacoes text-center pb-4 pt-3 mt-3">
        <div class="container">
            <div class="row">
                <?php
                $the_query = new WP_Query(array(
                    'post_type' => 'dt_portfolio',
                    'post__in' => array( 701, 718, 699, 715),
                    'posts_per_page' => 4,
                    'orderby' => 'rand',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'dt_portfolio_category',
                            'field'    => 'slug',
                            'terms'    => 'espacos-culturais',
                        ),
                    ),
                ));
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                ?>
                <div class="col-md-3 col-sm-6 mb-4">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                        <div class="box-associacao bg-white rounded shadow-sm p-4 h-100 border">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="Espaço Cultural" title="<?php the_title(); ?>" class="mb-3 rounded-circle shadow-sm" style="width: 90px; height: 90px; object-fit: cover;">
                            <h2 class="text-uppercase fs-6 fw-bold mt-2 text-dark"><?php the_title(); ?></h2>
                        </div>
                    </a>
                </div>
                <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="row mt-4">
                <div class="container text-center">
                    <a href="<?php echo esc_url(get_site_url()); ?>/associacoes" class="btn bg-purple text-white sq-btn">Ver Todas</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter pb-5 pt-5 mt-4 text-white" style="background: linear-gradient(rgba(0,42,75,0.9), rgba(0,42,75,0.9)), url('images/newsletter_bg.jpg') center/cover;">
        <div class="container footer_menu">
            <h2 class="text-center text-white text-uppercase mb-2 fw-bold">Não perca nada</h2>
            <p class="text-center text-white mb-4 opacity-75">Cadastre seu nome e e-mail para receber informações na hora que elas saem</p>
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div id="newsletterwidget-3">
                        <form method="post" action="https://fundart.com.br/?na=s" onsubmit="return newsletter_check(this)">
                            <input type="hidden" name="nr" value="widget">
                            <input type="hidden" name="nl[]" value="0">
                            <input type="email" name="ne" required class="tnp-email form-control newsletter_input mb-3 rounded px-4 py-2" placeholder="Seu melhor e-mail">
                            <input type="submit" value="Quero Me Atualizar Agora" class="tnp-submit newsletter_btn bg-yellow text-white text-uppercase rounded fw-bold py-3 shadow-sm border-0">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>