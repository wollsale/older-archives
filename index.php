<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alexis Wollseifen</title>
    <link href="<?php echo get_bloginfo('template_directory'); ?>/dist/style.css" rel="stylesheet">
</head>
<body>
    
    <header class="header" >
        <div class="header_content">
            <h2>Designer &</br> développeur</br>basé à Montréal.</h2>
            <p>Passionné par les </br>interfaces et comment </br><span>les humains les utilisent</span>.</p>
        </div>
    </header>


    <?php
        $break_after = 3;
        $counter = 0;
        $args = array( 
            'post_type'   => 'post',
            'order'       => 'rand',
            'orderby'    => 'rand',
        );
        $projects = new WP_Query( $args );
    ?>

    <main role="main" class="container">
        <div class="content">
            <!-- Display Post Here -->
            <?php if ( $projects->have_posts() ) : ?>

            <?php 
                $limit = 3;
                $counter = 0;    
            ?>
            
                <!-- LOOP -->
                <?php while( $projects->have_posts() ) : $projects->the_post() ?>      
                    
                    <?php 
                        $counter++;

                        if ($counter == 1) : echo "<ul class='projects_list'>"; endif
                    ?>

                    <!-- if thumbnail -->
                    <?php if ( has_post_thumbnail() ) :?>
                        <li class="projects_item project <?php echo $counter?>">
                            <figure class="project_image">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>">
                            </figure>
                        </li>
                    <?php endif ?>
                    <!-- Endif -->
                        
                    <?php 
                        if ($counter == 3) : echo "</ul>"; $counter = 0; endif
                    ?>

                <!-- LOOP -->
                <?php endwhile ?>

                <?php else : ?>
                <!-- Content If No Posts -->
                <h1>no posts.</h1>
            <?php endif ?>
        </div>
    </main>

</body>
</html>