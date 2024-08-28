<?php $awards_certifications = [
    "Google Analytics Certified Developer",
    "Mobile Web Specialist - Google Certification",
    "1st Place - University of Colorado Boulder - Emerging Tech Competition 2009",
    "1st Place - University of Colorado Boulder - Adobe Creative Jam 2008 (UI Design Category)",
    "2nd Place - University of Colorado Boulder - Emerging Tech Competition 2008",
    "1st Place - James Buchanan High School - Hackathon 2006",
    "3rd Place - James Buchanan High School - Hackathon 2005"
]; ?>

<section class="resume-section" id="awards">
    <div class="resume-section-content">
        <h2 class="mb-5">Awards & Certifications</h2>
        <ul class="fa-ul mb-0">
            <?php foreach ($awards_certifications as $ac) { ?>
                <li>
                    <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                    <?= $ac ?>
                </li>
            <?php } ?>
        </ul>

    </div>
</section>