<?php
$education = [
    [
        "institution" => "University of Colorado Boulder",
        "program" => "Bachelor of Science",
        "field" => "Computer Science - Web Development Track",
        "gpa" => "3.23",
        "date" => "August 2006 - May 2010"
    ],
    [
        "institution" => "James Buchanan High School",
        "program" => "Technology Magnet Program",
        "field" => " ",
        "gpa" => "3.56",
        "date" => "August 2002 - May 2006"
    ]
];

?>
<section class="resume-section" id="education">
    <div class="resume-section-content">
        <h2 class="mb-5">Education</h2>
        <?php foreach ($education as $edu) { ?>
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0"><?= $edu['institution'] ?></h3>
                    <div class="subheading mb-3"><?= $edu['program'] ?></div>
                    <div><?= $edu['field'] ?></div>
                    <p>GPA: <?= $edu['gpa'] ?></p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary"><?= $edu['date'] ?></span></div> 
            </div>

        <?php } ?>
    </div>
</section>
<hr class="m-0" />