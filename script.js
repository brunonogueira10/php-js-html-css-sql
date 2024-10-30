function calculateQuote() {
    var pageType = $('#pageType').val();
    var deliveryTime = $('#deliveryTime').val();
    var sections = $('input[name="sections"]:checked');

    if (!pageType || !deliveryTime) {
        alert('Por favor , selecione o tipo de página e o tempo de entrega.');
        return;
    }

    var basePrice;
    switch (pageType) {
        case 'basic':
            basePrice = 500;
            break;
        case 'advanced':
            basePrice = 1000;
            break;
        case 'premium':
            basePrice = 1500;
            break;
        case 'custom':
            basePrice = 2000;
            break;
        default:
            alert('Tipo de página inválida.');
            return;
    }

    var extraSectionsCost = 0;
    sections.each(function () {
        extraSectionsCost += parseInt($(this).val());
    });

    var totalCost = basePrice + extraSectionsCost;

    if (deliveryTime && deliveryTime > 0) {
        var discount = Math.min(0.05 * deliveryTime, 0.20);
        totalCost *= (1 - discount);
    }

    $('#finalQuote').val('$' + totalCost.toFixed(2));
}

function validateContactForm() {
    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var meetingDate = $('#meetingDate').val();
    var reason = $('#reason').val();

    if (!firstName || !lastName || !phone || !email || !meetingDate || !reason) {
        alert('Por favor, preencha todos os campos.');
        return false;
    }

    return true;
}

//MAPA
var map = L.map('map').setView([41.15674568157044, -8.61013934185266], 13);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

L.marker([41.15674568157044, -8.61013934185266]).addTo(map)
    .bindPopup('Nosso Escritório')
    .openPopup();
