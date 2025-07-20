let currentTheme = "night";

    function validateForm() {
      const email = document.getElementById("email").value.trim();
      const id = document.getElementById("studentId").value.trim();
      const name = document.getElementById("name").value.trim();

      const emailRegex = /^[a-zA-Z0-9._%+-]+@diu\.edu\.bd$/;
      const idRegex = /^\d{3}-\d{2}-\d{4}$/;
      const nameRegex = /^[A-Za-z\s]+$/;

      let valid = true;

      document.getElementById("emailError").style.display = "none";
      document.getElementById("idError").style.display = "none";
      document.getElementById("nameError").style.display = "none";
      document.getElementById("successMessage").textContent = "";

      if (!emailRegex.test(email)) {
        document.getElementById("emailError").style.display = "block";
        valid = false;
      }
      if (!idRegex.test(id)) {
        document.getElementById("idError").style.display = "block";
        valid = false;
      }
      if (!nameRegex.test(name)) {
        document.getElementById("nameError").style.display = "block";
        valid = false;
      }

      if (valid) {
        document.getElementById("successMessage").textContent = "Form submitted successfully!";
        removeErrorBackground();
      } else {
        applyErrorBackground();
        incrementCursorSize()
      }

      return valid;
    }

    function applyErrorBackground() {
      document.body.classList.add("error-background");
      // remove theme classes so angry background is clear
      document.body.classList.remove("theme-night", "theme-gradient", "theme-emoji", "theme-cucumber");
    }

    function removeErrorBackground() {
      document.body.classList.remove("error-background");
      applyTheme(currentTheme);
    }

    function toggleDarkMode() {
      // Dark mode toggles night theme directly
      if (document.body.classList.contains("theme-night")) {
        // revert to user theme or default gradient if night was user theme
        document.body.classList.remove("theme-night");
        if(currentTheme === "night") {
          currentTheme = "gradient";
          document.getElementById("themeSelector").value = currentTheme;
        }
        applyTheme(currentTheme);
        document.querySelector(".theme-toggle span").textContent = "🌙";
      } else {
        currentTheme = "night";
        document.getElementById("themeSelector").value = currentTheme;
        applyTheme(currentTheme);
        document.querySelector(".theme-toggle span").textContent = "🌞";
      }
    }

    function changeTheme(value) {
      currentTheme = value;
      removeErrorBackground();
      applyTheme(value);
      // Reset dark mode toggle icon if switching manually
      if(value === "night"){
        document.querySelector(".theme-toggle span").textContent = "🌞";
      } else {
        document.querySelector(".theme-toggle span").textContent = "🌙";
      }
    }

    function applyTheme(theme) {
      document.body.classList.remove("theme-night", "theme-gradient", "theme-emoji", "theme-cucumber");
      if (theme === "night") {
        document.body.classList.add("theme-night");
      } else if (theme === "gradient") {
        document.body.classList.add("theme-gradient");
      } else if (theme === "emoji") {
        document.body.classList.add("theme-emoji");
      } else if (theme === "cucumber") {
        document.body.classList.add("theme-cucumber");
      }
    }

    let cursorSize = 24; // initial font size for emoji cursor
const maxCursorSize = 96; // max size limit

function updateCucumberCursor(size) {
  const svg = `<svg xmlns="http://www.w3.org/2000/svg" height="${size + 8}" width="${size + 8}">
    <text y="${size}" font-size="${size}">🥒</text>
  </svg>`;
  const encoded = encodeURIComponent(svg).replace(/'/g, "%27").replace(/"/g, "%22");
  const cursorUrl = `url("data:image/svg+xml,${encoded}") ${Math.floor(size / 2)} ${Math.floor(size / 2)}, auto`;

    document.body.style.cursor = cursorUrl;
    }

    // Call this on invalid form submission
    function incrementCursorSize() {
    cursorSize = Math.min(cursorSize + 8, maxCursorSize);
    updateCucumberCursor(cursorSize);
    }

    // Call this to reset cursor size (on valid submit or page load)
    function resetCursorSize() {
    cursorSize = 24;
    updateCucumberCursor(cursorSize);
    }

    // Set initial theme on page load
    applyTheme(currentTheme);