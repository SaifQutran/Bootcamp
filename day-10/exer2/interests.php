<?php
$interests =
    [
        "Apart from being a web developer, I enjoy most of my time being outdoors. During the year here in Seyiun, I enjoy biking, free running, and playing soccer.",
        "When forced indoors, I follow a number of Comedy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technology advancements in the front-end web development world.",
        "A big part of my life is releigous siences, I read a number of books in that fields and attend reasonable amount of lessons through my city."
    ];
?>
<section class="resume-section" id="interests">
    <div class="resume-section-content">
        <h2 class="mb-5">Interests</h2>
        <?php foreach ($interests as $interest) { ?>
            <p class="mb-0"><?= $interest ?></p>
        <?php } ?>
    </div>
</section>