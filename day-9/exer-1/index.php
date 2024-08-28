    <?php
    function CheckInput(string $input)
    {
        print_r($_POST);
        if (isset($_POST['submit'])) {
            if (!empty($_POST[$input])) {
                echo "<li style='color:green;'>Welcome</li>";
            } else {
                echo "<li style='color:red;'>The $input is required </li>";
            }
        }
    }
    ?>
    <form method="POST">
        <label for="username">username</label>
        <input type="text" name="username" placeholder="username"><br>
        <?php
        CheckInput('username');
        ?>
        <label for="password">password</label>
        <input type="text" name="password" placeholder="password"><br>
        <?php CheckInput('password'); ?>
        <input type="submit" name="submit" value="submit">

    </form>