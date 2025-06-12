 <script>
     window.addEventListener("scroll", function() {
         var header = document.getElementById("header");
         var navbar = document.getElementById("navbar");

         if (window.scrollY > header.offsetHeight) {
             navbar.classList.add("sticky-nav");
         } else {
             navbar.classList.remove("sticky-nav");
         }
     });

     const menuBtn = document.getElementById("menu-Btn");
     const mobileMenu = document.getElementById("mobile-menu");

     menuBtn.addEventListener("click", () => {
         mobileMenu.classList.toggle("hidden");
     });
 </script>
 <script>
     let dropdownTimeout;

     function showDropdown() {
         clearTimeout(dropdownTimeout);
         document.getElementById("dropdown").classList.remove("hidden");
     }

     function hideDropdown() {
         dropdownTimeout = setTimeout(() => {
             document.getElementById("dropdown").classList.add("hidden");
         }, 500);
     }
 </script>
 <script>
     let companiesDropdownTimeout;

     function showCompaniesDropdown() {
         clearTimeout(companiesDropdownTimeout);
         document.getElementById("companies-menu-dropdown").classList.remove("hidden");
     }

     function hideCompaniesDropdown() {
         companiesDropdownTimeout = setTimeout(() => {
             document.getElementById("companies-menu-dropdown").classList.add("hidden");
         }, 500);
     }
 </script>
 <script>
     function homeToggleMobileDropdown() {
         let dropdown = document.getElementById("home-dropdown");
         dropdown.classList.toggle("hidden");
     }
 </script>
 <script>
     function companyToggleMobileDropdown() {
         let dropdown = document.getElementById("company-dropdown");
         dropdown.classList.toggle("hidden");
     }
 </script>
 <script>
     window.addEventListener("scroll", function() {
         var header = document.getElementById("header");
         var navbar = document.getElementById("navbar");

         if (window.scrollY > header.offsetHeight) {
             navbar.classList.add("sticky-nav");
         } else {
             navbar.classList.remove("sticky-nav");
         }
     });

     const menuBtn = document.getElementById("menu-Btn");
     const mobileMenu = document.getElementById("mobile-menu");

     menuBtn.addEventListener("click", () => {
         mobileMenu.classList.toggle("hidden");
     });
 </script>
 <script>
     let dropdownTimeout;

     function showDropdown() {
         clearTimeout(dropdownTimeout);
         document.getElementById("dropdown").classList.remove("hidden");
     }

     function hideDropdown() {
         dropdownTimeout = setTimeout(() => {
             document.getElementById("dropdown").classList.add("hidden");
         }, 500);
     }
 </script>
 <script>
     let companiesDropdownTimeout;

     function showCompaniesDropdown() {
         clearTimeout(companiesDropdownTimeout);
         document.getElementById("companies-menu-dropdown").classList.remove("hidden");
     }

     function hideCompaniesDropdown() {
         companiesDropdownTimeout = setTimeout(() => {
             document.getElementById("companies-menu-dropdown").classList.add("hidden");
         }, 500);
     }
 </script>
 <script>
     function homeToggleMobileDropdown() {
         let dropdown = document.getElementById("home-dropdown");
         dropdown.classList.toggle("hidden");
     }
 </script>
 <script>
     function companyToggleMobileDropdown() {
         let dropdown = document.getElementById("company-dropdown");
         dropdown.classList.toggle("hidden");
     }
 </script>
 {{-- <script>
     document.querySelectorAll(".tab-link").forEach((tab) => {
         tab.addEventListener("click", (event) => {
             event.preventDefault(); // Prevent page reload

             // Hide all tab contents
             document.getElementById("tab1").style.display = "none";
             document.getElementById("tab2").style.display = "none";
             document.getElementById("tab3").style.display = "none";

             // Remove active class from all tabs
             document.querySelectorAll(".tab-link").forEach((item) => {
                 item.classList.remove("border-[#1b3d78]", "text-[#1b3d78]");
                 item.classList.add("border-transparent", "text-black");
             });

             // Show the selected tab content & apply active class
             if (tab.id === "vision") {
                 document.getElementById("tab1").style.display = "block";
             } else if (tab.id === "mission") {
                 document.getElementById("tab2").style.display = "block";
             } else if (tab.id === "philosohpy") {
                 document.getElementById("tab3").style.display = "block";
             }

             // Add active class to clicked tab
             tab.classList.remove("border-transparent", "text-black");
             tab.classList.add("border-[#1b3d78]", "text-[#1b3d78]");
         });


     });
 </script> --}}

 @yield('scripts')
