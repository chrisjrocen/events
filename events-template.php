<?php
get_header();

$post_id = get_the_ID();

?>

<h1><?php echo esc_html(the_title()); ?></h1>
<h4>Location</h4>
<?php the_content(); ?>
<p><strong>Start Date:</strong> <?php echo get_field('start_date'); ?></p>

<!--RSVP Form-->

<form action="<?php echo plugins_url() . '/events/form.php'; ?>" method="POST" enctype="multipart/form-data">

    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="hidden" name="id" value="<?php echo $post_id; ?>">

    <input type="hidden" name="title" value="<?php echo the_title(); ?>"><br>


    <button type="submit" id="submit-btn">Submit</button>

</form>