$(document).ready(function() {
    let services = JSON.parse(localStorage.getItem('selected_services')) || {};
    let masseurs = JSON.parse(localStorage.getItem('assigned_masseurs')) || {};
    let redirectUrl = $('#continue-button').data('base-url');

    function updateTable() {
        let totalCost = 0;
        let itemList = $('#item-list');
        let masseurList = $('#assign-list');
        itemList.empty();
        masseurList.empty();

        for (let serviceName in services) {
            if (services.hasOwnProperty(serviceName)) {
                let service = services[serviceName];
                let cost = service.price * service.amount;
                totalCost += cost;

                itemList.append(
                    `<tr>
                        <td>${serviceName}</td>
                        <td>${service.price}</td>
                        <td>${service.amount}</td>
                    </tr>`
                );
            }
        }

        for (let masseurName in masseurs) {
            if (masseurs.hasOwnProperty(masseurName)) {
                masseurList.append(
                    `<tr>
                        <td colspan="3">${masseurName}</td>
                    </tr>`
                );
            }
        }

        $('#total-cost').text(`$${totalCost.toFixed(2)}`);
    }

    function saveDataToLocalStorage() {
        localStorage.setItem('selected_services', JSON.stringify(services));
        localStorage.setItem('assigned_masseurs', JSON.stringify(masseurs));
        window.location.href = redirectUrl;
    }

    $('.add-service').click(function() {
        let serviceName = $(this).data('service-name');
        let servicePrice = parseFloat($(this).data('service-price'));

        if (services[serviceName]) {
            services[serviceName].amount++;
        } else {
            services[serviceName] = { price: servicePrice, amount: 1 };
        }

        updateTable();
    });

    $('.remove-service').click(function() {
        let serviceName = $(this).data('service-name');

        if (services[serviceName]) {
            services[serviceName].amount--;
            if (services[serviceName].amount <= 0) {
                delete services[serviceName];
            }
        }

        updateTable();
    });

    $('.assign-masseur').click(function() {
        let masseurName = $(this).data('masseur-name');
        masseurs[masseurName] = true;
        updateTable();
    });

    $('.remove-masseur').click(function() {
        let masseurName = $(this).data('masseur-name');
        delete masseurs[masseurName];
        updateTable();
    });

    $('#continue-button').click(function() {
        saveDataToLocalStorage();
    });

    updateTable();
});

