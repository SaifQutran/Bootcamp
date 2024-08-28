<!DOCTYPE html>
<?php include 'head.html' ?>
    <body>
        <?php include 'nav.html'; ?>
        <div id="playingSora" style="direction:rtl">
            <p id="playingSoraName">اختر سورة ليتم تشغيلها</p>

            <audio id="audio" controls="controls" autoplay style="display:none;">
                <source src="" id="audioSource" type="audio/mp3">
            </audio>

            <div class="controls">
                <button id="playButton"><i class="fas fa-play"></i></button>
                <button id="stopButton"><i class="fas fa-pause"></i></button>
            </div>


            <div class="reciters">
                <input onchange="selectReciter(this)" onfocus="this.value=''" list="recitersList" id="reciters" name="reciters" placeholder="القارئ" value="محمود خليل الحصري" />
                <datalist id="recitersList">
                    <option value="محمود خليل الحصري"></option>
                    <option value="محمد صديق المنشاوي"></option>
                    <option value="سعود الشريم"></option>
                    <option value="عبدالله بصفر"></option>
                    <option value="علي جابر"></option>
                </datalist>
            </div>
            <div id="recieterImage"></div>
            <input type="range" id="timeline" value="0" max="100">
        </div>

        <script>
            // var img = 'assets/محمود الحصري.jpg';
            var selectedReciter = [215, 'assets/محمود الحصري.jpg'];
            document.getElementById('recieterImage').style.background = "url('" + selectedReciter[1] + "')";
            document.getElementById('recieterImage').style.backgroundSize = "cover";

            const reciters = {
                'محمود خليل الحصري': [215, 'assets/محمود الحصري.jpg'],
                "سعود الشريم": [86, 'assets/سعود الشريم.jpg'],
                'علي جابر': [164, 'assets/علي جابر.jpg'],
                'محمد صديق المنشاوي': [205, 'assets/محمد المنشاوي.jpg'],
                'عبدالله بصفر': [141, 'assets/عبدالله بصفر.jpg']
            };

            function selectReciter(that) {

                //console.log(that.value);
                console.log(reciters[that.value][0]);
                selectedReciter = reciters[that.value];
                console.log(selectedReciter);
                document.getElementById('recieterImage').style.background = "url('" + reciters[that.value][1] + "')";
                document.getElementById('recieterImage').style.backgroundSize = 'cover';

            }

            const audio = document.getElementById('audio');
            const playButton = document.getElementById('playButton');
            const stopButton = document.getElementById('stopButton');
            const timeline = document.getElementById('timeline');

            playButton.addEventListener('click', () => {
                audio.play();
            });

            stopButton.addEventListener('click', () => {
                audio.pause();
                //audio.currentTime = 0;
            });

            audio.addEventListener('timeupdate', () => {
                const value = (audio.currentTime / audio.duration) * 100;
                timeline.value = value;
            });

            timeline.addEventListener('input', () => {
                const time = (timeline.value / 100) * audio.duration;
                audio.currentTime = time;
            });
        </script>


        </html>

        <script>

        </script>

        <?php
        error_reporting(E_ERROR);
        $x = file_get_contents("http://api.alquran.cloud/v1/surah");
        $x = json_decode($x);
        // var_dump($x->data[0]);
        // $dir = $x->reciters[216]->Server;
        $m = 1;
        for ($i = 1; $i < 115; $i++) {
            if ($m == 4) $m = 1;
            else $m++;
        ?>
            <div class="soraContainer back back<?= $m ?>" onclick="op(this)" id="s<?= $i ?>">
                <i class="fa-solid fa-play playButton"></i>
                <div class="soraDetail">
                    <p class="soraName"><?= $x->data[$i - 1]->name ?></p>
                    <p class="soraRevelation"><?= $x->data[$i - 1]->revelationType == "Meccan" ? "مكية" : "مدنية" ?></p>
                    <p class="ayasAmount">عدد الآيات: <?= $x->data[$i - 1]->numberOfAyahs ?></p>
                </div>
                <script>
                    var holder = '<?= $i ?>';
                    String.prototype.toIndiaDigits = function() {
                        var id = ['۰', '۱', '۲', '۳', '٤', '٥', '٦', '۷', '۸', '۹'];
                        return this.replace(/[0-9]/g, function(w) {
                            return id[+w]
                        });
                    }
                </script>
                <div class="soraNumBackground" id="soraNumBackground<?= $i ?>">
                    <script>
                        document.getElementById('soraNumBackground<?= $i ?>').innerHTML = holder.toIndiaDigits();
                    </script>
                </div>
            </div>
    </body>

    </html>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var soraNumBackground = document.getElementById("soraNumBackground<?= $i ?>");
            var soraNum = <?= $i ?>;

            if (soraNum >= 100) {
                soraNumBackground.style.left = "9%"; // Adjust font size for larger numbers
            } else if (soraNum >= 10)
                soraNumBackground.style.left = "6%"; // Adjust font size for larger numbers

        });
    </script>




<?php }

?>
<script>
    var last;

    function stopTheBig() {
        var playingSora = document.getElementById('playingSora');
        playingSora.style.background = 'azure'
        playingSora.style.borderRadius = '30px';

    }

    function playingOnThebig() {
        var playingSora = document.getElementById('playingSora');
        playingSora.style.background = "url('https://i.giphy.com/media/v1.Y2lkPTc5MGI3NjExczR5dDJuZDMwZTNqeWluejZueDR6aGswZ252eWR2NTJudHVuNTBiYyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/dYtHPYJxZblCcWPwcQ/giphy.gif')";
        playingSora.style.backgroundSize = 'cover';
        playingSora.style.borderRadius = '15px';
    }

    function op(that) {
        var id = that.id;
        if (last != that) {
            document.querySelector('body').style.backgroundColor = that.style.backgroundColor;
            that.classList.toggle('playing');
            var i = that.querySelectorAll('.playButton')[0];
            i.classList.toggle('fa-play');
            i.classList.toggle('fa-square');
            document.getElementById('playingSoraName').innerHTML = that.querySelectorAll('.soraName')[0].innerHTML;
            id = id.slice(1);
            var sora = id;
            console.log(sora);
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                var data = JSON.parse(this.responseText);
                console.log(selectedReciter[0]);
                var audio = document.getElementById('audio');
                var audSource = document.getElementById('audioSource');
                //alert(data.reciters[216].Server + "001.mp3");
                audSource.src = data.reciters[selectedReciter[0]].Server + "/" + SoraDeterimner(sora) + ".mp3";
                audio.load();
                audio.play();
                playingOnThebig();
            };
            xmlhttp.open(
                "GET",
                "https://www.mp3quran.net/api/_arabic.json"
            );
            xmlhttp.send();
            last = that;
        } else {
            //console.log("they are the same");
            if (!audio.paused) {

                audio.pause();
                stopTheBig();
            } else
                audio.play();
            // that.classList.toggle('playing');
            // var i = that.querySelectorAll('.playButton')[0];
            // i.classList.toggle('fa-play');
            // i.classList.toggle('fa-square');
            last = null;
        }


    }

    function SoraDeterimner(numb) {
        if (numb < 10)
            return "00" + numb;
        else if (numb < 100)
            return "0" + numb;
        else
            return numb;
    }
    //var sora = 0;
</script>
<?php
include "foot.html";
?>