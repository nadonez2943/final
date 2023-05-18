<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        checkOrder();

        function checkOrder() {
            var numnew = $('#numnew').val();
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { function: 'numnew' }, // Sending data as an object
                success: function(data) {
                    if (data != numnew) {
                        console.log("changed");
                        console.log(data);
                        $('#numnew').val(data);
                        location.reload();
                    } 
                },
                complete: function() {
                    // Schedule the next request when the current one is complete
                    setTimeout(checkOrder, 5000); // Using setTimeout instead of setInterval
                }
            });
            var numdoing = $('#numdoing').val();
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { function: 'numdoing' }, // Sending data as an object
                success: function(data) {
                    if (data != numdoing) {
                        console.log("changed");
                        console.log(data);
                        $('#numdoing').val(data);
                        location.reload();
                    } 
                },
                complete: function() {
                    // Schedule the next request when the current one is complete
                    setTimeout(checkOrder, 5000); // Using setTimeout instead of setInterval
                }
            });
            var numprepare = $('#numprepare').val();
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { function: 'numprepare' }, // Sending data as an object
                success: function(data) {
                    if (data != numprepare) {
                        console.log("changed");
                        console.log(data);
                        $('#numprepare').val(data);
                        location.reload();
                    } 
                },
                complete: function() {
                    // Schedule the next request when the current one is complete
                    setTimeout(checkOrder, 5000); // Using setTimeout instead of setInterval
                }
            });
            var numship = $('#numship').val();
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { function: 'numship' }, // Sending data as an object
                success: function(data) {
                    if (data != numship) {
                        console.log("changed");
                        console.log(data);
                        $('#numship').val(data);
                        location.reload();
                    } 
                },
                complete: function() {
                    // Schedule the next request when the current one is complete
                    setTimeout(checkOrder, 5000); // Using setTimeout instead of setInterval
                }
            });
            var numshiped = $('#numshiped').val();
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { function: 'numshiped' }, // Sending data as an object
                success: function(data) {
                    if (data != numshiped) {
                        console.log("changed");
                        console.log(data);
                        $('#numshiped').val(data);
                        location.reload();
                    } 
                },
                complete: function() {
                    // Schedule the next request when the current one is complete
                    setTimeout(checkOrder, 5000); // Using setTimeout instead of setInterval
                }
            });
            var numsuccess = $('#numsuccess').val();
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { function: 'numsuccess' }, // Sending data as an object
                success: function(data) {
                    if (data != numsuccess) {
                        console.log("changed");
                        console.log(data);
                        $('#numsuccess').val(data);
                        location.reload();
                    } 
                },
                complete: function() {
                    // Schedule the next request when the current one is complete
                    setTimeout(checkOrder, 5000); // Using setTimeout instead of setInterval
                }
            });
            var numcancle = $('#numcancle').val();
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { function: 'numcancle' }, // Sending data as an object
                success: function(data) {
                    if (data != numcancle) {
                        console.log("changed");
                        console.log(data);
                        $('#numcancle').val(data);
                        location.reload();
                    } 
                },
                complete: function() {
                    // Schedule the next request when the current one is complete
                    setTimeout(checkOrder, 5000); // Using setTimeout instead of setInterval
                }
            });
            var numall = $('#numall').val();
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { function: 'numall' }, // Sending data as an object
                success: function(data) {
                    if (data != numall) {
                        console.log("changed");
                        console.log(data);
                        $('#numall').val(data);
                        location.reload();
                    } 
                },
                complete: function() {
                    // Schedule the next request when the current one is complete
                    setTimeout(checkOrder, 5000); // Using setTimeout instead of setInterval
                }
            });
        }
    });

</script>