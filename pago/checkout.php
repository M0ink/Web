
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://www.paypal.com/sdk/js?client-id=AVQl17yfB70Wxcm0iZVqSYaz8GiUYZHu1cJ_Td686HO8YSuZ_c4IowtsKH1GN6fv545HPuqQW27XL3th&currency=MXN"></script>
</head>
<body>
 
    <div id="paypal-button-container"> </div>
    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions){ 
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 100
                        }
                    }]
                });
            },
            onCancel: function(data) {
                alert("Pago cancelado");
                console.log(data);
            },
            onAprove: function(data, actions){
                actions.order.capture().then(function (detalles) {
                    window.location.href="realizado.html"
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>