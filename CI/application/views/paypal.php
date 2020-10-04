
<!DOCTYPE html>

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<body>
    <!-- Set up a container element for the button -->
    
    <div class="col-sm" style="margin:200px; margin-left:350px;">
    <div  style="margin-bottom:50px"><h4>Your donation will help us keep adding new features and improving this websites.</br> Thanking you in advance!</h4></div>
    <div id="paypal-button-container"></div>
    </div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AXqOvXRK95EIo5VKTP5TpycPu2196hfJJtXWwwN14OeZc5Pvdlle9vKl0dUb_u8LmEmnSKWB8642moSk&currency=AUD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '10'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>
</body>
    