<a class="list-el" href="<?php echo isset($cat->term_id) ? get_category_link($cat->term_id) : '#'; ?>" data-aos="fade-up">
    <span class="el-inner slide-up">
        <h3 class="cbo-title-4 el-title slide-up">
            <?php echo isset($cat->name) ? $cat->name : ''; ?>
        </h3>
    </span>
</a>