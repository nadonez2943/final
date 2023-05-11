<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

    sendRequest();

    function sendRequest() {
        var st = $('#st').val();
        $.ajax({
        type: 'POST',
        url: 'checkst.php',
        data: { id: $('#id').val() }, // Sending data as an object
        success: function(data) {
            if (data != st) {
                switch (parseInt(data)) {
                    case 0:
                    $('#status').text("รอการตอบรับ");
                    $('#oparetion').html('<div class="row mb-1"><div><button id="st0" type="button" class="btn btn-primary">ตอบรับคำสั่งซื้อ</button></div></div><div class="row mb-1"><div><button type="button" class="btn btn-danger">ยกเลิกคำสั่งซื้อ</button></div></div>');
                    break;
                    case 1:
                    $('#status').text("รอลูกค้าชำระเงิน และยืนยันคำสั่งซื้อ");
                    break;
                    case 2:
                    $('#status').text("ลูกค้ายืนยันคำสั่งซื้อ กรุณาเตรียมสินค้า");
                    $('#oparetion').html('<div class="row mb-1"><div><button id="st2" type="button" class="btn btn-primary">เริ่มเตรียมสินค้า</button></div></div>');
                    break;
                    case 3:
                    $('#status').text("เมื่อเตรียมสินค้าเสร็จแล้ว กรุณาขนส่งสินค้า");
                    $('#oparetion').html('<div class="row mb-1"><div><button id="st3" type="button" class="btn btn-primary">ส่งสินค้า</button></div></div>');
                    break;
                    case 4:
                    $('#status').text("สินค้าถูกแล้ว");
                    break;
                    case 5:
                    $('#status').text("คำสั่งซื้อเสร็จสิ้น");
                    break;
                    case 6:
                    $('#status').text("คำสั่งซื้อถูกยกเลิก");
                    break;
                }
                $('#st').val(data);
            }else{
                switch (parseInt(data)) {
                    case 0:
                    $('#status').text("รอการตอบรับ");
                    $('#oparetion').html('<div class="row mb-1"><div><button id="st0" type="button" class="btn btn-primary">ตอบรับคำสั่งซื้อ</button></div></div><div class="row mb-1"><div><button type="button" class="btn btn-danger">ยกเลิกคำสั่งซื้อ</button></div></div>');
                    break;
                    case 1:
                    $('#status').text("รอลูกค้าชำระเงิน และยืนยันคำสั่งซื้อ");
                    break;
                    case 2:
                    $('#status').text("ลูกค้ายืนยันคำสั่งซื้อ กรุณาเตรียมสินค้า");
                    $('#oparetion').html('<div class="row mb-1"><div><button id="st2" type="button" class="btn btn-primary">เริ่มเตรียมสินค้า</button></div></div>');
                    break;
                    case 3:
                    $('#status').text("เมื่อเตรียมสินค้าเสร็จแล้ว กรุณาขนส่งสินค้า");
                    $('#oparetion').html('<div class="row mb-1"><div><button id="st3" type="button" class="btn btn-primary">ส่งสินค้า</button></div></div>');
                    break;
                    case 4:
                    $('#status').text("สินค้าถูกแล้ว");
                    break;
                    case 5:
                    $('#status').text("คำสั่งซื้อเสร็จสิ้น");
                    break;
                    case 6:
                    $('#status').text("คำสั่งซื้อถูกยกเลิก");
                    break;
                }
                $('#st').val(data);
            }
        },
        complete: function() {
            // Schedule the next request when the current one is complete
            setTimeout(sendRequest, 5000); // Using setTimeout instead of setInterval
        }
        });
    }
    });

    $(document).on('click', '#st0', function() {
        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: { id: $('#id').val(), order_status: 1, function: 'update_order_status' },
            success: function(response) {
                console.log(response);
                if (response == "1") {
                    $('#st').val(response);
                    $('#status').text("รอลูกค้าชำระเงิน และยืนยันคำสั่งซื้อ");
                    $('#oparetion').html('');
                    
                } else {
                    console.log("Failed to fetch the updated order status.");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    $(document).on('click', '#st1', function() {
        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: { id: $('#id').val(), order_status: 2, function: 'update_order_status' },
            success: function(response) {
                console.log(response);
                if (response == "2") {
                    $('#st').val(response);
                    $('#status').text("รอลูกค้าชำระเงิน และยืนยันคำสั่งซื้อ");
                } else {
                    console.log("Failed to fetch the updated order status.");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    $(document).on('click', '#st2', function() {
        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: { id: $('#id').val(), order_status: 3, function: 'update_order_status' },
            success: function(response) {
                console.log(response);
                if (response == "3") {
                    $('#st').val(response);
                    $('#status').text("เมื่อเตรียมสินค้าเสร็จแล้ว กรุณาขนส่งสินค้า");
                    $('#oparetion').html('<div class="row mb-1"><div><button id="st3" type="button" class="btn btn-primary">ส่งสินค้า</button></div></div>');
                    
                } else {
                    console.log("Failed to fetch the updated order status.");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    $(document).on('click', '#st3', function() {
        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: { id: $('#id').val(), order_status: 4, function: 'update_order_status' },
            success: function(response) {
                console.log(response);
                if (response == "4") {
                    $('#st').val(response);
                    $('#status').text("ส่งสินค้าแล้ว");
                    $('#oparetion').html('<div class="row mb-1"><div><button id="st4" type="button" class="btn btn-primary">ส่งสินค้า</button></div></div>');
                    
                } else {
                    console.log("Failed to fetch the updated order status.");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    $(document).on('click', '#st4', function() {
        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: { id: $('#id').val(), order_status: 5, function: 'update_order_status' },
            success: function(response) {
                console.log(response);
                if (response == "5") {
                    $('#st').val(response);
                    $('#status').text("ส่งสินค้าแล้ว");
                } else {
                    console.log("Failed to fetch the updated order status.");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>