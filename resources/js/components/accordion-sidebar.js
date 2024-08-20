///////////// SIDEBAR ACCORDION
// Funkcja ta znajduje wszystkich rodziców elementu, którzy posiadają wskazaną klasę
function findParentElementsWithClass(element, className) {
    const parents = [];
    let currentElement = element.parentElement;

    while (currentElement) {
        if (currentElement.classList.contains(className)) {
            parents.push(currentElement);
        }
        currentElement = currentElement.parentElement;
    }

    return parents;
}

const accordionsLabels = document.querySelectorAll('.accordion-sidebar__label');
accordionsLabels.forEach(label => {
    label.addEventListener('click', function () {
        const content = this.nextElementSibling;

        if (content.style.height) {
            content.style.height = null;
        } else {
            content.style.height = content.scrollHeight + 'px';

            // Zwiększamy wysokość wszsytkich rodziców, żeby "zmieściła" się ta rozwinięta lista
            findParentElementsWithClass(content, 'accordion-sidebar__content').forEach(parent => {
                parent.style.height = parent.scrollHeight + content.scrollHeight + 'px';
            });
        }
    });
});