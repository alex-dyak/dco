<div class="profile">
    <!-- Title of profile content block-->
    <h1><?php the_sub_field('title'); ?></h1>
    <div class="profile-main">
        <!-- Main content -->
        <div class="profile-content">
            <?php the_sub_field('main_content'); ?>
        </div>

        <!-- Right Side Content -->
        <div class="profile-sidebar">
            <?php the_sub_field('right_side_content'); ?>
        </div>
    </div>
</div>
