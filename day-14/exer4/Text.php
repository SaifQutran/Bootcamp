<!DOCTYPE html>
<?php include 'head.html' ?>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<script>
    class generalButton {
        constructor(buttonType) {
            this.selfButton = document.createElement('button');
            this.selfButton.classList.add('btn', 'btn-dark', 'btn-sm', 'm-1');
            var buttonSymbol = document.createElement('i');
            buttonSymbol.classList.add('fa', 'fa-' + buttonType);
            buttonSymbol.style.cssText = "font-size:1.2rem;";
            this.selfButton.appendChild(buttonSymbol);
        }
    }

    function copyAyah(ayahId) {
        // Get the text field
        var copyText = document.getElementById(ayahId);
        console.log(ayahId);
        // Select the text field


        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.innerHTML);
    }
    class copyButton extends generalButton {
        constructor(ayahId) {

            super('copy');
            this.ayahId = ayahId;
            this.selfButton.setAttribute('onclick', "copyAyah('" + ayahId + "')");

        }

    }

    function playAyah(ayahId) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            var data = JSON.parse(this.responseText);
            var audio = document.getElementById('audio');
            var audSource = document.getElementById('audioSource');
            console.log(data.data.audio);   
            audSource.src = data.data.audio;
            audio.load();
            audio.play();
        };
        xmlhttp.open(
            "GET",
            "https://api.alquran.cloud/v1/ayah/" + ayahId + "/ar.alafasy"
        );
        xmlhttp.send();
    }
    class playButton extends generalButton {
        constructor(ayahId) {

            super('play');
            this.ayahId = ayahId;
            this.selfButton.setAttribute('onclick', "playAyah('" + ayahId + "')");

        }

    }

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function setWerd(ayahId) {
        setCookie('werd', ayahId, 7);
    }
    class werdButton extends generalButton {


        constructor(ayahId) {
            super('bookmark');
            this.ayahId = ayahId;
            this.selfButton.setAttribute('onclick', "setWerd('" + ayahId + "')");
        }
    }
    class translateButton extends generalButton {
        constructor() {
            super('globe');
            //this.selfButton.href = 'copt' + to;
        }
    }

    class tafserButton extends generalButton {
        constructor() {
            super('book');
            //this.selfButton.href = 'copt' + to;
        }
    }
</script>

<body>
    <?php include 'nav.html'; ?>
    <?php
    error_reporting(E_ERROR);
    $data = file_get_contents("http://api.alquran.cloud/v1/surah");
    $soras = json_decode($data);
    for ($sora = 1; $sora < 115; $sora++) {
    ?>
        <div onclick="getAyahs(this,<?= $sora ?>)" onmouseenter="forOnEnter(this)" onmouseleave="forOnLeave(this)" class="textSoraContainer" id="ts<?= $sora ?>">
            <div class="soraDetail" style="padding:3px 0px">
                <audio id="audio" controls="controls" autoplay style="display:none;">
                    <source src="" id="audioSource" type="audio/mp3">
                </audio>

                <p class="soraName"> <?= $soras->data[$sora - 1]->name ?></p>
                <p class="soraRevelation"><?= $soras->data[$sora - 1]->revelationType == "Meccan" ? "مكية" : "مدنية" ?></p>
                <p class="ayasAmount">عدد الآيات: <?= $soras->data[$sora - 1]->numberOfAyahs ?></p>
            </div>
            <script>
                var holder = '<?= $sora ?>';
                String.prototype.toIndiaDigits = function() {
                    var id = ['۰', '۱', '۲', '۳', '٤', '٥', '٦', '۷', '۸', '۹'];
                    return this.replace(/[0-9]/g, function(w) {
                        return id[+w]
                    });
                }
            </script>
            <div class="textSoraNumBackground" id="textSoraNumBackground<?= $sora ?>">
                <script>
                    document.getElementById('textSoraNumBackground<?= $sora ?>').innerHTML = holder.toIndiaDigits();
                    document.addEventListener("DOMContentLoaded", function() {
                        var soraNumBackground = document.getElementById("textSoraNumBackground<?= $sora ?>");
                        var soraNum = <?= $sora ?>;

                        if (soraNum >= 100) {
                            soraNumBackground.style.fontSize = "80px"; // Adjust font size for larger numbers
                            soraNumBackground.style.right = "-5%"; // Adjust font size for larger numbers
                        } else if (soraNum >= 10)
                            soraNumBackground.style.right = "-5%"; // Adjust font size for larger numbers

                    });

                    function forOnEnter(e) {
                        var bigNumber = e.querySelectorAll('div')[1];
                        bigNumber.style.color = 'white';

                    }

                    function forOnLeave(e) {
                        var bigNumber = e.querySelectorAll('div')[1];
                        bigNumber.style.color = 'rgb(57,57,57)';
                    }



                    function getAyahs(soraContainer, soraNumber) {
                        soraContainer.onclick = "";
                        var ayahsContainer = soraContainer.querySelectorAll('div')[2];
                        const xmlhttp = new XMLHttpRequest();
                        xmlhttp.onload = function() {
                            var sora = JSON.parse(this.responseText);
                            for (var ayah = 0; ayah < sora.data.numberOfAyahs; ayah++) {
                                var newDiv = document.createElement("div");
                                newDiv.classList.add('ayah');
                                newDiv.style.cssText = " margin:15px 20px 15px 0px; direction:rtl; text-align: right;font-size: 2rem;font-family: Arial, Helvetica, sans-serif;";
                                var newContent = document.createTextNode(sora.data.ayahs[ayah].text);
                                var ayahText = document.createElement("p");
                                ayahText.style.cssText = "display:inline;";
                                ayahText.appendChild(newContent);
                                newDiv.appendChild(ayahText);
                                var ayahApart = document.createElement('span');
                                var ayahNumber = (ayah + 1).toString();
                                ayahText.id = "ayah-" + sora.data.number + '-' + ayahNumber;
                                ayahApart.appendChild(document.createTextNode(ayahNumber.toIndiaDigits()));
                                ayahApart.classList.add('ayahsApart');
                                ayahsContainer.appendChild(newDiv);
                                newDiv.appendChild(ayahApart);
                                var buttonsDiv = document.createElement('div');
                                buttonsDiv.style.cssText = "display:inline; padding-right:10px;";
                                newDiv.appendChild(buttonsDiv);
                                var ayahID = "ayah-" + sora.data.number + '-' + ayahNumber
                                var holdButton = new playButton(sora.data.number + ':' + ayahNumber);
                                buttonsDiv.appendChild(holdButton.selfButton);
                                holdButton = new copyButton(ayahID);
                                buttonsDiv.appendChild(holdButton.selfButton);
                                holdButton = new translateButton();
                                buttonsDiv.appendChild(holdButton.selfButton);
                                holdButton = new tafserButton()
                                buttonsDiv.appendChild(holdButton.selfButton);
                                holdButton = new werdButton(ayahID)
                                buttonsDiv.appendChild(holdButton.selfButton);
                            }
                            //alert('textSoraNumBackground' + soraNumber);
                            var number = document.getElementById('textSoraNumBackground' + soraNumber);
                            number.style.top = '50px';

                        };
                        xmlhttp.open(
                            "GET",
                            "http://api.alquran.cloud/v1/surah/" + soraNumber);
                        xmlhttp.send();
                    }
                </script>
            </div>

            <div class="soraAyahs">

            </div>
        </div>
    <?php } ?>
</body>
<?php include "foot.html"; ?>