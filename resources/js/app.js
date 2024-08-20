import './bootstrap';
import './components/accordion-sidebar';
import './components/draggableLists';
import CoordChangerApp from './coord-changer/CoordChangerApp';

document.addEventListener('DOMContentLoaded', () => {
    // Init accordion on coord-changer page
    const currentPath = window.location.pathname;
    if (currentPath === '/pages/coord-changer') {  
        new CoordChangerApp();
    }    
});
