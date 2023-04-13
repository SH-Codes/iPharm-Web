const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); // save dark mode preference to localStorage
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light'); // save light mode preference to localStorage
    }    
}

toggleSwitch.addEventListener('change', switchTheme, false);

// check user's preference on page load
if (localStorage.getItem('theme') === 'dark') {
    toggleSwitch.checked = true;
    document.documentElement.setAttribute('data-theme', 'dark');
}