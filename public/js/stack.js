$(document).ready(function(){
    $('#payButton').show();

    var refr = "YouEv"+Math.floor(Math.random()*(9999999999 - 100000000) + 100000000);
    console.log(refr);

    $('#payButton').on('click', function () {
        console.log("loading...");
        var $btn = $(this);

        var event_id = $btn.data("event");
        var packages = $btn.data("packages");
        var total = $btn.data("total");
        var oName = $btn.data("name");
        var oEmail = $btn.data("email");
        var oPhone = $btn.data("phone");

        var sendurl = $btn.data("sendurl");

        // console.log(event_id+" - "+packages+oName+oEmail+oPhone);


        $btn.html('<i class="fa fa-spinner fa-spin"></i> &nbsp; Loading...');
        $btn.prop('disabled', true);

        var handler = PaystackPop.setup({
            key: 'pk_test_012ebc3c437a1d2b90a8f8a98184c3939113d5ad',
            email: 'raymondativie@gmail.com',
            amount: total*100,
            ref: refr,
            callback: function(response){
                var url = 'https://api.paystack.co/transaction/verify/'+response.trxref;

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'Authorization': 'Bearer sk_test_d2c04ffd2912bac156c19f9a114ebb2eb934c7de'
                    },
                    contentType: 'application/json; charset=utf-8',
                    success: function (result) {

                        $.post(sendurl,
                            {event_id: event_id, packages: packages, total: total,
                                name: oName, email: oEmail, phone: oPhone, transaction_ref: response.trxref},
                                function(data,status,xhr){
                                    if(data.status == 'success'){
                                        window.location = data.url;
                                    }
                                });
                                console.log(result);
                                $btn.html('Paid');
                            },
                            error: function (error) {
                                alert("Something wrong happened");
                                $btn.html('Pay Now');
                                $btn.prop('disabled', false);
                            }
                        });
                    },
                    onClose: function(){
                        alert('No payment has been made');

                        $btn.html('Pay Now');
                        $btn.prop('disabled', false);
                    }
                });

                handler.openIframe();
            });
        });
