<div id="inscription">
    <h1>Inscrivez-vous!</h1>
    <form method="POST" action="registration.php" name="formReg" enctype="multipart/form-data">
        <input type="text" name="pseudo" placeholder="Pseudo">
        <input type="email" name="email" placeholder="Enter your Email">
        <input type="password" name="password1" placeholder="Password">
        <input type="password" name="password2" placeholder="Confirm password">
        <label for="avatar">Choisissez un avatar:</label>
        <input type="file" name="avatar">
        <button type="submit" name="formRegSub" value="formRegSub">Send</button>
    </form>
</div>