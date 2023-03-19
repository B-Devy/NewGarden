<div id="headeretendu"> 
    <header>
        <div id="logo">
        <a href="../newgarden"><div></div></a>
        </div>

        <div id="menu">
            <ul>
                <li class="rubrique2"><div><a href="./index.php" id="header2_lien">Retour à l'Accueil</a></div></li>       
            </ul>
        </div> 
    </header>
</div>

<script>
    var rectmenu2 = document.querySelectorAll('.rubrique2');

    rectmenu2.forEach( clic => clic.addEventListener("mouseover", event => {
        event.currentTarget.insertAdjacentHTML("beforeend", `<div class="rectangle"></div>`);
        })
    )

    rectmenu2.forEach(clic => clic.addEventListener("mouseout", () => {
        var rect = document.querySelectorAll('.rectangle');
        rect.forEach(e => e.remove());
        })
    )
</script>

