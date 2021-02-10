// window.onload = function () {
    let accordionBlocks = document.querySelectorAll('.accordion');
    for (let i=0; i<accordionBlocks.length; i++) {
        let accordionButton = accordionBlocks[i].querySelector('.accordionButton');
        let accordionOneBlock = accordionBlocks[i].querySelector('.accordionBlock');
        let cancelButton = accordionBlocks[i].querySelector('.cancelAccordionButton');
        accordionButton.onclick = function () {
            accordionOneBlock.classList.remove('hiddenInputs');
            accordionButton.classList.add('hiddenInputs');
        };
        cancelButton.onclick = function () {
            accordionOneBlock.classList.add('hiddenInputs');
            accordionButton.classList.remove('hiddenInputs');
        }
    }
// };
