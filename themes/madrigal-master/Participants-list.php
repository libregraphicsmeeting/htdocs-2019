<?php /*
    Template Name: Partipants-list */
?>

<?php
function show_form_entries()
{
    $args = [
        'numberposts' => -1,
        'post_type'   => 'wplf-submission',
        'meta_key'   => '_form_id',
        'meta_value' => [663,169],
    ];

    $latest_books = get_posts( $args );

    $output_entries = [];
    $i = 0;
    foreach ($latest_books as $post) {
        // echo("<pre>".print_r($post, 1)."</pre>");
        $meta = get_post_meta($post->ID);
        // echo("<pre>".print_r($meta, 1)."</pre>");
        $i++;
        if ($meta['project'][0]) {
            $output_entries[] = strtr("<li>:firstname :lastname, :project</li>", [
                ':firstname' => $meta['firstname'][0],
                ':lastname' => $meta['lastname'][0],
                ':project' => $meta['project'][0],
                ]);
        } else {
            $output_entries[] = strtr("<li>:firstname :lastname</li>", [
                ':firstname' => $meta['firstname'][0],
                ':lastname' => $meta['lastname'][0],
                ]);
        }

    }

    // echo("<pre>".print_r($i, 1)."</pre>");
    // echo("<pre>".print_r($output_entries, 1)."</pre>");
    echo("<ul class=\"participants-list\">\n".implode("\n", $output_entries)."</ul>\n");
}
?>

<?php get_header(); ?>

<?php
    global $post,$wooinstalled, $fullwidth, $vc_is_active, $thisissinglepage;

    $postid = $post->ID;

    $postmetapage = nor_get_page_meta('post-meta',$postid);

    if ( have_posts() ) the_post();

    $sidebarok=0;

    if(isset($postmetapage['northeme-show-sidebar']) && $postmetapage['northeme-show-sidebar']==1 && !$vc_is_active) {
        $sidebarok=1;
    }

    /// Sidebar
    if(is_active_sidebar( 'page-right' ) && $sidebarok) {
        $fullclass = "page-with-sidebar";
    }else{
        $fullclass = "standardpage";
        $sidebarok = 0;
    }
?>

     <div class="<?php echo $fullclass; if($vc_is_active) { echo 'nor-vc-container'; }?>">
        <?php if(!$thisissinglepage) { echo nor_page_container(); } ?>

            <article class="the_content page-content <?php if(!$vc_is_active) echo ' sixteen columns'; ?>">
                            <?php
                                if($thisissinglepage) {
                                    echo '<div id="fullpage-container">';
                                    echo nor_page_header();
                                                        the_content();
                                    echo '</div>';
                                }else{
                                    the_content();
                                    show_form_entries();
                                }
                            ?>
            </article>

     </div>

     <?php
        if(isset($sidebarok) && $sidebarok==1) {
            get_template_part( 'sidebar', 'page' );
        }
     ?>


<?php get_footer(); ?>
