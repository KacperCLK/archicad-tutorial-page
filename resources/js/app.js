import './bootstrap';
import './components/accordion-sidebar';
import './components/admin-page/draggableLists';
import CoordChangerApp from './coord-changer/CoordChangerApp';

document.addEventListener('DOMContentLoaded', () => {
    // Init accordion on coord-changer page
    const currentPath = window.location.pathname;
    if (currentPath === '/pages/coord-changer') {  
        new CoordChangerApp();
    }    
});

const toggleButton = document.getElementById('toggleButton');
const sidebar = document.getElementById('sidebar');

toggleButton.addEventListener('click', function() {    
    toggleButton.classList.toggle('active');
    sidebar.classList.toggle('active');
});