<?php

get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="section">
                <div class="container">
                    <div id="notfound">
                        <div class="notfound">
                            <div class="notfound-404">
                                <h1>Oops!</h1>
                            </div>
                            <h2>404 - Page not found</h2>
                            <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                            <a class="btn w-button" href="<?php echo get_home_url(); ?>">Go To Homepage</a>
                        </div>
                    </div>
                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
?>