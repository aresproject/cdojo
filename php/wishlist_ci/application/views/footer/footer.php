<div style="margin-top: 25vh;">
    <div class="row" style="border: 2px solid red; padding: 30px;">
        <?php  ?>
        <h2>You've Logged in since <?= $_SESSION['logstart']?></h2>

        <ul>
            <li>Current Time is 
            <?php 
            
                echo timespan($_SESSION['logstart'], now(), 2); 
            ?>
            </li>
        </ul>
    </div>
</div>

</body>
</html>