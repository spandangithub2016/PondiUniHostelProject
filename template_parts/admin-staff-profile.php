<?php
$profile_fields = get_post_custom($admin_staff->ID);
// $profile_pic_id = get_post_thumbnail_id( $admin_staff );
// $alt = get_post_meta($profile_pic_id, '_wp_attachment_image_alt', true);
?>
<article class="admin-staff-profile">
    <header>
        <h1><?php echo $admin_staff->post_title ?></h1>
        <img class="admin-profile-pic center-block" src="<?php echo get_the_post_thumbnail_url( $admin_staff->ID, $size = 'full' ) ?>" alt="Image contains photo of <?php echo $admin_staff->post_title ?>">
    </header>
    <section>
        <h1><?php echo $profile_fields['staff_name'][0] ?></h1>
        <h2><?php echo $profile_fields['academic_post'][0] ?></h2>
        <h3><?php echo $profile_fields['department'][0] ?></h3>
        <hr>
        <p><b>Email : </b><a href="mailto:<?php echo $profile_fields['email_id'][0] ?>"><?php echo $profile_fields['email_id'][0] ?></a></p>
        <p><b>Intercom</b> : <?php echo $profile_fields['intercom_number'][0] ?></p>
        <p><b>Office Phone &amp; Fax :</b></p>
            <?php $contacts = explode(",", $profile_fields['office_phone'][0]);
                foreach($contacts as $contact) {
                    echo "<p class='text-center'>" . trim($contact) . " <a class='btn btn-sm btn-default' href='tel:" . trim($contact) ."' alt='Call Number'>Call</a><br></p>";
                }
            ?>
        <p><b>Mobile :</b></p>
        <?php $contacts = explode(",", $profile_fields['mobile'][0]);
            foreach($contacts as $contact) {
                echo "<p class='text-center'>" . trim($contact) . " <a class='btn btn-sm btn-default' href='tel:" . trim($contact) ."' alt='Call Number'>Call</a><br></p>";
            }
        ?>
    </section>
</article>
