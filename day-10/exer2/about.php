<?php
$about = [
    'firstname' => 'Saif',
    'lastname' => 'Qatran',
    'email' => 'saif23qut@gmail.com',
    'address' => 'Yemen - Seyiun - Cinema St',
    'phone' => '+967779021401',
    'description' => 'I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.'
];
?>
<section class="resume-section" id="about">
    <div class="resume-section-content">
        <h1 class="mb-0">
            <?= $about['firstname'] ?>

            <span class="text-primary"><?= $about['lastname'] ?></span>
        </h1>
        <div class="subheading mb-5">
            <?= $about['address'] ?> · <?= $about['phone'] ?> ·
            <a href="mailto:<?= $about['email'] ?>"><?= $about['email'] ?></a>
        </div>
        <p class="lead mb-5"><?= $about['description'] ?></p>
        <div class="social-icons">
            <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
            <a class="social-icon" href="#!"><i class="fab fa-github"></i></a>
            <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
            <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a>
        </div>
    </div>
</section>
<hr class="m-0" />