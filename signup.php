<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Dashboard | Sign In</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
  <link rel="stylesheet" href="./css/signup.css">
</head>

<body>
  <div class="layer"></div>
  <main class="page-center">
    <article class="sign-up">
      <h1 class="sign-up__title">Sign up</h1>
      <p class="sign-up__subtitle">Sign up to your account to continue</p>
      <form class="sign-up-form form" action="" method="">
        <label class="form-label-wrapper">
          <p class="form-label">Username</p>
          <input class="form-input" type="text" name="username" placeholder="Enter your Username" required>
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Email</p>
          <input class="form-input" type="email" name="email" placeholder="Enter your email" required>
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Phone</p>
          <input class="form-input" type="phone" name="phone" placeholder="Enter your email" required>
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Password</p>
          <input class="form-input" type="password" name="password" placeholder="Enter your password" required onchange="checkPassword()">
        </label>
        <div class="status-wrapper">
          <p class="length-status">❌</p>
          <p class="status-label">:Length</p><br>
          <p class="lowercase-status">❌</p>
          <p class="status-label">:Lowercase letter</p><br>
          <p class="uppercase-status">❌</p>
          <p class="status-label">:Uppercase letter</p><br>
          <p class="number-status">❌</p>
          <p class="status-label">:Number</p><br>
          <p class="special-status">❌</p>
          <p class="status-label">:Special character</p>
        </div>
        <label class="form-label-wrapper">
          <p class="form-label">Confirm Password</p>
          <input class="form-input" type="password" name="confirmPassword" placeholder="Enter your password" required onchange="checkPassword()">
        </label>
        <p class="match-status">Passwords do not match</p>
        <button class="form-btn primary-default-btn transparent-btn" disabled>Sign up</button>
      </form>
    </article>
  </main>

  <script>
    window.addEventListener("DOMContentLoaded", () => {
      const passwordInput = document.getElementsByName("password")[0];
      const confirmPasswordInput = document.getElementsByName("confirmPassword")[0];
      const signupButton = document.querySelector(".form-btn");
      const lengthStatus = document.querySelector(".length-status");
      const lowercaseStatus = document.querySelector(".lowercase-status");
      const uppercaseStatus = document.querySelector(".uppercase-status");
      const numberStatus = document.querySelector(".number-status");
      const specialStatus = document.querySelector(".special-status");

      signupButton.disabled = true; // disable the button by default

      // add an event listener to the password field
      passwordInput.addEventListener("input", () => {
        const passwordValue = passwordInput.value;
        const confirmPasswordValue = confirmPasswordInput.value;

        // check the length
        if (passwordValue.length >= 8) {
          lengthStatus.innerHTML = "✔️"; // display a check mark
        } else {
          lengthStatus.innerHTML = "❌"; // display a cross mark
        }

        // check for lowercase letters
        if (passwordValue.match(/[a-z]/)) {
          lowercaseStatus.innerHTML = "✔️";
        } else {
          lowercaseStatus.innerHTML = "❌";
        }

        // check for uppercase letters
        if (passwordValue.match(/[A-Z]/)) {
          uppercaseStatus.innerHTML = "✔️";
        } else {
          uppercaseStatus.innerHTML = "❌";
        }

        // check for numbers
        if (passwordValue.match(/[0-9]/)) {
          numberStatus.innerHTML = "✔️";
        } else {
          numberStatus.innerHTML = "❌";
        }

        // check for special characters
        if (passwordValue.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/)) {
          specialStatus.innerHTML = "✔️";
        } else {
          specialStatus.innerHTML = "❌";
        }

        // check if the passwords match and meet all conditions
        if (
          passwordValue === confirmPasswordValue &&
          passwordValue.length >= 8 &&
          passwordValue.match(/[a-z]/) &&
          passwordValue.match(/[A-Z]/) &&
          passwordValue.match(/[0-9]/) &&
          passwordValue.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/)
        ) {
          signupButton.disabled = false; // enable the button
        } else {
          signupButton.disabled = true; // disable the button
        }
      });

      // add an event listener to the confirm password field
      confirmPasswordInput.addEventListener("input", () => {
        const passwordValue = passwordInput.value;
        const confirmPasswordValue = confirmPasswordInput.value;

        // check if the passwords match
        if (passwordValue === confirmPasswordValue) {
          signupButton.disabled = false; // enable the button
        } else {
          signupButton.disabled = true; // disable the button
        }
      });
    });

    const passwordInput = document.querySelector('input[name="password"]');
const confirmPasswordInput = document.querySelector('input[name="confirmPassword"]');
const matchStatus = document.querySelector('.match-status');
const signUpButton = document.querySelector('button[type="submit"]');

    function checkPassword() {
  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;
  const lengthStatus = document.querySelector('.length-status');
  const lowercaseStatus = document.querySelector('.lowercase-status');
  const uppercaseStatus = document.querySelector('.uppercase-status');
  const numberStatus = document.querySelector('.number-status');
  const specialStatus = document.querySelector('.special-status');

  if (password === confirmPassword) {
    matchStatus.style.display = 'none';
    signUpButton.disabled = false;
  } else {
    matchStatus.style.display = 'block';
    signUpButton.disabled = true;
  }

  // Check password conditions and update status
  // ...

}
passwordInput.addEventListener('input', checkPassword);
confirmPasswordInput.addEventListener('input', checkPassword);
  </script>

  <!-- Chart library -->
  <script src="./plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="js/script.js"></script>
</body>

</html>