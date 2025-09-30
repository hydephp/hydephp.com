<style>
/* ========================================
   HydePHP Docs - Modern Homepage Style
   Light/Dark Mode Support
   ======================================== */

/* === SIDEBAR === */

/* Light mode - subtle gradient */
#sidebar {
    background: linear-gradient(180deg, 
        rgb(249, 250, 251) 0%, 
        rgb(243, 244, 246) 100%);
}

/* Dark mode - deep purple gradient */
.dark #sidebar {
    background: linear-gradient(180deg, 
        rgb(30, 20, 50) 0%, 
        rgb(20, 15, 40) 50%,
        rgb(15, 10, 30) 100%);
}

/* Sidebar brand with gradient text */
#sidebar-brand strong a {
    background: linear-gradient(135deg, 
        rgb(236, 72, 153) 0%, 
        rgb(251, 146, 120) 50%,
        rgb(252, 165, 165) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
    font-size: 1.125rem;
}

/* Accent border on top of sidebar */
#sidebar-header {
    border-bottom: 2px solid transparent;
    border-image: linear-gradient(90deg, 
        rgb(236, 72, 153), 
        rgb(251, 146, 120),
        rgb(252, 165, 165)) 1;
}

/* Section headers */
.sidebar-group-heading {
    font-weight: 600;
    letter-spacing: 0.025em;
}

/* Light mode text colors */
.sidebar-group-heading {
    color: rgb(55, 65, 81);
}

/* Dark mode text colors */
.dark .sidebar-group-heading {
    color: rgb(203, 213, 225);
}

/* Hover effect on group headers */
.sidebar-group-header:hover .sidebar-group-heading {
    background: linear-gradient(135deg, 
        rgb(236, 72, 153) 0%, 
        rgb(251, 146, 120) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.sidebar-group-header:hover {
    background: rgba(236, 72, 153, 0.1) !important;
}

/* Reduced indentation for sidebar items */
.sidebar-group-items {
    margin-left: 0.5rem !important;
    padding-left: 0.5rem !important;
}

.sidebar-item {
    margin-left: 0 !important;
    padding-left: 0 !important;
}

/* Navigation links */
.sidebar-item a {
    transition: all 0.2s ease;
    border-radius: 0.375rem;
    margin-left: 0 !important;
    padding-left: 0.75rem !important;
}

/* Light mode link colors */
.sidebar-item a {
    color: rgb(75, 85, 99);
}

/* Dark mode link colors */
.dark .sidebar-item a {
    color: rgb(148, 163, 184);
}

.sidebar-item a:hover {
    background: rgba(236, 72, 153, 0.1);
    border-left-color: rgb(236, 72, 153) !important;
    padding-left: 1rem !important;
}

/* Light mode hover */
.sidebar-item a:hover {
    color: rgb(236, 72, 153);
}

/* Dark mode hover */
.dark .sidebar-item a:hover {
    color: rgb(248, 113, 113);
}

/* Active link */
.sidebar-item a[aria-current="page"],
.sidebar-item a.active {
    color: rgb(236, 72, 153);
    background: rgba(236, 72, 153, 0.15);
    border-left-color: rgb(236, 72, 153) !important;
    font-weight: 500;
}

.dark .sidebar-item a[aria-current="page"],
.dark .sidebar-item a.active {
    color: rgb(251, 146, 120);
}

/* Group toggle button */
.sidebar-group-toggle {
    transition: all 0.2s ease;
}

.sidebar-group-toggle {
    color: rgb(107, 114, 128);
}

.dark .sidebar-group-toggle {
    color: rgb(148, 163, 184);
}

.sidebar-group-header:hover .sidebar-group-toggle {
    color: rgb(251, 146, 120);
}

/* Navigation container */
#sidebar-navigation {
    border-color: rgba(236, 72, 153, 0.2);
}

.dark #sidebar-navigation {
    border-color: rgba(236, 72, 153, 0.2);
}

/* Footer links */
#sidebar-footer {
    border-top: 1px solid rgba(236, 72, 153, 0.2);
}

#sidebar-footer a {
    transition: color 0.2s ease;
}

#sidebar-footer a {
    color: rgb(107, 114, 128);
}

.dark #sidebar-footer a {
    color: rgb(148, 163, 184);
}

#sidebar-footer a:hover {
    background: linear-gradient(135deg, 
        rgb(236, 72, 153) 0%, 
        rgb(251, 146, 120) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Scrollbar */
#sidebar-navigation::-webkit-scrollbar {
    width: 6px;
}

#sidebar-navigation::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.05);
}

.dark #sidebar-navigation::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.2);
}

#sidebar-navigation::-webkit-scrollbar-thumb {
    background: rgba(236, 72, 153, 0.3);
    border-radius: 3px;
}

.dark #sidebar-navigation::-webkit-scrollbar-thumb {
    background: rgba(236, 72, 153, 0.5);
}

#sidebar-navigation::-webkit-scrollbar-thumb:hover {
    background: rgba(236, 72, 153, 0.5);
}

.dark #sidebar-navigation::-webkit-scrollbar-thumb:hover {
    background: rgba(236, 72, 153, 0.7);
}


/* === MAIN CONTENT === */

/* Main content background */
#content {
    background: linear-gradient(180deg,
        rgb(248, 249, 251) 0%,
        rgb(255, 255, 255) 100%);
}

.dark #content {
    background: linear-gradient(180deg,
        rgb(17, 24, 39) 0%,
        rgb(10, 15, 28) 100%);
}

/* Document article */
#document {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 1rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
}

.dark #document {
    background: rgba(30, 41, 55, 0.8);
}

/* Page title with gradient */
#document-header h1 {
    background: linear-gradient(135deg, 
        rgb(236, 72, 153) 0%, 
        rgb(251, 146, 120) 50%,
        rgb(252, 165, 165) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 800;
}

/* Headings with subtle gradient on hover */
#document h2,
#document h3 {
    transition: all 0.2s ease;
}

#document h2:hover,
#document h3:hover {
    background: linear-gradient(135deg, 
        rgb(236, 72, 153) 0%, 
        rgb(251, 146, 120) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Links in content */
#document a {
    color: rgb(236, 72, 153);
    transition: color 0.2s ease;
}

#document a:hover {
    color: rgb(251, 146, 120);
}

/* Code blocks */
#document pre {
    background: rgb(30, 20, 50) !important;
    border: 1px solid rgba(236, 72, 153, 0.2);
    border-radius: 0.5rem;
}

#document code {
    color: rgb(251, 146, 120);
}

#document pre code {
    color: rgb(203, 213, 225);
}

/* Inline code */
#document :not(pre) > code {
    background: rgba(236, 72, 153, 0.1);
    color: rgb(236, 72, 153);
    padding: 0.125rem 0.375rem;
    border-radius: 0.25rem;
    font-weight: 500;
}

.dark #document :not(pre) > code {
    background: rgba(236, 72, 153, 0.2);
    color: rgb(251, 146, 120);
}


/* === MOBILE NAVIGATION === */

#mobile-navigation {
    background: linear-gradient(90deg,
        rgb(249, 250, 251) 0%,
        rgb(243, 244, 246) 100%);
}

.dark #mobile-navigation {
    background: linear-gradient(90deg,
        rgb(30, 20, 50) 0%,
        rgb(25, 18, 45) 100%);
}

#mobile-navigation strong a {
    background: linear-gradient(135deg, 
        rgb(236, 72, 153) 0%, 
        rgb(251, 146, 120) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}


/* === VERSION SWITCHER === */

#version-switcher,
#mobile-navigation button[aria-haspopup="listbox"] {
    background: rgba(236, 72, 153, 0.1);
    border-color: rgba(236, 72, 153, 0.3);
    transition: all 0.2s ease;
}

#version-switcher:hover,
#mobile-navigation button[aria-haspopup="listbox"]:hover {
    background: rgba(236, 72, 153, 0.2);
    border-color: rgba(236, 72, 153, 0.5);
}


/* === SEARCH === */

/* Search button */
button[aria-label="Open search window"],
#searchMenuButton,
#searchMenuButtonMobile {
    background: rgba(236, 72, 153, 0.1);
    border-color: rgba(236, 72, 153, 0.3);
    transition: all 0.2s ease;
}

button[aria-label="Open search window"]:hover,
#searchMenuButton:hover,
#searchMenuButtonMobile:hover {
    background: rgba(236, 72, 153, 0.2);
    border-color: rgba(236, 72, 153, 0.5);
}

/* Search window */
#searchMenu {
    background: linear-gradient(180deg,
        rgb(255, 255, 255) 0%,
        rgb(249, 250, 251) 100%);
    border: 2px solid rgba(236, 72, 153, 0.2);
    box-shadow: 0 20px 25px -5px rgba(236, 72, 153, 0.1);
}

.dark #searchMenu {
    background: linear-gradient(180deg,
        rgb(30, 41, 55) 0%,
        rgb(20, 30, 45) 100%);
}

/* Search input */
#search-input {
    border: 2px solid rgba(236, 72, 153, 0.2);
    transition: all 0.2s ease;
}

#search-input:focus {
    outline: none;
    border-color: rgb(236, 72, 153);
    box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
}


/* === THEME TOGGLE === */

.theme-toggle-button {
    transition: all 0.2s ease;
}

.theme-toggle-button {
    color: rgb(107, 114, 128);
}

.dark .theme-toggle-button {
    color: rgb(203, 213, 225);
}

.theme-toggle-button:hover {
    color: rgb(251, 146, 120);
}


/* === BADGES === */

/* Package badges styling */
.images-inline img {
    filter: saturate(1.2) brightness(1.1);
    transition: transform 0.2s ease;
}

.images-inline img:hover {
    transform: scale(1.05);
}


/* === MOBILE SIDEBAR TOGGLE === */

#sidebar-toggle span {
    background: rgb(107, 114, 128) !important;
}

.dark #sidebar-toggle span {
    background: rgb(251, 146, 120) !important;
}

#sidebar-toggle.active span:nth-child(1) {
    background: rgb(236, 72, 153) !important;
}

#sidebar-toggle.active span:nth-child(4) {
    background: rgb(236, 72, 153) !important;
}


/* === FOOTER === */

#document-footer a {
    color: rgb(236, 72, 153);
    transition: color 0.2s ease;
}

#document-footer a:hover {
    color: rgb(251, 146, 120);
}


/* === ACCESSIBILITY === */

#skip-to-content:focus {
    background: linear-gradient(135deg, 
        rgb(236, 72, 153) 0%, 
        rgb(251, 146, 120) 100%);
    border-color: rgb(251, 146, 120);
}
</style>