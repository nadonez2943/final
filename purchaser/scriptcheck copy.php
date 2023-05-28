<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#numnew').change(function(){
            location.reload();
        });
        $('#numdoing').change(function(){
            location.reload();
        });
        $('#numprepare').change(function(){
            location.reload();
        });
        $('#numship').change(function(){
            location.reload();
        });
        $('#numshiped').change(function(){
            location.reload();
        });
        $('#numsuccess').change(function(){
            location.reload();
        });
        $('#numcancle').change(function(){
            location.reload();
        });
        $('#numall').change(function(){
            location.reload();
        });

        checkOrder();

        function checkOrder() {
            var numnew = $('#numnew').val();
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row:$('#numnew').val(),function: 'numnew' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numnew').val(data);
                    } 
                },
                complete: function() {
                    setTimeout(checkOrder, 5000); 
                }
            });
            var numdoing = parseInt($('#numdoing').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numdoing,function: 'numdoing' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numdoing').val(data);
                    } 
                }
            });
            var numprepare = parseInt($('#numprepare').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numprepare,function: 'numprepare' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numprepare').val(data);
                    } 
                }
            });

            var numship = parseInt($('#numship').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numship,function: 'numship' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numship').val(data);
                    } 
                }
            });

            var numshiped = parseInt($('#numshiped').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numshiped,function: 'numshiped' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numshiped').val(data);
                    } 
                }
            });

            var numsuccess = parseInt($('#numsuccess').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numsuccess,function: 'numsuccess' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numsuccess').val(data);
                    } 
                }
            });

            var numcancle = parseInt($('#numcancle').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numcancle,function: 'numcancle' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numcancle').val(data);
                    } 
                }
            });

            var numall = parseInt($('#numall').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { function: 'numall' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numall').val(data);
                    } 
                }
            });
        }
    });

</script>