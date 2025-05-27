function showCardModal(cardData) {
    const modalImg = document.getElementById('modalCardImage');
    const modalDetails = document.getElementById('modalCardDetails');

    modalImg.src = cardData.image_url;
    modalDetails.innerHTML = `
        <strong>${cardData.name}</strong><br>
        Tipo: ${cardData.type}<br>
        Costo: ${cardData.cost} | Attacco: ${cardData.attack} | Difesa: ${cardData.defense}<br>
        Effetto: ${cardData.description.replace(/\n/g, '<br>')}
    `;

    document.querySelector('main').classList.add('blur-background');
    document.querySelector('header').classList.add('blur-background');

    const modal = new bootstrap.Modal(document.getElementById('cardModal'));
    modal.show();

    const modalElement = document.getElementById('cardModal');
    modalElement.addEventListener('hidden.bs.modal', function () {
        document.querySelector('main').classList.remove('blur-background');
        document.querySelector('header').classList.remove('blur-background');
    }, { once: true });
}