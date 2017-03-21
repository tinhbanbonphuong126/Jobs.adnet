<!--Begin Footer -->
<footer id="footer">
    <div class="container">
        <p>Copyright © kitanagoya-CS All rights reserved</p>
    </div>
</footer>
<!--End Footer -->

<!--    Script for zoom content website-->
<script>
    var Page = document.getElementById('Body');
    function zoomIn()
    {
        Initial = parseInt(Page.style.zoom);
        zoom = Initial + 30 +'%';
        Page.style.zoom = zoom;

//        Su dung jquery ajax
        $.ajax({
            url: "zoom.php",
            data: {
                zoomValue: zoom
            },
            method: 'POST',
            success: function(result){
            }
        });


        return false;
    }

    function zoomOut()
    {
        zoom = '100%'
        Page.style.zoom = zoom;

        //        Su dung jquery ajax
        $.ajax({
            url: "zoom.php",
            data: {
                zoomValue: zoom
            },
            method: 'POST',
            success: function(result){
            }
        });
        return false;
    }
</script>


</body>
</html>