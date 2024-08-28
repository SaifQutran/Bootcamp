<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <main>
    <header>
      <h1>Sign in</h1>

    </header>
    <?php
    $globalVar = 10;

    function printVars()
    {
      $localVar = 20;
      echo "<br/> Local variable is $localVar";
      $localVar++;
      global $globalVar;
      echo "<br/> Global variable is $globalVar";
      $globalVar++;
      static $staticVar = 0;
      echo "<br/> Static Variable $staticVar";
      $staticVar++;
    }
    // printVars();
    // echo "<br/>";
    // echo "variables inside function ";
    // for($i = 0 ; $i  < 10; $i++){
    // 	printVars();
    // }
    // echo "local outside function " . $localVar;
    // echo "global outside function " . $globalVar;
    // echo "static outside function " . $staticVar;



    ?>

    <form action="table.php" method="post" runat="server" enctype="multipart/form-data">
      <table cellspacing=" 10">
        <tr>



          <label for="imgInp" id="piclabel">Profile image</label>
          <input type="file" name="image" id="imgInp" placeholder="pic" accept="image/*" />

          <div>

            <label for="name">Enter Name</label>
            <br>
            <input type="text" name="name" id="name" placeholder="Enter your name" />
            <br>
          </div>
          <div>

            <label for="username">Username</label>
            <br>
            <input type="text" name="username" id="username" placeholder="Username" />
          </div>
          <div>

            <label for="email">Email</label>
            <br>
            <input type="email" name="email" id="email" placeholder="Email" />
          </div>
          <br><label for="password">Password</label>
          <br> <input type="password" name="password" id="password" placeholder="Password" />
          <div>

            <p class="labelclass">Date of Birth</br>
              <input list="dayList" id="days" name="day" placeholder="day" />

              <datalist id="dayList">
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
                <option value="5"></option>
                <option value="6"></option>
                <option value="7"></option>
                <option value="8"></option>
                <option value="9"></option>
                <option value="10"></option>
                <option value="11"></option>
                <option value="12"></option>
                <option value="13"></option>
                <option value="14"></option>
                <option value="15"></option>
                <option value="16"></option>
                <option value="17"></option>
                <option value="18"></option>
                <option value="19"></option>
                <option value="20"></option>
                <option value="21"></option>
                <option value="22"></option>
                <option value="23"></option>
                <option value="24"></option>
                <option value="25"></option>
                <option value="26"></option>
                <option value="27"></option>
                <option value="28"></option>
                <option value="29"></option>
                <option value="30"></option>
                <option value="31"></option>
              </datalist>

              <input list="monthList" id="months" name="month" placeholder="month" />
              <datalist id="monthList">
                <option value="January"></option>
                <option value="February"></option>
                <option value="March"></option>
                <option value="April"></option>
                <option value="May"></option>
                <option value="June"></option>
                <option value="July"></option>
                <option value="August"></option>
                <option value="September"></option>
                <option value="October"></option>
                <option value="November"></option>
                <option value="December"></option>
              </datalist>

              <input list="yearList" id="years" name="year" placeholder="year" />

              <datalist id="yearList">
                <option value="1950"></option>
                <option value="1951"></option>
                <option value="1952"></option>
                <option value="1953"></option>
                <option value="1954"></option>
                <option value="1955"></option>
                <option value="1956"></option>
                <option value="1957"></option>
                <option value="1958"></option>
                <option value="1959"></option>
                <option value="1960"></option>
                <option value="1961"></option>
                <option value="1962"></option>
                <option value="1963"></option>
                <option value="1964"></option>
                <option value="1965"></option>
                <option value="1966"></option>
                <option value="1967"></option>
                <option value="1968"></option>
                <option value="1969"></option>
                <option value="1970"></option>
                <option value="1971"></option>
                <option value="1972"></option>
                <option value="1973"></option>
                <option value="1974"></option>
                <option value="1975"></option>
                <option value="1976"></option>
                <option value="1977"></option>
                <option value="1978"></option>
                <option value="1979"></option>
                <option value="1980"></option>
                <option value="1981"></option>
                <option value="1982"></option>
                <option value="1983"></option>
                <option value="1984"></option>
                <option value="1985"></option>
                <option value="1986"></option>
                <option value="1987"></option>
                <option value="1988"></option>
                <option value="1989"></option>
                <option value="1990"></option>
                <option value="1991"></option>
                <option value="1992"></option>
                <option value="1993"></option>
                <option value="1994"></option>
                <option value="1995"></option>
                <option value="1996"></option>
                <option value="1997"></option>
                <option value="1998"></option>
                <option value="1999"></option>
                <option value="2000"></option>
                <option value="2001"></option>
                <option value="2002"></option>
                <option value="2003"></option>
                <option value="2004"></option>
                <option value="2005"></option>
                <option value="2006"></option>
              </datalist>
          </div>
          <div>

            <p class="labelclass">Gender</p>
            <div class="gender" style="margin:0px auto;">

              <input type="radio" name="gender" value="Male" id="Male" />
              <label for="Male">Male</label>
              <input type="radio" name="gender" value="Female" id="Female" />
              <label for="Female">Female</label>
            </div>
            <br>
          </div>
          <label for="country">Country</label>
          <br> <input list="countryList" id="country" name="country" placeholder="Country" />
          <datalist id="countryList">
            <option value="Algeria"></option>
            <option value="Bahrain"></option>
            <option value="Chad"></option>
            <option value="Comoros"></option>
            <option value="Djibouti"></option>
            <option value="Egypt"></option>
            <option value="Iraq"></option>
            <option value="Jordan"></option>
            <option value="Kuwait"></option>
            <option value="Lebanon"></option>
            <option value="Libya"></option>
            <option value="Mauritania"></option>
            <option value="Morocco"></option>
            <option value="Oman"></option>
            <option value="Palestine"></option>
            <option value="Qatar"></option>
            <option value="Saudi Arabia"></option>
            <option value="Somalia"></option>
            <option value="Sudan"></option>
            <option value="Syria"></option>
            <option value="Tunisia"></option>
            <option value="United Arab Emirates"></option>
            <option value="Yemen"></option>
          </datalist>
          <br><label for="phone">Phone</label>
          <br> <input type="tel" name="phone" id="phone" />
          <br>
          <input type="checkbox" name="check" id="check" />
          <label for="check">I agree the terms of use</label>
          <footer>
            <input type="submit" value="Submit" id="submit">
            <input type="button" name="cancel" id="cancel" onclick="clearer()" value="Cancel">

          </footer>
    </form>
  </main>
</body>
<script>
  imgInp.onchange = evt => {
    const [file] = imgInp.files;
    if (file) {
      piclabel.style.background = 'url(' + URL.createObjectURL(file) + ')';
      piclabel.style.backgroundSize = 'cover';
      piclabel.innerHTML = '';
      piclabel.style.backgroundPosition = 'center';
    }
  }


  function clearer() {
    const v = document.getElementsByTagName('input');
    for (const s of v) {
      if (s.type == 'text' || s.type == 'email' || s.type == 'password' || s.type == 'list' || s.type == 'tel' ||  s.type == 'file') {
        console.log(s.value);
        s.value = '';

      }
    }
  }
</script>

</html>