        
        </div>
    </div>

    <script src="/assets/js/script.js"></script>
    <script>
        let res = "<?php  echo isset($_SESSION['res']) ? $_SESSION['res']: ''; ?>";
        if(res){
            alert(res);
        }
    </script>
    <?php  unset($_SESSION['res']); ?>
</body>
</html>