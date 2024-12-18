const hamburger = document.querySelector('#button-navbar');
const sidebarItems = document.querySelectorAll('.sidebar-item');

function removeActiveClassFromAll() {
    sidebarItems.forEach(item => {
        item.classList.remove('sidebar-active');
    });
}

sidebarItems.forEach(item => {
    item.onclick = () => {
        removeActiveClassFromAll();
        item.classList.toggle('sidebar-active');
    };
});

hamburger.onclick = () => {
    document.querySelector('#sidebar').classList.toggle('expand');
    document.querySelector('.main').classList.toggle('expanded');
    const profile = document.querySelector('.profile');
    profile.classList.toggle('profile-expand');
    if (profile.classList.contains('profile-expand')) {
        profile.style.right = '260px'; // Adjust to match sidebar width when expanded
    } else {
        profile.style.right = '10vh'; // Original position
    }
};

window.onscroll = function() {
    const header = document.querySelector('nav.navbar');
    const fixed_navbar = header.offsetTop;

    if (window.pageYOffset > fixed_navbar) {
        header.classList.add('navbar-fixed');
    } else {
        header.classList.remove('navbar-fixed');
    }
};
