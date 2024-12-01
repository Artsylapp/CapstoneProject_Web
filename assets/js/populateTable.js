$(document).ready(function() {
    let services = JSON.parse(localStorage.getItem('selected_services')) || {};
    let masseurs = JSON.parse(localStorage.getItem('assigned_masseurs')) || {};
    let locations = JSON.parse(localStorage.getItem('assigned_locations')) || {};
    let customer_information = JSON.parse(localStorage.getItem('customer_information')) || {};

    //THIS IS FOR SORTING, DONT MIND THIS
    if (window.location.pathname.includes('orders_create')) {
        console.log("Current page: " + window.location.pathname.toString());
    }else if (window.location.pathname.includes('orders_placement')){
        console.log("Current page: " + window.location.pathname.toString());
    }else{
        console.log("Current page: " + window.location.pathname.toString());
    }
    
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

        if (masseurs?.name) {
            masseurList.append(
                `<tr>
                    <td colspan="3">${masseurs.name}</td>
                </tr>`
            );
        }

        if (locations?.name) {
            locationList.append(
                `<tr>
                    <td colspan="3">${locations.name}</td>
                </tr>`
            );
        }

        $('#total-cost').text(`₱${totalCost.toFixed(2)}`);
    }

    function saveDataToLocalStorage() {
        localStorage.setItem('selected_services', JSON.stringify(services));
        localStorage.setItem('assigned_masseurs', JSON.stringify(masseurs));
        localStorage.setItem('assigned_locations', JSON.stringify(locations));
        localStorage.setItem('customer_information', JSON.stringify(customer_information));

        let sortingData = {
            customer: JSON.parse(localStorage.getItem('customer_information')) || {},
            workstation: JSON.parse(localStorage.getItem('assigned_locations')) || {},
        };

        $.ajax({
            url: $('#continue-button').data('base-url'),
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(sortingData),
            success: function(response) {
                console.log("Server Response:", response);
                // window.location.href = $('#continue-button').data('base-url');
            },
            error: function(xhr, status, error) {
                console.error('Error saving booking:', error);
                console.error('Response:', xhr.responseText);
            }
        });
    }

    function saveDataToServer() {
        const bookingData = {
            services: services,
            masseurs: masseurs,
            locations: locations,
            totalCost: parseFloat($('#total-cost').text().replace('₱', '')),
            customer_information: customer_information
        };
    
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
                console.error('Response:', xhr.responseText);
            }
        });
    }   

    $('.add-service').click(function() {
        let serviceName = $(this).data('service-name');
        let servicePrice = parseFloat($(this).data('service-price'));
        let serviceType = $(this).data('service-type');

        if (services['services']) {
            services['services'].amount++;
        } else {
            services['services'] = {name: serviceName,  price: servicePrice, amount: 1, type: serviceType };
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

        filterServicesByType();
        updateTable();
    });

    $('.assign-masseur').click(function() {
        let masseurName = $(this).data('masseur-name');
        let masseurGender = $(this).data('masseur-gender');
        masseurs = {}; // Clear current masseurs
        masseurs['name'] = masseurName;
        masseurs['gender'] = masseurGender;
        updateTable();
    });

    $('.remove-masseur').click(function() {
        let masseurName = $(this).data('masseur-name');
        delete masseurs[masseurName];
        updateTable();
    });

    $('.assign-location').click(function() {
        let locationName = $(this).data('location-name');
        let locationType = $(this).data('location-type');
        locations = {}; // Clear current locations
        locations['name'] = locationName;
        locations['type'] = locationType;
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
