//////////////////// Lista dla admin-page
const draggables = document.querySelectorAll('.admin__tutorialBx');
const containers = document.querySelectorAll('.admin__chapterBx');

// Przygotowanie możliwości "ruszania" elementami list
draggables.forEach(draggable => {
    draggable.addEventListener('dragstart', () => draggable.classList.add('dragging'));
    draggable.addEventListener('dragend', () => {
        draggable.classList.remove('dragging');
        updateNumbers(); // Po zakończeniu przeciągania, aktualizuj numery
    });
})

containers.forEach(container => {
    // container - to pojemnik między którymi można przerzucać elementy
    container.addEventListener('dragover', e => {
        e.preventDefault();
        const afterElement = getDragAfterElement(container, e.clientY);
        const draggable = document.querySelector('.dragging');
        
        // Dodane, do kodu, ponieważ przesuwane elementy znajdują się "poziom niżej"
        const draggableElementsList = container.querySelector('ol');

        if (afterElement == null) draggableElementsList.appendChild(draggable);
        else draggableElementsList.insertBefore(draggable, afterElement);
    })
})

function getDragAfterElement(container, y) {
    const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')];
    
    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;

        if (offset < 0 && offset > closest.offset) return { offset: offset, element: child }
        else return closest;
        
    }, { offset: Number.NEGATIVE_INFINITY }).element;
}

// Updatowanie elementów znajdujących się w zmiennych dataset oraz tych wyświetlanych na ekranie
function updateNumbers() {
    containers.forEach((container) => {        
        const tutorials = container.querySelectorAll('.admin__tutorialBx');
        tutorials.forEach((tutorial, tutorialIndex) => tutorial.querySelector('.admin__tutorialBx__number').textContent = tutorialIndex + 1);
    });
}