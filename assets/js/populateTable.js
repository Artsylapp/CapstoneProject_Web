$(document).ready(function() {
    let services = JSON.parse(localStorage.getItem('selected_services')) || {};
    let masseurs = JSON.parse(localStorage.getItem('assigned_masseurs')) || {};
    let locations = JSON.parse(localStorage.getItem('assigned_locations')) || {};
    

    function updateTable() {
        let totalCost = 0;
        let itemList = $('#item-list');
        let masseurList = $('#assign-list');
        let locationList = $('#placement-list');
        itemList.empty();
        masseurList.empty();
        locationList.empty();

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

        for (let locationName in locations) {
            if (locations.hasOwnProperty(locationName)) {
                locationList.append(
                    `<tr>
                        <td colspan="3">${locationName}</td>
                    </tr>`
                );
            }
        }

        $('#total-cost').text(`$${totalCost.toFixed(2)}`);
    }

    function saveDataToLocalStorage() {
        localStorage.setItem('selected_services', JSON.stringify(services));
        localStorage.setItem('assigned_masseurs', JSON.stringify(masseurs));
        localStorage.setItem('assigned_locations', JSON.stringify(locations));
        window.location.href = redirectUrl;
    }

    function saveDataToServer() {
        localStorage.setItem('selected_services', JSON.stringify(services));
        localStorage.setItem('assigned_masseurs', JSON.stringify(masseurs));
        localStorage.setItem('assigned_locations', JSON.stringify(locations));
    
        updateTable();
    
        const bookingData = {
            services: services,
            masseurs: masseurs,
            locations: locations,
            totalCost: parseFloat($('#total-cost').text().replace('$', ''))
        };
    
        console.log("Booking Data:", bookingData);
    
        $.ajax({
            url: $('#finalize-button').data('base-url'),
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(bookingData),
            success: function(response) {
                console.log("Server Response:", response);
                window.location.href = $('#finalize-button').data('redirect-url');
            },
            error: function(xhr, status, error) {
                console.error('Error saving booking:', error);
            }
        });
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

    $('.assign-location').click(function() {
        let locationName = $(this).data('location-name');
        locations[locationName] = true;
        updateTable();
    });

    $('.remove-location').click(function() {
        let locationName = $(this).data('location-name');
        delete locations[locationName];
        updateTable();
    });

    $('#continue-button').click(function() {
        let redirectUrl = $('#continue-button').data('base-url');
        saveDataToLocalStorage();
    });

    $('#finalize-button').click(function() {
        let redirectUrl = $('#finalize-button').data('base-url');
        saveDataToServer();
    });

    updateTable();
});
