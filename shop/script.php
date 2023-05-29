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
                                $('#status').text("คำสั่งซื้อใหม่ กรุณาตอบรับคำสั่งซื้อ");
                                $('#oparetion').html('<div class="row mb-1"><div><button type="button" class="btn btn-outline-primary">ดูรายละเอียด</button></div></div><div class="row mb-1"><div><button id="st0" type="button" class="btn btn-primary">ตอบรับคำสั่งซื้อ</button></div></div><div class="row mb-1"><div><button type="button" class="btn btn-danger">ยกเลิกคำสั่งซื้อ</button></div></div>');
                                break;
                            case 1:
                                $('#status').html("ตอบรับคำสั่งซื้อแล้ว<br>กรุณาจัดเตรียมสินค้าเพื่อจัดส่ง");
                                $('#oparetion').html('<div class="row mb-1"><div><button id="st1" type="button" class="btn btn-primary">เริ่มเตรียมสินค้า</button></div></div>');
                                break;
                            case 2:
                                $('#status').html("อยู่ระหว่างเตรียมสินค้า<br>กรุณาจัดส่งสินค้าเมื่อเสร็จสิ้น");
                                $('#oparetion').html('<div class="row mb-1"><div><button id="st2" type="button" class="btn btn-primary">ส่งสินค้า</button></div></div>');
                                break;
                            case 3:
                                $('#status').text("อยู่ระหว่างขนส่งสินค้า");
                                $('#oparetion').html('<div class="row mb-1"><div><button id="st3" type="button" class="btn btn-primary">ส่งสินค้าแล้ว</button></div></div>');
                                break;
                            case 4:
                                $('#status').text("จัดส่งสินค้าสำเร็จแล้ว");
                                $('#oparetion').html('<div class="row mb-1 text-center text-danger">*คำสั่งซื้อนี้จะสำเร็จต่อเมื่อลูกค้าได้รับสินค้าแล้ว</div>');
                                break;
                            case 5:
                                $('#status').text("คำสั่งซื้อสำเร็จแล้ว");
                                $('#oparetion').html('');
                                break;
                            case 6:
                                $('#status').text("คำสั่งซื้อถูกยกเลิก");
                                $('#oparetion').html('<p>เหตุผล</p><p>ฟหกดเ้่า้เดกหกพำะัี่า้ืิดพัะี่ดเิดกดพถัี่ดเ</p>');
                                break;
                        }
                        $('#st').val(data);
                    }else{
                        switch (parseInt(data)) {
                            case 0:
                                $('#status').text("คำสั่งซื้อใหม่ กรุณาตอบรับคำสั่งซื้อ");
                                $('#oparetion').html('<div class="row mb-1"><div><button type="button" class="btn btn-outline-primary">ดูรายละเอียด</button></div></div><div class="row mb-1"><div><button id="st0" type="button" class="btn btn-primary">ตอบรับคำสั่งซื้อ</button></div></div><div class="row mb-1"><div><button type="button" class="btn btn-danger">ยกเลิกคำสั่งซื้อ</button></div></div>');
                                break;
                            case 1:
                                $('#status').html("ตอบรับคำสั่งซื้อแล้ว<br>กรุณาจัดเตรียมสินค้าเพื่อจัดส่ง");
                                $('#oparetion').html('<div class="row mb-1"><div><button id="st1" type="button" class="btn btn-primary">เริ่มเตรียมสินค้า</button></div></div>');
                                break;
                            case 2:
                                $('#status').html("อยู่ระหว่างเตรียมสินค้า<br>กรุณาจัดส่งสินค้าเมื่อเสร็จสิ้น");
                                $('#oparetion').html('<div class="row mb-1"><div><button id="st2" type="button" class="btn btn-primary">ส่งสินค้า</button></div></div>');
                                break;
                            case 3:
                                $('#status').text("อยู่ระหว่างขนส่งสินค้า");
                                $('#oparetion').html('<div class="row mb-1"><div><button id="st3" type="button" class="btn btn-primary">ส่งสินค้าแล้ว</button></div></div>');
                                break;
                            case 4:
                                $('#status').text("จัดส่งสินค้าสำเร็จแล้ว");
                                $('#oparetion').html('<div class="row mb-1 text-center text-danger">*คำสั่งซื้อนี้จะสำเร็จต่อเมื่อลูกค้าได้รับสินค้าแล้ว</div>');
                                break;
                            case 5:
                                $('#status').text("คำสั่งซื้อสำเร็จแล้ว");
                                $('#oparetion').html('');
                                break;
                            case 6:
                                $('#status').text("คำสั่งซื้อถูกยกเลิก");
                                $('#oparetion').html('<p>เหตุผล</p><p>ฟหกดเ้่า้เดกหกพำะัี่า้ืิดพัะี่ดเิดกดพถัี่ดเ</p>');
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


    

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $(document).on('click', '#st0', function() {
        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: { id: $('#id').val(), order_status: 1, function: 'update_order_status' },
            success: function(response) {
                console.log(response);
                if (response == "1") {
                    $('#st').val(response);
                    $('#status').html("ตอบรับคำสั่งซื้อแล้ว<br>กรุณาจัดเตรียมสินค้าเพื่อจัดส่ง");
                    $('#oparetion').html('<div class="row mb-1"><div><button id="st1" type="button" class="btn btn-primary">เริ่มเตรียมสินค้า</button></div></div>');
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
                    $('#status').html("อยู่ระหว่างเตรียมสินค้า<br>กรุณาจัดส่งสินค้าเมื่อเสร็จสิ้น");
                    $('#oparetion').html('<div class="row mb-1"><div><button id="st2" type="button" class="btn btn-primary">ส่งสินค้า</button></div></div>');
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
                    $('#status').text("อยู่ระหว่างขนส่งสินค้า");
                    $('#oparetion').html('<div class="row mb-1"><div><button id="st3" type="button" class="btn btn-primary">ส่งสินค้าแล้ว</button></div></div>');
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
                    $('#status').text("จัดส่งสินค้าสำเร็จแล้ว");
                    $('#oparetion').html('<div class="row mb-1 text-center text-danger">*คำสั่งซื้อนี้จะสำเร็จต่อเมื่อลูกค้าได้รับสินค้าแล้ว</div>');
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
                    $('#status').text("คำสั่งซื้อสำเร็จแล้ว");
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