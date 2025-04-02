
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            primary: {
              50: "#f0f9ff",
              100: "#e0f2fe",
              200: "#bae6fd",
              300: "#7dd3fc",
              400: "#38bdf8",
              500: "#0ea5e9",
              600: "#0284c7",
              700: "#0369a1",
              800: "#075985",
              900: "#0c4a6e",
              950: "#0b2e4f",
            },
            background: "#ffffff",
            foreground: "#000000",
            muted: "#f3f4f6",
            "muted-foreground": "#6b7280",
            accent: "#fbbf24",
            "accent-foreground": "#000000",
          },
        },
        fontFamily: {
          body: ["Poppins", "sans-serif"],  /* Set Poppins as the body font */
          sans: [
            "Arial",
            "ui-sans-serif",
            "system-ui",
            "-apple-system",
            "system-ui",
            "Segoe UI",
            "Roboto",
            "Helvetica Neue",
            "Arial",
            "Noto Sans",
            "sans-serif",
            "Apple Color Emoji",
            "Segoe UI Emoji",
            "Segoe UI Symbol",
            "Noto Color Emoji",
          ],
        },
      },
    };


 
    window.onscroll = function() {
      const header = document.getElementById('header');
      const sticky = header.offsetTop;

      if (window.pageYOffset > sticky) {
        header.classList.add('fixed-header');
      } else {
        header.classList.remove('fixed-header');
      }
    };





 
    function toggleFooterSection(sectionId) {
      const section = document.getElementById(sectionId);
      const icon = document.getElementById(`${sectionId}-icon`);
      if (section.classList.contains('hidden')) {
        section.classList.remove('hidden');
        icon.classList.remove('fa-chevron-down');
        icon.classList.add('fa-chevron-up');
      } else {
        section.classList.add('hidden');
        icon.classList.remove('fa-chevron-up');
        icon.classList.add('fa-chevron-down');
      }
    }


 
    const toggle = document.getElementById("mobile-menu-toggle");
    const menu = document.getElementById("mobile-menu"); // Ensure this matches the id in the HTML
    toggle.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });


 
    const dropdown = document.getElementById("dropdown");

    function showDropdown() {
      dropdown.classList.remove("hidden");
    }

    function toggleDropdown() {
      dropdown.classList.toggle("hidden");
    }

    // Hide dropdown when clicking outside
    document.addEventListener("click", (event) => {
      if (
        !event.target.closest("#dropdown") &&
        !event.target.closest("#search-input") &&
        !event.target.closest("button")
      ) {
        dropdown.classList.add("hidden");
      }
    });
    
