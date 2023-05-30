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
                                $('#status').text("สั่งซื้อสินค้าแล้ว");
                                $('#oparetion').html('<div><button type="button" data-toggle="modal" data-target="#cancleModal" class="btn btn-danger">ยกเลิกคำสั่งซื้อ</button></div>');
                                break;
                            case 1:
                                $('#status').text("ร้านค้าตอบรับคำสั่งซื้อแล้ว");
                                $('#oparetion').html('<div class="row mb-1"><div><button type="button" data-toggle="modal" data-target="#cancleModal" class="btn btn-danger">ยกเลิกคำสั่งซื้อ</button></div></div>');
                                break;
                            case 2:
                                $('#status').text("ร้านค้ากำลังจัดเตรียมสินค้า");
                                $('#oparetion').html('');
                                break;
                            case 3:
                                $('#status').text("อยู่ระหว่างขนส่งสินค้า");
                                $('#oparetion').html('');
                                break;
                            case 4:
                                $('#status').html("สินค้าถูกจัดส่งแล้ว<br>กรุณารับสินค้า");
                                $('#oparetion').html('<div class="row mb-1"><div><button id="st4" type="button" class="btn btn-primary">ได้รับสิ้นค้าแล้ว</button></div></div>');
                                break;
                            case 5:
                                $('#status').text("คำสั่งซื้อสำเร็จแล้ว");
                                $('#oparetion').html('<div class="row mb-1"><div><button type="button" class="btn btn-primary">ให้คะแนน และรีวิวสินค้า</button></div></div>');
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
                                $('#status').text("สั่งซื้อสินค้าแล้ว");
                                $('#oparetion').html('<div><button type="button" data-toggle="modal" data-target="#cancleModal" class="btn btn-danger">ยกเลิกคำสั่งซื้อ</button></div>');
                                break;
                            case 1:
                                $('#status').text("ร้านค้าตอบรับคำสั่งซื้อแล้ว");
                                $('#oparetion').html('<div class="row mb-1"><div><button type="button" data-toggle="modal" data-target="#cancleModal" class="btn btn-danger">ยกเลิกคำสั่งซื้อ</button></div></div>');
                                break;
                            case 2:
                                $('#status').text("ร้านค้ากำลังจัดเตรียมสินค้า");
                                $('#oparetion').html('');
                                break;
                            case 3:
                                $('#status').text("อยู่ระหว่างขนส่งสินค้า");
                                $('#oparetion').html('');
                                break;
                            case 4:
                                $('#status').html("สินค้าถูกจัดส่งแล้ว<br>กรุณารับสินค้า");
                                $('#oparetion').html('<div class="row mb-1"><div><button id="st4" type="button" class="btn btn-primary">ได้รับสิ้นค้าแล้ว</button></div></div>');
                                break;
                            case 5:
                                $('#status').text("คำสั่งซื้อสำเร็จแล้ว");
                                $('#oparetion').html('<div class="row mb-1"><div><button type="button" class="btn btn-primary">ให้คะแนน และรีวิวสินค้า</button></div></div>');
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
                    $('#oparetion').html('<div class="row mb-1"><div><button type="button" class="btn btn-primary">ให้คะแนน และรีวิวสินค้า</button></div></div>');
                } else {
                    console.log("Failed to fetch the updated order status.");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    $(document).on('click', '#st6', function() {
        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: { id: $('#id').val(), order_status: 6, function: 'update_order_status' },
            success: function(response) {
                console.log(response);
                if (response == "6") {
                    location.reload();
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