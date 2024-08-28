<?php include 'head.html' ?>

<body>
    <?php include 'nav.html'; ?>
    <form id="form1" name="form1" method="post" action="">
        <input type="text" name="k" id="hadithInput" />
            <input type="submit" name="submit" class="btn btn-success btn-lg" id="hadithButton" value="البحث" />
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $x = file_get_contents("https://dorar.net/dorar_api.json?skey=" . $_POST['k']);
        $x = json_decode($x);
        //var_dump($x);

        $arr = explode('--------------', $x->ahadith->result);
        $counter = 0;
        foreach ($arr as $hadith) {
    ?>
            <div class="myHadith"><?= substr($hadith, 6) ?></div>
    <?php
            $counter++;
            if ($counter == 15)
                break;
        }
    }

    ?>
    <script>
        const hadiths = document.querySelectorAll('.myHadith');
        hadiths.forEach(myFunction);
        var counter = 0;

        function myFunction(element, index) {
            var hadithInfo = element.querySelector('.hadith-info');
            var test = hadithInfo.querySelectorAll('span')[5].innerHTML;
            console.log(test);
            if (test.indexOf('صحيح') != -1)
                element.style.backgroundColor = "lightgreen";
            else
                element.style.backgroundColor = "lightpink  ";

            if (counter == 12) {
                return 0;
            }
            counter++;
        }
    </script>
</body>
<?php include "foot.html"; ?>