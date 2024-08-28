<?php
$technologies = [
    'html5',
    'css3-alt',
    'github',
    'php',
    'java',
    'react',
    'bootstrap',
    'java',
    'wordpress',
    'laravel',
    'node-js',
    'asp'    
];

$skills = [
    "Mobile-First, Responsive Design",
    "Cross Browser Testing & Debugging",
    "Cross Functional Teams",
    "Agile Development & Scrum"
];
?>
<section class="resume-section" id="skills">
    <div class="resume-section-content">
        <h2 class="mb-5">Skills</h2>
        <div class="subheading mb-3">Programming Languages & Tools</div>
        <ul class="list-inline dev-icons">
            <?php foreach ($technologies as $technology) { ?>
                <li class="list-inline-item"><i class="fab fa-<?= $technology ?>"></i></li>
            <?php } ?>
        </ul>
        <div class="subheading mb-3">Workflow</div>
        <ul class="fa-ul mb-0">
            <?php foreach ($skills as $skill) { ?>
                <li>
                    <span class="fa-li"><i class="fas fa-check"></i></span>
                    <?= $skill ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>
<hr class="m-0" />