<article <?php post_class('lesson-detail'); ?>>
    <?php $course_id = get_post_meta( get_the_ID(), '_edr_course_id', true ); ?>
    <div class="sticky-v-wrapper clearfix">
        
        <div class="course-lesson-content-wrapper">
            <div class="course-lesson-content">
                <div class="clearfix entry-content <?php echo !empty($thumb) ? '' : 'no-thumb'; ?>">
                    <div class="info">
                        <?php if (get_the_title()) { ?>
                            <h4 class="entry-title">
                                <?php the_title(); ?>
                            </h4>
                        <?php } ?>
                    </div>
                    <div class="entry-thumb <?php echo (!has_post_thumbnail() ? 'no-thumb' : ''); ?>">
                        <?php
                            $thumb = studylms_post_thumbnail();
                            echo trim($thumb);
                        ?>
                    </div>
                    <div class="info-bottom">
                        <?php the_content(); ?>
                    </div>
                
                    <?php 
                    the_post_navigation( array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'studylms' ) . '</span> ' .
                            '<span class="pull-right navi">' . esc_html__( 'Next post:', 'studylms' ) . '<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span> ' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'studylms' ) . '</span> ' .
                            '<span class="pull-left navi"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>' . esc_html__( 'Previous post:', 'studylms' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                    ) );
                    ?>
                </div>
            </div>
        </div>
    </div>
</article>