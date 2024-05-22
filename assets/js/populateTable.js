$(document).ready(function() {
    let services = sessionData || {};

    function updateTable() {
        let totalCost = 0;
        let itemList = $('#item-list');
        itemList.empty();

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

        $('#total-cost').text(`$${totalCost.toFixed(2)}`);
    }

    function saveServicesToSession(baseUrl) {
        console.log("Saving services to session at URL:", baseUrl);
        console.log("Services data:", services);
        $.ajax({
            url: baseUrl,
            method: 'POST',
            data: { services: JSON.stringify(services) },
            success: function(response) {
                console.log("AJAX response:", response);
                try {
                    let jsonResponse = JSON.parse(response);
                    if (jsonResponse.status === 'success') {
                        window.location.href = redirectUrl;
                    } else {
                        console.error('Failed to save services to session. Response:', jsonResponse);
                    }
                } catch (e) {
                    console.error('Error parsing JSON response:', e);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX request error:', error);
                console.error('Status:', status);
                console.error('XHR:', xhr);
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

    $('#continue-button').click(function() {
        saveServicesToSession(baseUrl);
    });

    updateTable();
});
