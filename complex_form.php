<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Processing</title>
</head>
<body>
    <h1> HTML Complex Form Processing</h1>

    <form action="process_complex_form.php" method="POST">
        <!--Text Input-->
        <label>Name:</label>
        <input type="Text" name="username">
        <br>

        <!--Password Input-->
        <label>Password:</label>
        <input type="Password" name="password">
        <br>

        <!--checkbox-->
        Subscribe<input type="checkbox" name="subscribe" value ="yes">
        <br>

        <!--radio buttons-->
        Male<input type="radio" name="gender" value="male">
        Female<input type="radio" name="gender" value="female">
        Other<input type="radio" name="gender" value="other">
        <br>

        <!--select Dropdown-->
        <label>Country:</label>
        <select name="country">
            <option value="us">United States</option>
            <option value="ca">Canada</option>
            <option value="uk">United Kingdom</option>
        </select>
        <br>
        <br>

        <!--Multi Select-->
        <label>Interest:</label>
        <select name="intrests[]" multiple>
            <option value="sports">Sports</option>
            <option value="music">Music</option>
            <option value="movies">Movies</option>
        </select>
        <br>
        <br>

        <!--Hidden Field-->
        <input type="hidden" name="form_id" value="registration">

        <!--Submit Button-->
        <button type="submit">Register</button>

    </form>
</body>
</html>