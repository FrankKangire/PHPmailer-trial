$(document).ready(function() {
            var orderNumber = 1;
            var orderTotal = 0;

            $('#orderForm').submit(function(e) {
                e.preventDefault();
                var menu = $('#menu').val();
                var quantity = parseInt($('#quantity').val());
                var price = 0;

                switch (menu) {
                    case 'Roasted Chicken':
                        price = 5,500;
                        break;
                    case '">Chicken In Pilau':
                        price = 7,000;
                        break;
                    case 'Beef In Pilau':
                        price = 5000;
                        break;
                    /*case 'Cabbage':
                        price = 15.00;
                        break;
                    case 'Beef':
                        price = 19.00;
                        break;
                    case 'Fruits':
                        price = 20.00;
                        break;*/
                }

                var totalPrice = price * quantity;
                orderTotal += totalPrice;

                var row = '<tr><td>' + orderNumber + '</td><td>' + menu + '</td><td>' + quantity + '</td><td>$' + totalPrice.toFixed(2) + '</td></tr>';
                $('#orderTableBody').append(row);

                var deliveryTime = Math.floor(Math.random() * (60 - 20 + 1)) + 20;
                $('#deliveryTime').text(deliveryTime);

                orderNumber++;
                $('#menu').val('');
                $('#quantity').val('');
                $('#payment').val('');
            });
        });